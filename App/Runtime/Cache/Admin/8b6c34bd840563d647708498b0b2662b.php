<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>文档管理</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
     <script  type="text/javascript">
     var delurl="<?php echo U('delall');?>";//删除
     var checkurl="<?php echo U('check');?>";//审核
	 var dcheckurl="<?php echo U('dcheck');?>";//删除审核
	 var turl="<?php echo U('index',array('typeid'=>I('typeid')));?>";
     </script>
     <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>
</head>
<body>
<table width="98%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6">
<form name="form" action="<?php echo U('do_sort');?>" method='post'>
  <tr>
    <td height="27" colspan="8" background="__PUBLIC__/Images/tbg.gif" bgcolor="#E7E7E7">
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="24%" style="padding-left:10px;"><b>评论管理</b> </td>
          <td width="76%" align="right"><b>
           
            </b>
          </td>
        </tr>
      </table>
     </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="24" colspan="8">　</td>
  </tr>
  <tr bgcolor="#FBFCE2">
    <td width="6%" height="24" align="center">选择<input name='all' type="checkbox" value=""></td>
    <td width="17%" align="center">标题</td>
    <td width="14%" align="center">评论时间</td>
    <td width="13%" align="center">评论用户</td>
    <td width="16%" align="center">评论内容</td>
    <td width="11%" align="center">评分</td>
    <td width="12%" align="center">审核</td>

    
    <td width="11%" align="center">管理项</td>
  </tr>
  <?php if(is_array($lists)): foreach($lists as $key=>$list): ?><tr bgcolor="#FFFFFF" align="center" class="hover">
      <td width="6%" height="24" align="center"><input class="aid" type="checkbox" name="id[]" id="sort_<?php echo ($list['id']); ?>" value="<?php echo ($list['id']); ?>"/></td>
    <td width="17%" height="24" align="left"><a href="{$list['yurl']}" ><?php echo ($list['title']); ?></a></td>
    <td width="14%" align="center"><?php echo (date("Y-m-d",$list['time'])); ?></td>
    <td width="13%" height="24" align="center"><?php echo ($list['username']); ?></td>
    <td width="16%" height="24" align="left"><?php echo ($list['content']); ?></td>
    <td width="11%" align="center"><?php echo ($list['score']); ?></td>
    <td width="12%" align="center"><?php if($list['isshow'] == 1): ?>显示<?php else: ?><span class="red">不显示</span><?php endif; ?></td>


    <td >
     <a href="<?php echo U('del',array('id'=>$list['id']),'');?>" class='confirmdel'><u>删除</u></a> 
    </td>
  </tr><?php endforeach; endif; ?>
  <tr bgcolor="#F9FCEF">
    <td height="24" colspan="8" align="left" valign="top" style=" padding-left:10px">
      <span><input type="button"  value="审核"  class='check' ></span>
      <span><input type="button"  value="删除审核" class='dcheck'></span>
      <span><input type="button"  value="删除文档" class='del '></span>
    </td>
  </tr>
    <tr bgcolor="#F9FCEF">
    <td height="24" colspan="8" align="center" valign="top">
      <span><?php echo ($page); ?></span>
    </td>
  </tr></form>
  
</table>


</body>
</html>