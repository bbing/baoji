<?php

Class CommentAction extends CommonAction
{

  public function index()
  {
	$Comment=D('Comment');
	import('ORG.Util.Page');
	$count= $Comment->Relation(true)->count();
	$Page= new Page($count,25);
	$show= $Page->show();
	$list= $Comment->Relation(true)->limit($Page->firstRow.','.$Page->listRows)->select();
	$this->assign('lists',$list);
	$this->display();
   
  }
  
  
  
 //删除文档
 
 public function delall()
 {
   if(!IS_AJAX) _404(L('lan_common'),U('index'));	 
   $ids=explode(',',substr(I('id'),1));
   $Comment=D('Comment');
 
   $flag=true;
   foreach($ids as $id)
   {
	 
	  $count=$Comment->delete($id);

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
	$Comment=D('Comment');
	$id=I('id');
	if($Comment->delete($id))
	  $this->success(L('lan_del'));
	else
	  $this->error(L('lan_error')); 
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
 
 
 //执行属性
 private function change($field,$value,$ids)
 { 	 
   $Comment=D('Comment');
   $flag=true;
   foreach($ids as $id)
   {
	 $where['id']=$id;
	 if(!$Comment->where($where)->save(array($field=>$value,'optime'=>time())));   
	  $flag=false;
	  break;
   }
   return $flag;
	 
 }
}

?>