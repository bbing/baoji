<?php

class CodeconfigAction extends CommonAction
{
  //设置验证码
  public function index()
  { 
	 $Codeconfig=D('Codeconfig');
	 $data=$Codeconfig->find();
	 $data['oprea']=explode(',',$data['oprea']);
     $this->assign('data',$data);
	 $this->display();
  }	
  
  public function do_edit()
  {
	if(!IS_POST) _404(L('lan_common'),U(GROUP_NAME.'/Config/index'));
    $Codeconfig=D('Codeconfig');
	$data['oprea']=implode(',',I("oprea"));
	$data['height']=I("height");
	$data['width']=I("width");
	$data['length']=I("length");
	$data['model']=I("model");
	$data['optime']=time();
    $count=$Codeconfig->where(array('id'=>1))->save($data);
	if($count>0)
	{
	  $this->success('编辑成功');
	}
	else
	{
	  $this->error('请重试');
	}
  }
}

?>