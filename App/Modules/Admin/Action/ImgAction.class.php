<?php

Class ImgAction extends CommonAction
{
	
  //列表
  public function index()
  {
	$Img=D('Img');  
	$typeid=I('typeid');
	if($typeid)
	{
	  $typename=D('Imgcategory')->find($typeid);
	  $this->assign('typename',$typename['typename']);
	  $where['typeid']=$typeid;
	}
	
	$order['sort']="asc";
             $order['id']="desc";
	import('ORG.Util.Page');
	$count= $Img->relation(true)->where($where)->order($order)->count();
	$Page= new Page($count,25);
	
	$list= $Img->relation(true)->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
	$show= $Page->show();
	$this->assign('page',$show);
	$this->assign('lists',$list);
    $this->display();
	  
  }
  //添加
  public function add()
  {
	$Img=D('Img');
	$typeid=I('typeid');
	$this->assign('typeid',$typeid);
	$this->assign('category',$this->getCategory(0));
	
    $this->display();
  }
  public function do_add()
  { 
	 $Img=D('Img');
	 if($Img->create())
	 {
		/*if($_FILES['pic']['name'])
	   {
		  $pics=upload();
		  if($pics['error'])
			$this->error($pics['error']); 
		  else
			$Img->pic=$pics['info'][0]['savename'];
	    }		*/
	    $imgpicList=I('imgpicList');
		$Img->pic=$imgpicList[0];
		if($Img->add())
		{
		  $this->success('图片添加成功',U('index'));
		} 
		else
		{
		  $this->error('请重试');
		}
	 }
	 else
	 {
	   $this->error($Img->getError()); 
	 }
  
  }
  //修改
  public function edit()
  {
    $id=I("id");
	$Img=D('Img');
	$data=$Img->find($id);
	$this->assign('data',$data);
	$this->assign('category',$this->getCategory(0));
    $this->display();
  }
  public function do_edit()
  {
    $Img=D('img');
	if($Img->create())
	{
		/*if($_FILES['pic']['name'])
		{
		  $data=$Img->find(I('id'));
		  @unlink(C('cfg_pic').$data['pic']);  
		  $pics=upload();
		  if($pics['error'])
		  $this->error($pics['error']); 
		  else
		  $Img->pic=$pics['info'][0]['savename'];
		}*/
		$imgpicList=I('imgpicList');
		$Img->pic=$imgpicList[0];
		if($Img->save())
		{
		   $this->success('信息编辑成功',U('index'));	
		}
		else
		{
		   $this->error('请重试');
		}
	}
	else
	{
	  $this->error($Img->getError());
	}
  }
  //删除
  
  
  public function delall()
 {
   if(!IS_AJAX) _404(L('lan_common'),U('index'));	 
   $ids=explode(',',substr(I('id'),1));
   $Img=D('Img');
   $Category=D('Category');
   $flag=true;
   foreach($ids as $id)
   {
	  $count=$Img->delete($id);
	  if($count=0)
	  {
		$flag=false;
		break;
	  }
	}
	if($flag)
    $this->ajaxReturn(array('status'=>1),'JSON');
	else
	$this->ajaxReturn(array('status'=>0),'JSON');

 }
  
  public function del()
  {
	 $id=I('id');
	 $Img=D('img');
	 $data=$Img->find($id);
	 @unlink(C('cfg_pic').$data['pic']);
	 if($Img->delete($id))
	 {
		 $this->success('信息删除成功');	
	 }
	 else
	 {
		 $this->error('请重试');
	 }
  }
 //排序图片
 public function do_sort()
 {
	 
	 $Img=D('Img');
	 $id=I('id');
	 $sort=I('sort');
 
	 $flag=true;
	 for($i=0;$i<count($id);$i++)
	 {
		$data['id']=$id[$i];
		$data['sort']=I('sort_'.$id[$i]);
		$data['optime']=time();
		if(!$Img->save($data))
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
  //栏目类别
  
  private function getCategory($typeid=0)
  {
  
  $lists=D("Imgcategory")->category($typeid);
  $clists=array();
  foreach($lists as $list)
  { 		
	$id=$list['id'];
	$clists[$id]['id']=$list['id'];
	$clists[$id]['reid']=$list['reid'];
	$clists[$id]['type']=$list['type'];
	$clists[$id]['fullname']=$list['fullname'];
	$clists[$id]['sort']=$list['sort'];	
  }
  return $clists;
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