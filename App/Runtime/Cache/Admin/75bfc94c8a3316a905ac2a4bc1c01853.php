<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加文档属性</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>

  <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>

  <script type="text/javascript" src="__PLUGIN__/Ueditor/ueditor.config.js"></script>
  <script type="text/javascript" src="__PLUGIN__/Ueditor/ueditor.all.min.js"></script>
  <script type="text/javascript" src="__PLUGIN__/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="__ROOT__/Common/Js/jquery.bigcolorpicker.js"></script>
  <link rel="stylesheet" type="text/css" href="__ROOT__/Common/Css/jquery.bigcolorpicker.css" />
    <script type="text/javascript">
    $(function(){
      $("#nowcolor").bigColorpicker(function(el,color){
        $("#" + $(el).attr("data-target"))
                     .val(color);
        $("#nowcolor").css("background" , color);
       });
      
    });
  </script>
</head>
<body background='__PUBLIC__/Images/allbg.gif' leftmargin='8' topmargin='8'>
	<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#D6D6D6">
  <tr>
    <td height="19" background="__PUBLIC__/Images/tbg.gif" bgcolor="#E7E7E7"> 
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <tr> 
          <td style="padding-left:10px;"><strong>属性添加</strong> </td>
          <td align='right'> </td>
        </tr>
      </table></td>
   </tr>
  <tr>
  <td height="215" align="center" valign="top" bgcolor="#FFFFFF">
	<form name="form1" action="<?php echo U(do_add);?>" method="post" enctype="multipart/form-data">
        <table width="98%" border="0" cellspacing="1" cellpadding="1">

          <tr> 
            <td width="8%" height="30"><span class='red'>*</span>属性名称：</td>
            <td width="92%" style="text-align:left;">
              <input name="name" type="text" id="name" size="16" style="width:300px" /> &nbsp;
           </td>
          </tr>
          
          <tr> 
            <td width="8%" height="30">属性颜色</td>
            <td width="92%" style="text-align:left;">
              <div class='rel'>
              <input name="color" type="text" id="color" size="16" style="width:300px" /> &nbsp;
              <div data-target="color" id='nowcolor'>选色</div>
              </div>
           </td>
          </tr>

          <tr> 
           
            <td colspan='2' align='left'>
            	<input type="submit"  value="保存添加" class="coolbg np" />
            </td>
          </tr>
        </table>
      </form>
	  </td>
</tr>
</table>
</body>
</html>