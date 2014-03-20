<?php
Class ArticleAction extends Action
{
 //文档列表
 public function index()
 {	
  $Article=D('Article');
  $Category=D('Category');
  
  //筛选
  $typeid=I('typeid');
  $typename=$Category->find( $typeid);
  $this->assign('typename',$typename['typename']);
  //子类
  $child=getchild($typeid);
  $where['typeid']=array('in',$child);
  $where['isdel']=0;
  if(I("listorder"))
  {
	$order[I('listsort')]=I('listorder');
	$this->listsort=I('listsort');  
	$this->listorder=I('listorder'); 
  }
  else
  {
	  $order['sort']='asc';
      $order['time']='desc';
  }
 if(I("key"))
  {
	$where['title']=array('like',"%".I('key')."%");  
  }
  //排序
  $order['id']='desc';  
  import('ORG.Util.Page');
  $count= $Article->Relation(true)->where($where)->order($order)->count();
  $Page= new Page($count,25);
  $show= $Page->show();
  $list= $Article->Relation(true)->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
  

  
  //生成预览url
  for($i=0;$i<count($list);$i++)
  {
	$datac=$Category->relation('Mtable')->find($list[$i]['typeid']);
	$list[$i]['yurl']=U('Index/'.$datac['remark']."/view",array('typeid'=>$list[$i]['typeid'],'id'=>$list[$i]['id']));  
  }
  
  $this->assign('lists',$list);
  $this->assign('page',$show);
  
  //属性
  $this->attr=M('attr')->select();


  $this->assign('category',$this->getCategory($typeid));
  $this->display();  
  }
 
 //添加文档
 public function add()
 {
  $typeid=I('typeid');
  $Category=D('Category');
  $data=$Category->relation('Mtable')->find($typeid);
  $this->assign('topid',gettopid($typeid));
  $topname=$Category->find(gettopid($typeid));
  $this->assign('topname',$topname['typename']);
  $dfield=$this->getextend($data['mid']);
  $this->assign('dfield',$dfield);
  $this->assign('category',$this->getCategory($typeid));
 
  $this->attr=D('Attr')->select();

  $this->reid=I('typeid');

  $this->display();  
	 
  }
 public function do_add()
 {
   if(!IS_POST) _404(L('lan_common'),U('index'));
   //提交信息
   $Article=D("Article");
   $Mtable=D("Mtable");
   $Category=D('Category');
   //验证信息
   if($Article->create())
   {
	   //验证栏目是否选择模型
	   $typeid=I('typeid');
	   $data=$Category->relation('Mtable')->find($typeid);

	   if(!$data['code'])
	     $this->error('栏目模型不存在');
	   if($data['type']==1)
	     $this->error('频道页面不允许发布文档');
	   //列表上传
	  /* if($_FILES['pic']['name'])
	   {
		  $pics=upload();
		  if($pics['error'])
			$this->error($pics['error']); 
		  else
			$Article->pic=$pics['info'][0]['savename'];
	    }		*/
	    $imgpicList=I('imgpicList');
		$Article->pic=$imgpicList[0];
	   if($lastid=$Article->add())
	   {

	   	//文档属性处理
	   	if(isset($_POST['aid']))
		{
			$sql='INSERT INTO `'.C('DB_PREFIX').'article_attr` (bid,aid) VALUES';
			foreach($_POST['aid'] as $v)
			{
				$sql.='('.$lastid.','.$v.'),';
			}
			$sql=rtrim($sql,',');
			M('article_attr')->query($sql);
		}

	   	 //多图上传

/*	   	if($_FILES['img']['name'][0])
		{
		  $pics=upload('img');
		  if($pics['error'])
			$this->error($pics['error']); 
		  else
			{
				foreach( $pics['info'] as $key=>$pic)
				{


					$datap=array(
						'aid'=>$lastid,
						'img'=>$pic['savename']
						);
					M('imgs')->add($datap);
					
				}
	
			}
		}*/
		$imgpic=I('imgpic');
        foreach( $imgpic as $pic)
        {
        	$datap=array(
				'aid'=>$lastid,
				'img'=>$pic,
			);
			M('imgs')->add($datap);
        }
		 $typeid=I('typeid');
		 $etable=ucfirst($data['code']);
		 $datain['aid']=$lastid;
		 $datain['content']=$_POST['content'];
		 $datain['optime']=time();;
		 $dfield=$this->getextend($data['mid']);
		 foreach($dfield as $d)
		 {
			 
			 if($d['type']=='time')
			  $datain[$d['code']]=strtotime(I($d['code']));
			 else
			  $datain[$d['code']]=$_POST[$d['code']];
		 }

		 D($etable)->add($datain);
		 	
		 $this->success('文档添加成功',U('index',array('typeid'=>I('typeid'))));
	   }
	   else
	   {
		   $this->error('请重试');
	   }
   }
   else
   {
     $this->error($Article->getError());
   }
    
  
 }
 
 //修改文档
 public function edit()
 {
  $id=I('id');
  $Artilce=D('Article');
  $Category=D('Category');
  $data=$Artilce->relation(true)->find($id);
  $this->assign('data',$data);
  $datac=$Category->relation('Mtable')->find($data['typeid']);
  $etable=ucfirst($datac['code']);
  $dfield=$this->getextend($datac['mid']);
  $edata=D($etable)->find($id);
  for($i=0;$i<count($dfield);$i++)
  {
	$dfield[$i]['value']=$edata[$dfield[$i]['code']];
  }
  $this->assign('dfield',$dfield);
  $this->assign('content',$edata['content']);
  $this->assign('category',$this->getCategory($data['typeid']));
  
  
  $this->assign('topid',gettopid($data['typeid']));
  $topname=$Category->find(gettopid($data['typeid']));
  $this->assign('topname',$topname['typename']);

  $this->attr=D('Attr')->select();
  $this->display();
	 
 } 
 
 public function do_edit()
 {
	if(!IS_POST) _404(L('lan_common'),U('index'));
	$Category=D('Category');
	$Article=D('Article');
	$id=I('id');
	$data=$Article->find($id);
	//判断是否有选择栏目的模型
	$typeid=I('typeid');
	$datac=$Category->relation('Mtable')->find($typeid);
	if(!$datac['code'])
	  $this->error('栏目模型不存在');
	
    if($Article->create())
	{
		
		/*if($_FILES['pic']['name'])
		{
		  @unlink(C('cfg_pic').$data['pic']);  
		  $pics=upload();
		  if($pics['error'])
		  $this->error($pics['error']); 
		  else
		  $Article->pic=$pics['info'][0]['savename'];
		}*/
		 $imgpicList=I('imgpicList');
		 $Article->pic=$imgpicList[0];
		if(!$Article->where(array('id'=>$id))->save())
		 {
			//dump($Article->getlastsql());exit();
			$this->error('请重试'); 
		  }
		else
		{


			M('article_attr')->where(array('bid'=>$id))->delete();

			//文档属性处理
		   	if(isset($_POST['aid']))
			{
				$sql='INSERT INTO `'.C('DB_PREFIX').'article_attr` (bid,aid) VALUES';
				foreach($_POST['aid'] as $v)
				{
					$sql.='('.$id.','.$v.'),';
				}
				$sql=rtrim($sql,',');
				M('article_attr')->query($sql);
			}


			  //图片
			   /*$oldpic=I('oldpic');
			   
			   $datap= M('imgs')->where(array('aid'=>$id))->select();
			  
			  foreach ($datap as $p)
			   {
			  	if(!in_array($p['img'],  $oldpic))
			  	{
			  		@unlink("./".C('Cfg_pic').$p['img']);
			  		M('imgs')->where(array('img'=>$p['img']))->delete();
			  	}
			  }
		
	

			if(!empty($_FILES['img']['name'][0]))
			{

			  $pics=upload('img');
			  if($pics['error'])
				$this->error($pics['error']); 
			  else
				{
					foreach( $pics['info'] as $key=>$pic)
					{


						$datapa=array(
							'aid'=>$id,
							'img'=>$pic['savename']
							);
						M('imgs')->add($datapa);
						
					}
		
				}
			  
			}*/
			//清空原来的图片
			M('imgs')->where(array('aid'=>$id))->delete();
			$imgpic=I('imgpic');
			foreach( $imgpic as $pic)
        	{
	        	$datap=array(
					'aid'=>$id,
					'img'=>$pic,
				);
				M('imgs')->add($datap);
        	}

		  $etable=$datac['code'];
		  $dfiled=$this->getextend($datac['mid']);
		  for($i=0;$i<count($dfiled);$i++)
		  {
			if($dfiled[$i]['type']=="time")  
			$dataup[$dfiled[$i]['code']]=strtotime(I($dfiled[$i]['code']));
			else
			$dataup[$dfiled[$i]['code']]=I($dfiled[$i]['code']);
			
		  }
		  $dataup['content']=$_POST['content'];
		  $dataup['optime']=time();
		  D($etable)->where(array("aid"=>$id))->save($dataup);
		  $this->success('文档编辑成功',U('index',array('typeid'=>$data['typeid'])));		
		}	
	}
	else
	{
	  $this->getError();	
	}
    
 }
 
 
 //删除文档
 
 public function delall()
 {
   if(!IS_AJAX) _404(L('lan_common'),U('index'));	 
   $ids=explode(',',substr(I('id'),1));
   $Article=D('Article');
   $Category=D('Category');
   $flag=true;
   foreach($ids as $id)
   {
   	  //删除图片
   	  $this->delimg($id);
	  $data=$Article->find($id);
	  $datac=$Category->relation('Mtable')->find($data['typeid']);
	  $etable=ucfirst($datac['code']);
	  D($etable)->delete($id);
	  $count=$Article->delete($id);

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
 //删除单个文档 
 public function del()
 {
	$Article=D('Article');
	$Category=D('Category');
	$id=I('id');
	$data=$Article->find($id);
	$this->delimg($id);
	$datac=$Category->relation('Mtable')->find($data['typeid']);
	$etable=ucfirst($datac['code']);
	D($etable)->delete($id);
	if($Article->delete($id))
	  $this->success(L('lan_del'));
	else
	  $this->error(L('lan_error')); 
 }
 private function delimg($id)
 {
 	
	$data=M('Article')->find($id);
 	//删除图片
	@unlink('./'.C('cfg_pic').$data['pic']);
	$imgs=M('imgs')->where(array('aid'=>$id))->select();
	foreach($imgs as $img)
	{
		@unlink('./'.C('cfg_pic').$img['img']);
	}
 }
 
 //审核
 public function  check()
 {
	if(!IS_AJAX) _404(L('lan_common'),U('index'));	 
    if($this->change('isshow',1,explode(',',substr(I('id'),1))))
	$this->ajaxReturn(array('status'=>0),'JSON');
	else
	$this->ajaxReturn(array('status'=>1),'JSON');
 }
 public function  dcheck()
 {
	if(!IS_AJAX) _404(L('lan_common'),U('index'));	 
    if($this->change('isshow',0,explode(',',substr(I('id'),1))))
	$this->ajaxReturn(array('status'=>0),'JSON');
	else
	$this->ajaxReturn(array('status'=>1),'JSON');
 }
 //推荐
 public function  best()
 {
	 if(!IS_AJAX) _404(L('lan_common'),U('index'));	 
    if($this->change('isbest',1,explode(',',substr(I('id'),1))))
	$this->ajaxReturn(array('status'=>0),'JSON');
	else
	$this->ajaxReturn(array('status'=>1),'JSON');
 }
 
 public function  dbest()
 {
	if(!IS_AJAX) _404(L('lan_common'),U('index'));	 
    if($this->change('isbest',0,explode(',',substr(I('id'),1))))
	$this->ajaxReturn(array('status'=>0),'JSON');
	else
	$this->ajaxReturn(array('status'=>1),'JSON');
 }
 //执行属性
 private function change($field,$value,$ids)
 { 	 
   $Article=D('Article');
   $flag=true;
   foreach($ids as $id)
   {
	 
	 $where['id']=$id;
	 if(!$Article->where($where)->save(array($field=>$value,'optime'=>time())));   
	 {
	    $flag=false;
	 }
   }
   return $flag;
	 
 }
 //排序文章
 public function do_sort()
 {
	 
	 $Article=D('Article');
	 $id=I('id');
	 //$sort=I('sort');
 
	 $flag=true;
	 for($i=0;$i<count($id);$i++)
	 {
		$data['id']=$id[$i];
		$data['sort']=I('sort_'.$id[$i]);
		$data['optime']=time();
		if(!$Article->save($data))
           {
			  $flag=false;
			  break; 
		   }
	
	 }
	 if($flag)
	 	$this->success(L('lan_sort'),U('index',array('typeid'=>I('typeid')))); 
	 else
	 	$this->error(L('lan_sorte'),U('index')); 
	 
 }
 //属性添加
 public function attr()
 {
 	$attrid=I("attrid");
 	$id=explode(',',substr(I('id'),1));
 	foreach($id as $v)
 	{
 		M('article_attr')->where(array('bid'=>$v,'aid'=>$attrid))->delete();
 		$data=array(
 			'bid'=>$v,
 			'aid'=>$attrid,
 		);
 		M('article_attr')->add($data);
 	}
 	$this->ajaxReturn(array('status'=>1),'JSON');
 }
 //属性删除
 public function dattr()
 {
 	$attrid=I("attrid");
 	$id=explode(',',substr(I('id'),1));
 	foreach($id as $v)
 	{
 		M('article_attr')->where(array('bid'=>$v,'aid'=>$attrid))->delete();
 	}
 	$this->ajaxReturn(array('status'=>1),'JSON');
 }
 //栏目类别
 
 private function getCategory($typeid=0)
 {

 	$lists=D("Category")->category(gettopid($typeid));
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
 	}
 	return $clists;
 }
 //额外字段
 private function getextend($id)
 {
  if($id)
  {
	 $Field=M('Field');
     $dfield=$Field->where(array('mid'=>$id))->select();
  }

  return $dfield;
  }
  //图片上传
 public function ajaxuppic()
    {
    	$pic=upload('pic');
    	if($pic['error'])
    		$this->ajaxReturn(array('error'=>$pic['error']),'JSON');
    	else
    	{
    		//dump($pic);
    		$this->ajaxReturn(array('msg'=>$pic[info][0]['savename']),'JSON');
    	}
    }
  //图片上传
 public function ajaxup()
    {
    	$pic=upload('img');
    	if($pic['error'])
    		$this->ajaxReturn(array('error'=>$pic['error']),'JSON');
    	else
    	{
    		//dump($pic);
    		$this->ajaxReturn(array('msg'=>$pic[info][0]['savename']),'JSON');
    	}
    }
//图片删除
public function del_img()
	{
		$path='./'.C('cfg_pic').I('path');
		@unlink($path);
	}
}
?>