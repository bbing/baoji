<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加角色</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>
 
</head>
<body background='__PUBLIC__/Images/allbg.gif' leftmargin='8' topmargin='8'>
	<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#D6D6D6">
  <tr>
    <td height="19" background="__PUBLIC__/Images/tbg.gif" bgcolor="#E7E7E7"> 
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <tr> 
          <td style="padding-left:10px;"><b><strong>添加角色</strong></b> </td>
          <td align='right'><a href="<?php echo U('role');?>"><b><strong>返回角色列表</strong></b></a> </td>
        </tr>
      </table></td>
   </tr>
  <tr>
  <td height="215" align="center" valign="top" bgcolor="#FFFFFF">
	<form name="form1" action="<?php echo U('do_addRole');?>" method="post">
        <table width="98%" border="0" cellspacing="1" cellpadding="1">
          <tr> 
            <td width="16%" height="30"><span class='red'>*</span>角色名称：</td>
            <td width="84%" style="text-align:left;"><input name="name" type="text" id="name" size="16" style="width:200px" /> &nbsp;
           </td>
          </tr>
          
          <tr> 
            <td height="30">角色描述：</td>
            <td style="text-align:left;">
            	<input name="remark" type="text" id="remark" size="16" style="width:200px" /> &nbsp;
            </td>
          </tr>


		  <tr> 
            <td height="30">状态：</td>
            <td style="text-align:left;">
            	<input type="radio" name="status"  value="1"   checked="checked"/>开启&nbsp;
                <input type="radio" name="status"  value="0" />关闭
            </td>
          </tr>
         
          <tr> 
            <td height="60">&nbsp;</td>
            <td style="text-align:left;">
            	<input type="submit" name="submit" value=" <?php echo (L("lan_submit")); ?> " class="coolbg np" />
            </td>
          </tr>
        </table>
      </form>
	  </td>
</tr>
</table>
</body>
</html>