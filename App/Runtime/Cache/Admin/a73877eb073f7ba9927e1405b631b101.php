<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>修改图片</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
  <script type="text/javascript" src="__ROOT__/Common/Js/ajaxfileupload.js"></script>
  <script  type="text/javascript">
    // 图片上传url
    var ajaxurllist="<?php echo U('Category/ajaxup','','html');?>";
    //图片删除url
    var ajaxdel="<?php echo U('Category/delimg','','html');?>";
    // 图片显示地址
    var imageshow="__ROOT__/<?php echo C('cfg_pic');?>";
    var imagecolse="__ROOT__/Common/Images/";
	</script>
    <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>
</head>
<body background='__PUBLIC__/Images/allbg.gif' leftmargin='8' topmargin='8'>
	<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#D6D6D6">
  <tr>
    <td height="19" background="__PUBLIC__/Images/tbg.gif" bgcolor="#E7E7E7"> 
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <tr> 
          <td style="padding-left:10px;"><b><strong><?php echo (L("lan_articleadd")); ?></strong></b> </td>
          <td align='right'><a href="<?php echo U('index',array('typeid'=>I('typeid')));?>"><b><strong><?php echo (L("lan_articlelist")); ?></strong></b></a> </td>
        </tr>
      </table></td>
   </tr>
  <tr>
  <td height="215" align="center" valign="top" bgcolor="#FFFFFF">
	<form  name="form1" action="<?php echo U(do_edit);?>" method="post"  enctype="multipart/form-data">
        <table width="98%" border="0" cellspacing="1" cellpadding="1">
          <tr> 
            <td width="10%" height="30"><span class='red'>*</span>图片标题：</td>
            <td width="90%" style="text-align:left;"><input name="title" type="text" id="title" size="16" style="width:300px"   value="<?php echo ($data['title']); ?>"/> &nbsp;
           </td>
          </tr>
          
          <tr> 
            <td height="30"><span class='red'>*</span>图片分类：</td>
            <td style="text-align:left;">
            	<select name="typeid" style="width:300px" >
                 <option value="0">请选择图片的分类</option>
                 <?php if(is_array($category)): foreach($category as $key=>$c): ?><option value="<?php echo ($c['id']); ?>" <?php if($data['typeid'] == $c['id']): ?>selected<?php endif; ?>><?php echo ($c['fullname']); ?></option><?php endforeach; endif; ?>
                </select>
                &nbsp;
            </td>
          </tr>
          
          <tr> 
            <td width="10%" height="30">图片链接：</td>
            <td width="90%" style="text-align:left;"><textarea name="url" style="width:300px;height:60px" ><?php echo ($data['url']); ?></textarea> &nbsp;
           </td>
          </tr>
           <tr> 
            <td height="30">排序：</td>
            <td style="text-align:left;">
            <input name='sort' type="text"  style="width:300px" value="<?php echo ($data['sort']); ?>">
            </td>
          </tr>

       
          <tr> 
            <td height="30">图片上传：</td>
            <td style="text-align:left;">
             <input name="pic" type="file" id="img" size="16" style="width:300px" /> &nbsp;
             <input type="button"  value='上传' onclick='return ajaxFileUploadList();'/>
            </td>
          </tr>
    
          <tr>
            <td colspan='2'>
              <div class='imgborder' id='infoList'>
                <ul>
                  <?php if($data['pic']): ?><li><img class='info-img' src='__ROOT__/<?php echo C('cfg_pic'); echo ($data['pic']); ?>' width='100'/><img  src='__ROOT__/Common/Images/close.gif' alt=''  class='close-img' rel='<?php echo ($data['pic']); ?>' /><input type='hidden' name='imgpicList[]' value='<?php echo ($data['pic']); ?>'/></li><?php endif; ?>
                </ul>
              </div>
            </td>
          </tr>
      
          <tr> 
            <td height="60">&nbsp;</td>
            <td>
                <input name="id" type='hidden' value="<?php echo ($data['id']); ?>"  />
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