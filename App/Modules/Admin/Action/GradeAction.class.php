<?php
Class GradeAction extends CommonAction
{
	
  public function index()
  {
	
	$order['id']='desc';
    $Grade=D('Grade');
	import('ORG.Util.Page');
	$count= $Grade->where($where)->count();
	$Page= new Page($count,25);
	$show= $Page->show();
	$list= $Grade->field($field)->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();

	$this->assign('lists',$list);
	$this->assign('page',$show);
	$this->display();
  }
  public function do_add()
  {
	 if(!IS_POST) _404(L('lan_common'),U('index')); 
	 $Grade=D('Grade');
	 if($Grade->create())
	 {
       if($Grade->add())
	      $this->success('添加成功');
	   else
	   	  $this->error('请重试'); 
	   	 
     } 
	 else
	     $this->error($Grade->getError()); 
	
	  
  }
  public function do_sort()
  {
	  
	 $Grade=D('Grade');
	 $id=I('id');
	 $gradename=I('gradename');
	 $score=I('score');
 
	 $flag=true;
	 for($i=0;$i<count($id);$i++)
	 {
		$data['id']=$id[$i];
		$data['gradename']=$gradename[$i];
		$data['score']=$score[$i];
		$data['optime']=time();
		if(!$Grade->save($data))
           {
			  $flag=false;
			  break; 
		   }
	
	 }
	 if($flag)
	 	$this->success('更改成功',U('index')); 
	 else
	 	$this->error('请重试',U('index')); 
	  
  }
 //删除单个文档 
 public function del()
 {
	$Grade=D('Grade');
	$id=I('id');

	if($Grade->delete($id))
	  $this->success(L('lan_del'));
	else
	  $this->error(L('lan_error')); 
 }	
	
	
}



?>