<?php
import('@.Common.Users');
Class LoginAction extends Action
{
  public function index()
  {
    if(!file_exists('./Common/dblink.php'))
      $this->redirect('intall.php');
	if(file_exists("./install.php"))
       unlink("./install.php");
	if(file_exists("./Install"))
      deldir("./Install"); 
    //验证码
    $Codeconfig=D('Codeconfig');
    $iscode=$Codeconfig->find();
	$oprea=explode(',',$iscode['oprea']);
	if(in_array(1,$oprea))
	  $isopen=1;
	else
	  $isopen=0;
	$this->assign('isopen',$isopen);
  	$this->display(); 
  }
 public function do_login()
 {
 	if(!IS_POST) _404(L('lan_common'),U(GROUP_NAME.'/Login/index'));
	
	if(I('isopen'))
	{
	  if(session('verify')!= md5($_POST['code'])) 
		{
   			$this->error('验证码错误！');
		}
	}
	
 	$Users=New Users();
 	$flag=false;
 	$flag=$Users->login(I('username'),I('password'));
 	if($flag)
 		$this->success(L('lan_loginsuccess'),U(GROUP_NAME.'/Index/index'));
 	else
 		$this->error(L('lan_loginfialed'));
 }
 /**
 * 退出
 * @return [type] [description]
 */
public function loginout()
 {
 	$Users=new Users();
 	if($Users->loginout())
 	{
 		$this->redirect(GROUP_NAME.'/Login/index');
 	}
 }
}
?>