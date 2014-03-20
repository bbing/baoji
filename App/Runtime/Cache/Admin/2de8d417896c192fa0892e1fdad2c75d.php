<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>角色列表</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>

</head>
<body>
<table width="98%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6">
  <tr>
    <td height="27" colspan="5" background="__PUBLIC__/Images/tbg.gif" bgcolor="#E7E7E7">
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="24%" style="padding-left:10px;"><b>角色列表</b> </td>
          <td width="76%" align="right"><b>
          
            <a href="<?php echo u('addRole');?>"><u>添加角色</u></a>
        
            </b>
          </td>
        </tr>
      </table>
     </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="24" colspan="5">　</td>
  </tr>
  <tr bgcolor="#FBFCE2">
    <td width="18%" height="24" align="center">角色ID</td>
    <td width="23%" align="center">角色名称</td>
    <td width="12%" align="center">描述</td>
    <td width="12%" align="center">状态</td>
    <td width="12%" align="center">操作</td>
  </tr>
  <?php if(is_array($lists)): foreach($lists as $key=>$list): ?><tr bgcolor="#FFFFFF" align="center" class="hover">
    <td width="18%" height="24" align="center"><?php echo ($list['id']); ?></td>
    <td width="23%" align="center"><?php echo ($list['name']); ?></td>
    <td width="12%" align="center"><?php echo ($list['remark']); ?></td>
  
    <td width="12%" align="center"><?php if($list['status']): ?>开启<?php else: ?>关闭<?php endif; ?></td>
    <td  align="left">
     <?php if($list['id'] != 1): ?><a href='<?php echo U('addAccess',array('id'=>$list['id']),'');?>' ><u>分配权限</u></a> |<?php endif; ?><a href='<?php echo U('editRole',array('id'=>$list['id']),'');?>' ><u>编辑</u></a> |
     <a href='<?php echo U('delRole',array('id'=>$list['id']),'');?>' class='confirmdel'><u>删除</u></a>
    </td>
  </tr><?php endforeach; endif; ?>
   

</table>
</body>
</html>