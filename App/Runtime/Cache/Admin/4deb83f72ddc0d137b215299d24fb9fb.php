<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>验证码设置</title>
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
          <td style="padding-left:10px;"><b><strong>验证码设置</strong></b> </td>
          <td align='right'></td>
        </tr>
      </table></td>
   </tr>
  <tr>
  <td height="215" align="center" valign="top" bgcolor="#FFFFFF">
	<form name="form1" action="<?php echo U('do_edit');?>" method="post">
        <table width="98%" border="0" cellspacing="1" cellpadding="1">
          <tr> 
            <td width="20%" height="30">验证码位置：</td>
            <td width="80%" style="text-align:left;">
            <label><input name="oprea[]" type="checkbox" value="1"  <?php if(is_array($data["oprea"])): foreach($data["oprea"] as $key=>$p): if($p == 1): ?>checked<?php endif; endforeach; endif; ?> >管理员登陆</label>&nbsp;
            <label><input name="oprea[]" type="checkbox" value="2" <?php if(is_array($data["oprea"])): foreach($data["oprea"] as $key=>$p): if($p == 2): ?>checked<?php endif; endforeach; endif; ?>>会员登陆</label>&nbsp;
            <label><input name="oprea[]" type="checkbox" value="3" <?php if(is_array($data["oprea"])): foreach($data["oprea"] as $key=>$p): if($p == 3): ?>checked<?php endif; endforeach; endif; ?>>会员注册</label>&nbsp;
            <label><input name="oprea[]" type="checkbox" value="4" <?php if(is_array($data["oprea"])): foreach($data["oprea"] as $key=>$p): if($p == 4): ?>checked<?php endif; endforeach; endif; ?>>评论</label>&nbsp;
            &nbsp;
           </td>
          </tr>
          
          <tr> 
            <td width="20%" height="30">验证码宽度：</td>
            <td width="80%" style="text-align:left;">
            <input name="width" type="text"  style="width:300px" value="<?php echo ($data['width']); ?>"> &nbsp;px
           </td>
          </tr>
           <tr> 
            <td width="20%" height="30">验证码高度：</td>
            <td width="80%" style="text-align:left;">
            <input name="height" type="text"  style="width:300px" value="<?php echo ($data['height']); ?>"> &nbsp;px
           </td>
          </tr>
           <tr> 
            <td width="20%" height="30">验证码长度：</td>
            <td width="80%" style="text-align:left;">
            <input name="length" type="text"  style="width:300px" value="<?php echo ($data['length']); ?>"> &nbsp;
           </td>
          </tr>
          <tr> 
            <td width="20%" height="30">验证码类型：（字母区分大小写）</td>
            <td width="80%" style="text-align:left;">
            <label><input name="model" type="radio" value="0" <?php if($data['model'] == 0): ?>checked<?php endif; ?>>字母</label>&nbsp;
            <label><input name="model" type="radio" value="1" <?php if($data['model'] == 1): ?>checked<?php endif; ?>>数字</label>&nbsp;
            <label><input name="model" type="radio" value="2" <?php if($data['model'] == 2): ?>checked<?php endif; ?>>大写字母</label>&nbsp;
            <label><input name="model" type="radio" value="3" <?php if($data['model'] == 3): ?>checked<?php endif; ?>>小写字母</label>&nbsp;
            <label><input name="model" type="radio" value="4" <?php if($data['model'] == 4): ?>checked<?php endif; ?>>中文</label>&nbsp;
            <label><input name="model" type="radio" value="5" <?php if($data['model'] == 5): ?>checked<?php endif; ?>>数字和字母混合</label>&nbsp;
           </td>
          </tr>
          <tr> 
            <td height="60">当前设置预览:（请保存后查看预览）</td>
            <td align="left">
            	<img src="<?php echo U(GROUP_NAME.'/Public/verify');?>" onclick="this.src='<?php echo U(GROUP_NAME.'/Public/verify');?>'+'?'+Math.random()"/>
            </td>
          </tr>
          <tr> 
            <td height="60">&nbsp;</td>
            <td align="left">
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