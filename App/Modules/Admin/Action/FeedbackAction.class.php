<?php
Class FeedbackAction extends Action
{
  public function index()
  {
	$Feedback=D('Feedback');
	import('ORG.Util.Page');
	$count= $Feedback->count();
	$Page= new Page($count,25);
	$show= $Page->show();
	$list= $Feedback->limit($Page->firstRow.','.$Page->listRows)->select();
	
	
	$this->assign('lists',$list);
	$this->page=$show;
	$this->display();  
  }
  
  public function edit()
  {
    $id=I('id');  
	$Feedback=D('Feedback');
	$data=$Feedback->find($id);
	$this->assign('data',$data);
	
	$this->display(); 
  }
  
 public function do_edit()
 {
    if(!IS_POST) _404(L('lan_common'),U('index'));	 
	$id=I('id');  
	$Feedback=D('Feedback');
	if($Feedback->create())
	{
		if($Feedback->save())
		{ 
		   $this->success('编辑成功',U('index'));
		}
		else
		{  
			$this->error('请重试');
		}
	}
	else
	{
	  $this->error($Feedback->getError());
	}
 }
 
 public function del()
 {
   $id=I('id');
   $Feedback=D('Feedback');
   if($Feedback->delete($id))
   {
	  $this->assign('删除成功');
   } 
   else
   {
	  $this->error('请重试');
   }
 }
 
 public function delall()
 { 
   if(!IS_AJAX) _404(L('lan_common'),U('index'));	 
   $ids=explode(',',substr(I('id'),1));
   $Feedback=D('Feedback');
   $flag=true;
   foreach($ids as $id)
   {
	  

	  $count=$Feedback->delete($id);

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
}
?>