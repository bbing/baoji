<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo (L("lan_mode")); ?></title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>

</head>
<body>
<table width="98%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6">
  <tr>
    <td height="27" colspan="6" background="__PUBLIC__/Images/tbg.gif" bgcolor="#E7E7E7">
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="24%" style="padding-left:10px;"><b><?php echo (L("lan_mode")); ?></b> </td>
          <td width="76%" align="right"><b>
          
         
        
            </b>
          </td>
        </tr>
      </table>
     </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="24" colspan="6"><?php echo (L("lan_zy")); ?></td>
  </tr>
  <tr bgcolor="#FBFCE2">
    <td width="18%" height="24" align="center">ID</td>
    <td width="23%" align="center"><?php echo (L("lan_name")); ?></td>
    <td width="12%" align="center"><?php echo (L("lan_table")); ?></td>
    <td width="12%" align="center"><?php echo (L("lan_time")); ?></td>
    <td width="23%" align="center"><?php echo (L("lan_op")); ?></td>
  </tr>
  <?php if(is_array($lists)): foreach($lists as $key=>$list): ?><tr bgcolor="#FFFFFF" align="center" class="hover">
      <td width="18%" height="24" align="center"><?php echo ($list['id']); ?></td>
    <td width="18%" height="24" align="center"><?php echo ($list['name']); ?></td>
    <td width="23%" align="center"><?php echo ($list['code']); ?></td>
<td width="12%" align="center"><?php echo (date("Y-m-d H:i:s",$list['optime'])); ?></td>
    <td >
     <a href='<?php echo U('fieldlist',array('id'=>$list['id']));?>' ><u><?php echo (L("lan_edit")); ?></u></a> |
     <a href='<?php echo U('del',array('id'=>$list['id']));?>' class='confirmdel'><u><?php echo (L("lan_delc")); ?></u></a>
    </td>
  </tr><?php endforeach; endif; ?>
    <tr bgcolor="#F9FCEF">
    <td height="24" colspan="6" align="center" valign="top">
      <span><?php echo ($page); ?></span>
    </td>
  </tr>
  
  <tr bgcolor="#FFFFFF">
    <td height="24" colspan="6" valign="top">
    <form action="<?php echo U('do_add');?>" method='post'>
        <table height="30" width='100%'>
       <tr>
        <td>  
        <?php echo (L("lan_name")); ?>:<input type="text" name="name" /> 
        <?php echo (L("lan_table")); ?>:<input type="text" name="code" /> 
        <input type="submit" name="submit" value="<?php echo (L("lan_addtable")); ?>" /></td>
        </tr>
        </table>
        <input type="hidden" value="<?php echo ($id); ?>" name='id'>
     </form>
    　</td>
  </tr>
</table>
</body>
</html>