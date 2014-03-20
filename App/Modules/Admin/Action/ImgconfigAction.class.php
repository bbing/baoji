<?php

Class ImgconfigAction extends CommonAction
{
	
   public function index()
   {
	   $Imgconfig=D('Imgconfig');
	   $data=$Imgconfig->find();
	   $data['oprea']=explode(',',$data['oprea']);
       $this->assign('data',$data);
	   $this->display();
	   
  }	
  public function do_edit()
  {
	if(!IS_POST) _404(L('lan_common'),U(GROUP_NAME.'/Config/index'));
	
	if(F('water',I('post.'),CONF_PATH))
   	$this->success('更新成功');
   else
   	$this->error('请重试');
  }


}

?>