<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>文档属性管理</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>

  <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>
</head>
<body>
<table width="98%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6">

  <tr>
    <td height="27" colspan="4" background="__PUBLIC__/Images/tbg.gif" bgcolor="#E7E7E7">
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="24%" style="padding-left:10px;"><b>所有文档属性</b> </td>
          <td width="76%" align="right">
            <b>
            <a href="<?php echo U(GROUP_NAME.'/Attr/add');?>">
              <u>添加属性</u>
            </a>
            </b>
          </td>
        </tr>
      </table>
     </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="24" colspan="4">　</td>
  </tr>
  <tr bgcolor="#FBFCE2">
    <td width="7%" height="24" align="center">ID</td>
    <td width="36%" align="center">属性名称</td>
    <td width="11%" align="center">标题颜色</td>
    <td width="22%" align="center">管理项</td>
  </tr>
  <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><tr bgcolor="#FFFFFF" align="center" class="hover">
      <td  height="24" align="center"><?php echo ($v["id"]); ?></td>
      <td  height="24" align="center"><?php echo ($v["name"]); ?></td>
      <td  height="24" align="center"><div style="width:20px;height:20px; background-color:<?php echo ($v["color"]); ?>"></div></td>
    <td >
     <a href="<?php echo U('edit',array('id'=>$v['id']));?>" >
      <u>修改</u>
    </a> |
     <a href="<?php echo U('del',array('id'=>$v['id']),'');?>" class='confirmdel'>
      <u>删除</u>
     </a> 
    </td>
  </tr><?php endforeach; endif; ?>
 
 

  
</table>


</body>
</html>