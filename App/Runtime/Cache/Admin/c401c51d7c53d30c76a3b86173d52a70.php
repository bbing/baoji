<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<base target="_self">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/main.css" />
</head>
<body leftmargin="8" topmargin='8'>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div style='float:left'> <img height="14" src="__PUBLIC__/Images/book1.gif" width="20" />&nbsp;<?php echo (L("lan_welcome")); ?></div>
      <div style='float:right;padding-right:8px;'>
        <!--  //保留接口  -->
      </div></td>
  </tr>
  <tr>
    <td height="1" background="__PUBLIC__/Images/sp_bg.gif" style='padding:0px'></td>
  </tr>
</table>
<!--<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr>
    <td background="__PUBLIC__/Images/wbg.gif" bgcolor="#EEF4EA" class='title'><span>消息</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;</td>
  </tr>
</table>-->
<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px">
  <tr>
    <td colspan="2" background="__PUBLIC__/Images/wbg.gif" bgcolor="#EEF4EA" class='title'>
    	<div style='float:left'><span><?php echo (L("lan_quick")); ?></span></div>
    	<div style='float:right;padding-right:10px;'></div>
   </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="30" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="15%" height="31" align="center"><img src="__PUBLIC__/Images/qc.gif" width="90" height="30" /></td>
          <td width="85%" valign="bottom"><div class='icoitem'>
             <!-- <div class='ico'><img src='__PUBLIC__/Images/addnews.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u><?php echo (L("lan_documents")); ?></u></a></div>
            </div>-->
            <div class='icoitem'>
              <div class='ico'><img src='__PUBLIC__/Images/menuarrow.gif' width='16' height='16' /></div>
              <div class='txt'><a href='<?php echo U(GROUP_NAME."/Comment/index");?>'><u><?php echo (L("lan_comments")); ?></u></a></div>
            </div>
           <!-- <div class='icoitem'>
              <div class='ico'><img src='__PUBLIC__/Images/manage1.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u><?php echo (L("lan_article")); ?></u></a></div>
            </div>-->
            <div class='icoitem'>
              <div class='ico'><img src='__PUBLIC__/Images/file_dir.gif' width='16' height='16' /></div>
              <div class='txt'><a href='<?php echo U(GROUP_NAME."/Category/index");?>'><u><?php echo (L("lan_category")); ?></u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='__PUBLIC__/Images/part-index.gif' width='16' height='16' /></div>
              <div class='txt'><a href='<?php echo U(GROUP_NAME."/Cache/index");?>'><u><?php echo (L("lan_catch")); ?></u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='__PUBLIC__/Images/manage1.gif' width='16' height='16' /></div>
              <div class='txt'><a href='<?php echo U(GROUP_NAME."/Config/index");?>'><u><?php echo (L("lan_config")); ?></u></a></div>
            </div></div></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px">
  <tr bgcolor="#EEF4EA">
    <td colspan="2" background="__PUBLIC__/Images/wbg.gif" class='title'><span>系统基本信息</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>软件版本信息：</td>
    <td>tp_cms 2013 2.0</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>系统信息 </td>
    <td><?php echo ($sysdata['sysos']); ?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td>php版本 </td>
    <td><?php echo ($sysdata['sysversion']); ?></td>
  </tr>
   <tr bgcolor="#FFFFFF">
    <td> GD库版本 </td>
    <td><?php echo ($sysdata['gdinfo']); ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td> FreeType </td>
    <td><?php echo ($sysdata['freetype']); ?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td> 远程文件获取 </td>
    <td><?php echo ($sysdata['allowurl']); ?></td>
  </tr>
   <tr bgcolor="#FFFFFF">
    <td> 最大上传限制</td>
    <td><?php echo ($sysdata['max_upload']); ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td> 最大执行时间</td>
    <td><?php echo ($sysdata['max_ex_time']); ?></td>
  </tr>
   <tr bgcolor="#FFFFFF">
    <td> 服务器时间</td>
    <td><?php echo ($sysdata['systemtime']); ?></td>
  </tr>
</table>

</body>
</html>