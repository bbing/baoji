<?php
//设置验证码
Class PublicAction extends Action
{

Public function verify(){
	import('ORG.Util.Image');
	$Codeconfig=D('Codeconfig');
	$data=$Codeconfig->find();
	if($data['model']==4)
	Image::GBVerify($data['length'],'png',$data['width'],$data['height']);
	else
	Image::buildImageVerify($data['length'],$data['model'],'png',$data['width'],$data['height']);
}

}
?>