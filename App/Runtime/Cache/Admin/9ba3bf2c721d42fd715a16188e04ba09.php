<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>系统用户管理</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>
	<script type="text/javascript">
	$(function(){
		$('.nodel').click(function(){
			alert('<?php echo (L("lan_zyd")); ?>');
			return false;
		});
   
		
		
	});
</script>
</head>
<body>
<table width="98%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6">
  <tr>
    <td height="27" colspan="6" background="__PUBLIC__/Images/tbg.gif" bgcolor="#E7E7E7">
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="24%" style="padding-left:10px;"><b><?php echo (L("lan_gl")); ?></b> </td>
          <td width="76%" align="right"><b>
          
            <a href="<?php echo u('addUser');?>"><u><?php echo (L("lan_add")); ?></u></a>
        
            </b>
          </td>
        </tr>
      </table>
     </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="24" colspan="6">　§<?php echo (L("lan_zy")); ?></td>
  </tr>
  <tr bgcolor="#FBFCE2">
    <td width="18%" height="24" align="center"><?php echo (L("lan_id")); ?></td>
    <td width="23%" align="center"><?php echo (L("lan_nickname")); ?></td>
    <td width="12%" align="center"><?php echo (L("lan_lastloginip")); ?></td>
    <td width="12%" align="center"><?php echo (L("lan_lastlogintime")); ?></td>
    <td width="12%" align="center">角色</td>
    <td width="23%" align="center"><?php echo (L("lan_op")); ?></td>
  </tr>
  <?php if(is_array($lists)): foreach($lists as $key=>$list): ?><tr bgcolor="#FFFFFF" align="center" class="hover">
    <td width="18%" height="24" align="center"><?php echo ($list['username']); ?></td>
    <td width="23%" align="center"><?php echo ($list['nickname']); ?></td>
    <td width="12%" align="center"><?php echo ($list['loginip']); ?></td>
    <td width="12%" align="center"><?php echo (date("Y-m-d H:i:s",$list['lastlogintime'])); ?></td>
    <td width="12%" align="center"><?php if(is_array($list["Role"])): foreach($list["Role"] as $key=>$r): echo ($r['remark']); ?><br/><?php endforeach; endif; ?></td>
    <td >
     <a href='<?php echo U('editUser',array('id'=>$list['id']),'');?>' ><u><?php echo (L("lan_change")); ?></u></a> |
     <a href='<?php echo U('delUser',array('id'=>$list['id']),'');?>' class='<?php if($list['id'] == 1): ?>nodel<?php endif; ?> confirmdel'><u><?php echo (L("lan_delc")); ?></u></a>
    </td>
  </tr><?php endforeach; endif; ?>
    <tr bgcolor="#F9FCEF">
    <td height="24" colspan="6" align="center" valign="top">
      <span><?php echo ($page); ?></span>
    </td>
  </tr>

</table>
</body>
</html>