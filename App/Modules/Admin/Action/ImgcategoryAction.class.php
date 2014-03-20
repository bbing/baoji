<?php
Class ImgcategoryAction extends CommonAction
{

  //分类列表
  public function index()
  {
	$this->assign("lists",$this->getCategory());
	$this->display();
  }
  
  //添加分类
  public function do_add()
  {

	  
	 $Imgcategory=D('Imgcategory');
	
	  if($Imgcategory->create())
	  {
		   
		   if($Imgcategory->add())
		   {
			   $this->success(L('lan_success'),U(GROUP_NAME.'/Imgcategory/index'));
		   }
		   else
		   {
			  $this->error(L('lan_error'));    
		   }
	  }
	  else
	  {
		$this->error($Imgcategory->geterror());   
	  } 
	  
  }
  
 //排序和修改
 public function do_sort()
 {
  $Imgcategory=D('Imgcategory');
  $id=I('id');
  //$sort=I('sort');
  //$typename=I('typename');
  $flag=true;
;
  for($i=0;$i<count($id);$i++)
  {
	$data['id']=$id[$i];
	$data['typename']=I('typename_'.$id[$i]);
	$data['sort']=I('sort_'.$id[$i]);
	$data['optime']=time();
	if(!$Imgcategory->save($data))
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
  
  
  
  //分类名称
   private function getCategory()
   {
  
	  $lists=D("Imgcategory")->category();
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
   
   
   //删除文档
 
 public function delall()
 {
   if(!IS_AJAX) _404(L('lan_common'),U('index'));	 
   $ids=explode(',',substr(I('id'),1));

   
   $Imgcategory=D('Imgcategory');
 
   $flag=true;
   foreach($ids as $id)
   {
	 
	  $count=$Imgcategory->delete($id);

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
	$Imgcategory=D('Imgcategory');
	$id=I('id');
	if($Imgcategory->delete($id))
	  $this->success(L('lan_del'));
	else
	  $this->error(L('lan_error')); 
 }
 	
}


?>