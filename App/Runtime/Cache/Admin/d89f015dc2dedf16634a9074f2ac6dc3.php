<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>节点列表</title>
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
          <td width="24%" style="padding-left:10px;"><b>节点列表</b> </td>
          <td width="76%" align="right"><b>
          
           <a href="<?php echo u('addNode');?>"><u>添加应用</u></a>
        
            </b>
          </td>
        </tr>
      </table>
     </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td  colspan="6" class="warp" style="padding:10px">　
     
    <?php if(is_array($lists)): foreach($lists as $key=>$list): ?><div class='app'>
      <p><strong><?php echo ($list['title']); if($list['status'] == 0): ?>（关闭）<?php endif; ?></strong>
       <a href="<?php echo U('addNode',array('pid'=>$list['id'],'level'=>2));?>">[添加控制器]</a>
       <a href="<?php echo U('editNode',array('id'=>$list['id']));?>">[修改]</a>
       <a href="<?php echo U('delNode',array('id'=>$list['id']));?>" class='confirmdel'>[删除]</a>
       </p>
    
    
      <?php if(is_array($list["child"])): foreach($list["child"] as $key=>$action): ?><dl>
       
       <dt><strong><?php echo ($action['title']); if($action['status'] == 0): ?>（关闭）<?php endif; ?></strong>
       <a href="<?php echo U('addNode',array('pid'=>$action['id'],'level'=>3));?>">[添加方法]</a>
       <a href="<?php echo U('editNode',array('id'=>$action['id'],'level'=>3));?>">[修改]</a>
       <a href="<?php echo U('delNode',array('id'=>$action['id'],'level'=>3));?>" class='confirmdel'>[删除]</a></dt>
        <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd><strong><?php echo ($method['title']); if($method['status'] == 0): ?>（关闭）<?php endif; ?></strong>
        <a href="<?php echo U('editNode',array('id'=>$method['id'],'level'=>3));?>">[修改]</a>
        <a href="<?php echo U('delNode',array('id'=>$method['id'],'level'=>3));?>" class='confirmdel'>[删除]</a></dd><?php endforeach; endif; ?>
       </dl><?php endforeach; endif; ?>
     </div><?php endforeach; endif; ?>
    
   
    
    
    </td>
  </tr>

  
</table>
</body>
</html>