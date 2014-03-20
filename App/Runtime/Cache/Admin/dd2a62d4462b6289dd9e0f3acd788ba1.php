<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>网站栏目添加</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
  <script type="text/javascript" src="__ROOT__/Common/Js/ajaxfileupload.js"></script>
  <script  type="text/javascript">
	  //渲染编辑器
    var pulugin='__PLUGIN__';
    window.UEDITOR_HOME_URL=pulugin+"/Ueditor/";
    var imageUrl='<?php echo U(GROUP_NAME."/Common/Upload");?>';
    var imagePath='__ROOT__/<?php echo C("cfg_pic");?>';
    var imageManagerUrl='<?php echo U(GROUP_NAME."/Common/ImgManger");?>';
    var imageManagerPath='__ROOT__/';
    $(function(){
       //design_editor('content');
    });
    // 图片上传url
    var ajaxurllist="<?php echo U('Category/ajaxup','','html');?>";
    //图片删除url
    var ajaxdel="<?php echo U('Category/delimg','','html');?>";
    // 图片显示地址
    var imageshow="__ROOT__/<?php echo C('cfg_pic');?>";
    var imagecolse="__ROOT__/Common/Images/";
  </script>
  <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>
  <script type="text/javascript" src="__PLUGIN__/Ueditor/ueditor.config.js"></script>
  <script type="text/javascript" src="__PLUGIN__/Ueditor/ueditor.all.min.js"></script>
	
<script type="text/javascript">
  $(function(){
    $('input[name="typename"]').blur(function(){
      var typename=$(this).val();
      var selectid=$('select[name="reid"]').val();
      $.get("<?php echo U('checksame');?>",{'typename':typename,'id':selectid},function(data){

        if(data.status=='1')
        {
          if($('#typeMessage').length==0)
            $('input[name="typename"]').after('<span id="typeMessage" class="red">栏目名称已经存在</span>');
        }
        else
        {
          $('#typeMessage').remove();
        }
      });
    });
    $('input[type="submit"]').click(function(){
      if($('#typeMessage').length>0)
        return false;
      else
        return true;
    });


     $('#detailContent').hide();
     $('#heightContent').hide();
     $('.config_title >span').click(function(){
            var attr1=$(this).attr('rel');
            //alert(attr1);
            $('.config_title >span').each(function(){
                var attr2=$(this).attr('rel');
                if(attr1==attr2)
                {
                  $('#'+attr2).show();
                }
                else
                {
                  $('#'+attr2).hide();
                }
                if(attr1=='detailContent')
                {
                   design_editor('content');
                }
            });
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
          <td style="padding-left:10px;"><b><strong><?php echo (L("lan_acategory")); ?></strong></b> </td>
         <td  align="right"><b><strong><a href="<?php echo U(GROUP_NAME.'/Category/index');?>"><?php echo (L("lan_lists")); ?></a></strong></b> </td>
        </tr>
       
      </table></td>
   </tr>
  <tr>
  <td height="215" align="center" valign="top" bgcolor="#FFFFFF">
	<form name="form" action="<?php echo U('do_add');?>" method="post" enctype="multipart/form-data">
        <table width="98%" border="0" cellspacing="1" cellpadding="1">
          <tr align='left'><td class='config_title'>
            <span rel='baseContent'>基本内容</span> |  <span rel='detailContent'>详细内容</span> | <span rel='heightContent'>高级设置</span>
          </td></tr>
        </table>
        <!-- 基本内容 -->
        <table width="98%" border="0" cellspacing="1" cellpadding="1" id='baseContent'>
           <tr> 
            <td width="14%" height="30"  align="left"><?php echo (L("lan_parent")); ?>：</td>
            <td width="86%" style="text-align:left;">
            	<select name='reid' style='width:300px'>
                <option value="0"><?php echo (L("lan_selectp")); ?></option>
                <?php if(is_array($lists)): foreach($lists as $key=>$list): ?><option value="<?php echo ($list['id']); ?>" <?php if($list['type'] == 1): ?>style="background:#DCECA6"<?php endif; ?>  <?php if($list['id'] == $typeid): ?>selected<?php endif; ?> >
                <?php echo ($list['fullname']); if(($list['type'] == 1) and ($list['reid'] == 0)): ?>(<?php echo (L("lan_channelp")); ?>)<?php endif; ?></option><?php endforeach; endif; ?>
              </select>
            </td>
          </tr>
          
          <tr> 
            <td height="30"  align="left"><span class='red'>*</span><?php echo (L("lan_c_name")); ?>：</td>
            <td style="text-align:left;">
            	<input name="typename" type="text" id="typename" size="16" style="width:300px" /> &nbsp;
            </td>
          </tr>

            
          <tr> 
            <td height="30"  align="left"><?php echo (L("lan_show_memu")); ?>：</td>
            <td style="text-align:left;">
            	<label><input name="isshow" type="radio"  value="0"  <?php if($isshow == 0): ?>checked<?php endif; ?> 
            	/><?php echo (L("lan_hide")); ?></label> &nbsp;
                <label><input name="isshow" type="radio"  value="1"  <?php if($isshow == 1): ?>checked<?php endif; ?> 
                /><?php echo (L("lan_show")); ?></label>
            </td>
          </tr>
		   <tr> 
            <td height="30"  align="left"><?php echo (L("lan_csort")); ?>：</td>
            <td style="text-align:left;">
            	<input name="sort" type="text" id="sort" size="16" style="width:300px" value='0' /> &nbsp;
            </td>
          </tr>
		   <tr> 
            <td height="30"  align="left"><?php echo (L("lan_type")); ?>：</td>
            <td style="text-align:left;">
            	<select name='type' id='type' style='width:300px'>
            		<option value="0" <?php if($type == 0): ?>selected<?php endif; ?>><?php echo (L("lan_category")); ?></option>
            		<option value="1" <?php if($type == 1): ?>selected<?php endif; ?>><?php echo (L("lan_channel")); ?></option>
            		<option value="2" <?php if($type == 2): ?>selected<?php endif; ?>><?php echo (L("lan_link")); ?></option>
            	</select> &nbsp;
            </td>
          </tr>


          <tr> 
            <td height="30"  align="left"><?php echo (L("lan_keywords")); ?>：</td>
            <td style="text-align:left;">
            	<input name="keywords" type="text" id="keywords" size="16" style="width:300px" /> &nbsp;
            </td>
          </tr>

          <tr> 
            <td height="30"  align="left"><?php echo (L("lan_description")); ?>：</td>
            <td style="text-align:left;">
            	<textarea name='description' id="description"  style="width:500px;height:100px" ></textarea>&nbsp;
            </td>
          </tr>


         
        </table>


        <!--详细内容-->
        <table width="98%" border="0" cellspacing="1" cellpadding="1" id='detailContent'>
          <tr> 
            <td height="30" colspan="2" align="left"><?php echo (L("lan_content")); ?>：</td>
          </tr>
           <tr>
            <td style="text-align:left;" colspan="2">
                  <textarea name="content" id='content' style="width:100%;height:300px"></textarea>
            </td>
          </tr>
        </table>




         <!-- 高级设置 -->
         <table width="98%" border="0" cellspacing="1" cellpadding="1" id='heightContent'>
            <tr> 
              <td height="30"  align="left">控制器：</td>
              <td style="text-align:left;">
                <input name="remark" type="text" id="remark" size="16" style="width:300px" value='<?php echo ($remark); ?>'/> &nbsp;(<?php echo (L("lan_chang_mode")); ?>)
               </td>
            </tr>

           <tr> 
            <td height="30"  align="left"><span class='red'>*</span><?php echo (L("lan_c_mode")); ?>：</td>
            <td style="text-align:left;">
              <select name="cmark" style='width:300px'>
               <option value=""><?php echo (L("lan_s_mode")); ?></option>
               <?php if(is_array($mtable)): foreach($mtable as $key=>$m): ?><option value="<?php echo ($m['id']); ?>"  <?php if($m['id'] == $cmark): ?>selected<?php endif; ?>><?php echo ($m['name']); ?>(<?php echo ($m['code']); ?>)</option><?php endforeach; endif; ?>
              </select>(<?php echo (L("lan_chang_mode")); ?>)
               &nbsp;
            </td>
          </tr>

           <tr> 
            <td height="30"  align="left"><?php echo (L("lan_file")); ?>：<img id="loading" src="__PUBLIC__/Images/loading.gif" style="display:none;"></td>
            <td style="text-align:left;">
              <input name="pic" type="file" id="img" size="16" style="width:300px" /> &nbsp;
              <input type="button"  value='上传' onclick='return ajaxFileUploadList();'/>
            </td>
          </tr>
          <tr>
            <td colspan='2'>
              <div class='imgborder' id='infoList'>
                <ul></ul>
              </div>
            </td>
          </tr>

        </table>

        <table width="98%" border="0" cellspacing="1" cellpadding="1">
          <tr> 
            <td align="left" height="60" colspan="2">
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