<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $cfg_soft_lang; ?>">
<title><?php echo $cfg_softname." ".$cfg_version; ?></title>
<link href="css/base.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/Js/jquery.js" language="javascript" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(__PUBLIC__/Images/login/login_01.gif);
}
.unnamed1 {
	text-decoration: none;
	font-size: 12px;
	color: #FFFFFF;
	letter-spacing: 0.1em;
}
.unnamed2 {
	font-size: 12px;
	color: #000000;
	text-decoration: none;
	letter-spacing: 0.1em;
}
.unnamed4 {
	font-size: 12px;
	text-decoration: none;
	border: 1px solid #75A1C4;
	line-height: 14px;
}
.bai {
	font-size: 12px;
	line-height: 20px;
	color: #FFFFFF;
}
.bian {
	border: 1px solid #FFFFFF;
}
.from1 {
	margin: 0px;
}
-->
</style>
<script language="javascript"> 
<!--
function chkLogin()
{
	if ($('input[name="username"]').val()=="") {
		alert("请输入用户名!");
		$('input[name="username"]').focus();
		return false;
	}
	if ($('input[name="password"]').val()=="") {
		alert("请输入用户密码!");
		$('input[name="password"]').focus();
		return false;
	}
	
}
 
$(function(){
	 $('input[name="username"]').focus();//初始化 文本框焦点为用户名
	
	});

 
//-->
</script>
</head>

<body >
<form action="<?php echo U(GROUP_NAME.'/Login/do_login');?>" method="post"  onsubmit='return chkLogin()' name="form1">
  <div style="vertical-align: middle; text-align: center; width: 100%; height: 100%; font-size: 15pt;"> <br />
    <br />
    <br />
    <br />
    <table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style=" margin-top:20px;">
      <tr>
        <td colspan="2"><a href="http://www.djie.net" target="_blank"><img src="__PUBLIC__/Images/login/login_04.gif" width="582" height="88" border="0"></a></td>
      </tr>
      <tr>
        <td width="280"><img src="__PUBLIC__/Images/login/login_06.gif" width="280" height="205"></td>
        <td width="302" background="__PUBLIC__/Images/login/login_07.gif"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="22%" height="28" class="bai">用户名:</td>
              <td colspan="2"  align="left"><input type="text" name="username" style="width:110px"/></td>
            </tr>
            <tr>
              <td height="28"><span class="bai">密 码:</span><br></td>
              <td colspan="2" align="left"><input type="password" class="alltxt" name="password"  style="width:110px"/></td>
            </tr>
            <?php if($isopen): ?><tr>
              <td height="28"><span class="bai">验证码:</span><br></td>
              <td width="42%" align="left"><input type="text" class="alltxt" name="code"  style="width:110px"/></td>
             <td width="36%"  align="left"><img src="<?php echo U(GROUP_NAME.'/Public/verify');?>" onclick="this.src='<?php echo U(GROUP_NAME.'/Public/verify');?>'+'/'+Math.random()"></td>
             </tr><?php endif; ?>
            <tr>
              <td>&nbsp;</td>
              <td height="35" colspan="2" valign="bottom">
              <input type="hidden" value="<?php echo ($isopen); ?>" name="isopen">
              <button type="submit" name="sm1" class="login-btn" >登录</button>
                &nbsp;&nbsp; </td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td height="50" colspan="2" style="background-image:url(__PUBLIC__/Images/login/login_19.gif) ; background-repeat:no-repeat; color:#0077b7; font-size:9px; text-align:right; padding:0px 32px 12px 0; ">Copyright © 2008 <a href="http://www.djweilai.com" target="_blank" style="color:#0077b7; font-size:9px">Djweilai.com </a>All rights reserved</td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>