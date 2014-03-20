<?php
Class CategoryAction extends CommonAction
{
	//栏目列表
	public function index()
	{
	  $this->assign("lists",$this->getCategory());
      $this->display();
	}
	
	//栏目添加
	public function add()
	{
		//获取栏的顶级id
		$typeid=I('id');
		$this->typeid=$typeid;
		if($typeid)
		{
		  $this->assign('typeid',$typeid);
		  $topid=gettopid($typeid);
		  //顶级栏目的信息 
		  $data=D('Category')->find($topid);
		  $this->assign('cmark',$data['cmark']);
		  $this->assign('remark',$data['remark']);
		  $this->assign('isshow',$data['isshow']);
		  $this->assign('type',$data['type']);
		  $this->assign('groupid',$data['groupid']);
	    }
		else
		  $this->assign('isshow',1);
		//栏目分类
		$this->assign("lists", $this->getCategory());
	    //遍历网站用户组
  		$mgroup=$this->mgroup();
  		$this->assign('mgroup',$mgroup);
		//模型
		$mtable=$this->mtable();
		$this->assign('mtable',$mtable);
		$this->display();
	}
	public function do_add()
	{

	 $Category=D('Category');
	  if($Category->create())
	  {
		   /*if($_FILES['pic']['name'])
		   {
			 $pics=upload();
			 if($pics['error'])
			 	$this->error($pics['error']); 
			 else
			 	$Category->pic=$pics['info'][0]['savename'];
		   }*/
		   $imgpicList=I('imgpicList');
		   $Category->pic=$imgpicList[0];
		   if($Category->add())
		   {
			   $this->success(L('lan_success'),U(GROUP_NAME.'/Category/index'));
		   }
		   else
		   {
			  $this->error(L('lan_error'));    
		   }
	  }
	  else
	  {
		$this->error($Category->geterror());   
	  }
	
	}
	//栏目修改
	public function edit()
	{
		$id=I('id');
		$Category=D('Category');
		$data=$Category->find($id);
		$this->assign('data',$data);
		
		//栏目分类
		$this->assign("lists", $this->getCategory());
	    //遍历网站用户组
  		$mgroup=$this->mgroup();
  		$this->assign('mgroup',$mgroup);
		//模型
		$mtable=$this->mtable();
		$this->assign('mtable',$mtable);
		$this->display();
	}
	public function do_edit()
	{
		if(!IS_POST) _404(L('lan_common'),U(GROUP_NAME.'/Category/index'));
		$Category=D('Category');
		if($Category->create())
		{
		  /* if($_FILES['pic']['name'])
		   {
			 $id=I('id');
			 $data=$Category->find($id);
			 @unlink(C('cfg_pic').$data['pic']);  
			 $pics=upload();
			 if($pics['error'])
			 	$this->error($pics['error']); 
			 else
			 	$Category->pic=$pics['info'][0]['savename'];
		   }*/
		  $imgpicList=I('imgpicList');
		  $Category->pic=$imgpicList[0];
		  if($Category->where(array('id'=>I('id')))->save())
		  	$this->success(L('lan_edit'),U(GROUP_NAME.'/Category/index'));
		  else
		  	$this->error(L('lan_error'));
		}
		else
		{
		   $this->error($Category->getError());
		}
	}
	//栏目删除
	public function del()
	{
		
		$id=I('id');
		$Category=D('Category');
		//获得所有子分类的id
		$child=getchild($id);
		//遍历所有分类是否有文章
		$Article=D('Article');
		if($Article->where(array('typeid'=>array('in',$child)))->count())
			$this->error(L('lan_ready'));
	    else
		 {
			//删除栏目
			foreach($child as $c)
			{
				$data=M('category')->find($c);
 				//删除图片
				@unlink('./'.C('cfg_pic').$data['pic']);
	
				$Category->delete($c);
			}
			$this->success(L('lan_del'),U(GROUP_NAME.'/Category/index'));
		 } 
		
		
	}
//栏目名称
 private function getCategory()
 {

 	$lists=D("Category")->category();
 	$clists=array();
 	foreach($lists as $list)
 	{ 		
	  $id=$list['id'];
	  $clists[$id]['id']=$list['id'];
	  $clists[$id]['reid']=$list['reid'];
	  $clists[$id]['type']=$list['type'];
	  $clists[$id]['isshow']=$list['isshow'];
	  $clists[$id]['fullname']=$list['fullname'];
	  $clists[$id]['sort']=$list['sort'];
	  $clists[$id]['pic']=$list['pic'];	
 	}
 	return $clists;
 }
 //会员用户组
  private function mgroup()
 {
 	$Group=D('group');
 	return $Group->where(array('type'=>2))->order('id asc')->select();
 }
 //模型
 private function mtable()
 {
   $Mtable=D('Mtable');	 
   return $Mtable->select();
 }
 //检查栏目的名称是否相同
 public function checksame()
 {
   if(!IS_AJAX) _404(L('lan_common'),U(GROUP_NAME.'/Category/index'));
   $topid=gettopid(I('id'));
   if(!$topid)
   		$topid=0;
   $child=getchild($topid);
   $Category=D('Category');

   $count=$Category->where(array("typename"=>I('typename'),'id'=>array('in',$child)))->count();
   
   if($count)
      $this->ajaxReturn(array('status'=>1),'json');
   else
     $this->ajaxReturn(array('status'=>0),'json');
 }
 //栏目排序
 public function do_sort()
 {
	/* dump(I('sort'));
	 dump(I('id'));*/
	 $Category=D('Category');
	 $id=I('id');
	 //$sort=I('sort');
	 $flag=true;
	 for($i=0;$i<count($id);$i++)
	 {
		$data['id']=$id[$i];
		$data['sort']=I('sort_'.$id[$i]);
		$data['optime']=time();
		if(!$Category->save($data))
		{
			$flag=false;
			break; 
		}
	 }
	 if($flag)
	 	$this->success(L('lan_sort'),U('index')); 
	 else
	 	$this->error(L('lan_sorte'),U('index')); 
 }
 //图片上传
 public function ajaxup()
    {
    	$pic=upload();
    	if($pic['error'])
    		$this->ajaxReturn(array('error'=>$pic['error']),'JSON');
    	else
    	{
    		//dump($pic);
    		$this->ajaxReturn(array('msg'=>$pic[info][0]['savename']),'JSON');
    	}
    }
//图片删除
public function delimg()
	{
		$path='./'.C('cfg_pic').I('path');
		@unlink($path);
	}
}

?>