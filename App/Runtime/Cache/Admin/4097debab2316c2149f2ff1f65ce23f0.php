<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>水印设置</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>
 
</head>
<body background='__PUBLIC__/Images/allbg.gif' leftmargin='8' topmargin='8'>
	<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#D6D6D6">
  <tr>
    <td height="19" background="__PUBLIC__/Images/tbg.gif" bgcolor="#E7E7E7"> 
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <tr> 
          <td style="padding-left:10px;"><b><strong>水印设置</strong></b> </td>
          <td align='right'></td>
        </tr>
      </table></td>
   </tr>
  <tr>
  <td height="215" align="center" valign="top" bgcolor="#FFFFFF">
	<form  name="form1" action="<?php echo U('do_edit');?>" method="post" enctype="multipart/form-data">
        <table width="98%" border="0" cellspacing="1" cellpadding="1">
          <tr> 
            <td width="18%" height="30">是否开启图片水印：</td>
            <td width="82%" style="text-align:left;">
            <label><input name="WATER_OPEN" type="radio" value="0" <?php if(C('WATER_OPEN') == 0): ?>checked<?php endif; ?>>否</label>&nbsp;
            <label><input name="WATER_OPEN" type="radio" value="1" <?php if(C('WATER_OPEN') == 1): ?>checked<?php endif; ?>>是</label>&nbsp;
            &nbsp;
           </td>
          </tr>
          
          <tr> 
            <td width="18%" height="30">水印路径：</td>
            <td width="82%" style="text-align:left;">
            <input name="WATER_IMAGE" type="text"  style="width:300px"  value='<?php echo (C("WATER_IMAGE")); ?>' /> &nbsp;
            
           </td>
          </tr>
            <tr> 
            <td width="18%" height="30">水印图片预览：</td>
            <td width="82%" style="text-align:left;">
            
            <img src='__ROOT__<?php echo substr(C("WATER_IMAGE"),1);?>' height='30' />
           </td>
          </tr>
           <tr> 
            <td width="18%" height="30">水印位置(0-10)</td>
            <td width="82%" style="text-align:left;">

             <label><input type="radio" name="WATER_POS" value="10" <?php if(C("WATER_POS") == 10): ?>checked="checked"<?php endif; ?>/>
 随机位置</label>
<table width="300" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="33%"><label><input type="radio" name="WATER_POS" value="1" <?php if(C("WATER_POS") == 1): ?>checked="checked"<?php endif; ?>/>
        顶部居左</label></td>
      <td width="33%"><label><input type="radio" name="WATER_POS" value="2" <?php if(C("WATER_POS") == 2): ?>checked="checked"<?php endif; ?>/>
        顶部居中</label></td>
      <td><label><input type="radio" name="WATER_POS" value="3" <?php if(C("WATER_POS") == 3): ?>checked="checked"<?php endif; ?>/>
        顶部居右</label></td>
    </tr>
    <tr>
      <td><label><input type="radio" name="WATER_POS" value="4" <?php if(C("WATER_POS") == 4): ?>checked="checked"<?php endif; ?>/>
        左边居中</label></td>
      <td><label><input type="radio" name="WATER_POS" value="5" <?php if(C("WATER_POS") == 5): ?>checked="checked"<?php endif; ?>/>
        图片中心</label></td>
      <td><label><input type="radio" name="WATER_POS" value="6" <?php if(C("WATER_POS") == 6): ?>checked="checked"<?php endif; ?>/>
        右边居中</label></td>
    </tr>
    <tr>
      <td><label><input type="radio" name="WATER_POS" value="7" <?php if(C("WATER_POS") == 7): ?>checked="checked"<?php endif; ?>/>
        底部居左</label></td>
      <td><label><input type="radio" name="WATER_POS" value="8"  <?php if(C("WATER_POS") == 8): ?>checked="checked"<?php endif; ?>/>
        底部居中</label></td>
      <td><label><input name="WATER_POS" type="radio" value="9" <?php if(C("WATER_POS") == 9): ?>checked="checked"<?php endif; ?> />
        底部居右</label></td>
    </tr>
  </tbody>
</table>

            &nbsp;
           </td>
          </tr>
           <tr> 
            <td width="18%" height="30">水印透明度</td>
            <td width="82%" style="text-align:left;">
            <input name="WATER_ALPHA" type="text"  style="width:300px" value="<?php echo (C("WATER_ALPHA")); ?>" /> &nbsp;
           </td>
          </tr>
         
           <tr> 
            <td width="18%" height="30">JPEG图片压缩比</td>
            <td width="82%" style="text-align:left;">
            <input name="WATER_COMPRESSION" type="text"  style="width:300px" value="<?php echo (C("WATER_COMPRESSION")); ?>" /> &nbsp;
           </td>
          </tr>
           <tr> 
            <td width="18%" height="30">是否开启文字水印：</td>
            <td width="82%" style="text-align:left;">
            <label><input name="WATER_OPEN_FONT" type="radio" value="0" <?php if(C('WATER_OPEN_FONT') == 0): ?>checked<?php endif; ?>>否</label>&nbsp;
            <label><input name="WATER_OPEN_FONT" type="radio" value="1" <?php if(C('WATER_OPEN_FONT') == 1): ?>checked<?php endif; ?>>是</label>&nbsp;
            &nbsp;
           </td>
          </tr>
          <tr > 
            <td width="18%" height="30">水印文字</td>
            <td width="82%" style="text-align:left;">
            <input name="WATER_TEXT" type="text"  style="width:300px" value="<?php echo (C("WATER_TEXT")); ?>"/> &nbsp;
           </td>
          </tr>
           <tr > 
            <td width="18%" height="30">水印文字旋转角度</td>
            <td width="82%" style="text-align:left;">
            <input name="WATER_ANGLE" type="text"  style="width:300px" value="<?php echo (C("WATER_ANGLE")); ?>"/> &nbsp;
           </td>
          </tr>
          <tr > 
            <td width="18%" height="30">水印文字大小</td>
            <td width="82%" style="text-align:left;">
            <input name="WATER_FONTSIZE" type="text"  style="width:300px" value="<?php echo (C("WATER_FONTSIZE")); ?>"/> &nbsp;
           </td>
          </tr>
          <tr > 
            <td width="18%" height="30">水印文字颜色</td>
            <td width="82%" style="text-align:left;">
            <input name="WATER_FONTCOLOR" type="text"  style="width:300px" value="<?php echo (C("WATER_FONTCOLOR")); ?>"/> &nbsp;<div style='width:15px;height:15px;background-color:<?php echo (C("WATER_FONTCOLOR")); ?>;display:inline-block'></div>
           </td>
          </tr>
          <tr > 
            <td width="18%" height="30">水印文字字体文件</td>
            <td width="82%" style="text-align:left;">
            <input name="WATER_FONTFILE" type="text"  style="width:300px" value="<?php echo (C("WATER_FONTFILE")); ?>"/> &nbsp;
           </td>
          </tr>
           <tr > 
            <td width="18%" height="30">水印文字字符编码</td>
            <td width="82%" style="text-align:left;">
            <input name="WATER_CHARSET" type="text"  style="width:300px" value="<?php echo (C("WATER_CHARSET")); ?>"/> &nbsp;
           </td>
          </tr>
          <tr> 
            <td height="60">&nbsp;</td>
            <td align="left">
            	<input type="submit"  value=" <?php echo (L("lan_submit")); ?> " class="coolbg np" />
            </td>
          </tr>
        </table>
      </form>
	  </td>
</tr>
</table>
</body>
</html>