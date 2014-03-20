<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>网站栏目管理</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
  <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>

</head>
<body> <form name="form" action="<?php echo U('do_sort');?>" method='post'>
	<table width="98%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6">
  <tr>
    <td height="27" colspan="5" background="__PUBLIC__/Images/tbg.gif" bgcolor="#E7E7E7">
    
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="24%" style="padding-left:10px;"><b><?php echo (L("lan_lists")); ?></b> </td>
          <td width="76%" align="right" background="__PUBLIC__/images/frame/tbg.gif"><b>
          
            <a href="<?php echo U('add');?>"><u><?php echo (L("lan_add")); ?></u></a>
        
            </b>
          </td>
        </tr>
      </table>
     </td>
  </tr>
     <tr>
    <td bgcolor="#FFFFFF" align="left" colspan='5' style="padding-left:10px;"><?php echo (L("lan_info")); ?></td>
 
  </tr>
  <tr>
  <td width="4%" align="center" bgcolor="#FFFFFF">ID</td>
  <td bgcolor="#FFFFFF" align="center"><?php echo (L("lan_name")); ?></td>
  <td bgcolor="#FFFFFF" align="center"><?php echo (L("lan_type")); ?></td>
	<td bgcolor="#FFFFFF" align="center"><?php echo (L("lan_csort")); ?></td>
	<td width="27%" align="center" bgcolor="#FFFFFF"><?php echo (L("lan_cdo")); ?></td>
  </tr>
 
  <?php if(is_array($lists)): foreach($lists as $key=>$list): ?><tr bgcolor="#FFFFFF" align="center"   class='hover' >
    <td><input class="aid" type="checkbox" name="id[]" id="sort_<?php echo ($list['id']); ?>" value="<?php echo ($list['id']); ?>"/><?php echo ($list['id']); ?></td>
    <td width="35%" height="24" align="left" style="padding-left:10px" ><a href='<?php echo U('edit',array('id'=>$list['id']),'');?>'><?php echo ($list['fullname']); ?></a> <?php if($list['isshow'] == 0): ?>(<font color='red'><?php echo (L("lan_hide")); ?></font>)<?php endif; if($list['pic']): ?>(<font color='red'>图片</font>)<?php endif; ?></td>
    <td width="20%" height="24" align="center" style="padding-left:10px" >
      <?php switch($list['type']): case "0": echo (L("lan_category")); break;?>
        <?php case "1": echo (L("lan_channel")); break;?>
        <?php case "2": echo (L("lan_link")); break; endswitch;?>
    </td>
    <td width="14%" height="24" align="center" style="padding-left:10px" >
	<input type="text" class='sort' name="sort_<?php echo ($list['id']); ?>" value="<?php echo ($list['sort']); ?>" id="<?php echo ($list['id']); ?>" size='2' />
    <td>
     <a href="<?php echo U('Article/index',array('typeid'=>$list['id']),'');?>"><u><?php echo (L("lan_see")); ?></u></a>|
     <a href='<?php echo U('edit',array('id'=>$list['id']),'');?>' ><u><?php echo (L("lan_change")); ?></u></a> |
     <a href='<?php echo U('add',array('id'=>$list['id']),'');?>'><u><?php echo (L("lan_addc")); ?></u></a> |	
     <a href='<?php echo U('del',array('id'=>$list['id']));?>' class='confirmdel'><u><?php echo (L("lan_delc")); ?></u></a>
    </td>
  </tr><?php endforeach; endif; ?>
    <tr bgcolor="#F9FCEF">
    <td height="24" colspan="6" align="left" valign="top" style=" padding-left:10px">
      <span><input type="submit"  value="<?php echo (L("lan_clicksort")); ?>" ></span>
    </td>
  </tr>

</table>  </form>
</body>
</html>