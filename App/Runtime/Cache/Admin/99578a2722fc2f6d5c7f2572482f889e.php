<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加系统用户</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>
  <script type="text/javascript">

  
    $(function(){
		$('.add-role').click(function(){
			var obj=$(this).parents('tr.p').clone();
			obj.find('.add-role').remove();
            $('#last').before(obj);
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
          <td style="padding-left:10px;"><b><strong><?php echo (L("lan_addn")); ?></strong></b> </td>
          <td align='right'><a href="<?php echo U('user');?>"><b><strong><?php echo (L("lan_list")); ?></strong></b></a> </td>
        </tr>
      </table></td>
   </tr>
  <tr>
  <td height="215" align="center" valign="top" bgcolor="#FFFFFF">
	<form name="form1" action="<?php echo U(do_addUser);?>" method="post">
        <table width="98%" border="0" cellspacing="1" cellpadding="1">
          <tr> 
            <td width="16%" height="30"><span class='red'>*</span><?php echo (L("lan_name")); ?>：</td>
            <td width="84%" style="text-align:left;"><input name="username" type="text" id="username" size="16" style="width:200px" /> &nbsp;
           </td>
          </tr>
          
          <tr> 
            <td height="30"><span class='red'>*</span><?php echo (L("lan_nickname")); ?>：</td>
            <td style="text-align:left;">
            	<input name="nickname" type="text" id="nickname" size="16" style="width:200px" /> &nbsp;
            </td>
          </tr>

          


          <tr > 
            <td height="30"><?php echo (L("lan_password")); ?>：</td>
            <td style="text-align:left;">
            	<input name="password" type="password" id="password" size="16" style="width:200px" /> &nbsp;
            </td>
          </tr>

          <tr> 
            <td height="30"><?php echo (L("lan_confirmp")); ?>：</td>
            <td style="text-align:left;">
            	<input name="repassword" type="password" id="repassword" size="16" style="width:200px" /> &nbsp;
            </td>
          </tr>

           <tr class='p'> 
            <td height="30"><?php echo (L("lan_group")); ?>：</td>
            <td style="text-align:left;">
             <select name='role[]'>
              <option value=''><?php echo (L("lan_sgroup")); ?></option>
              <?php if(is_array($datag)): foreach($datag as $key=>$g): ?><option value='<?php echo ($g['id']); ?>'><?php echo ($g['remark']); ?>(<?php echo ($g['name']); ?>)</option><?php endforeach; endif; ?>
             </select>&nbsp;<span class="add-role">添加角色</span>
            </td>
          </tr>


          <tr id='last'> 
            <td height="60">&nbsp;</td>
            <td>
            	<input type="submit" name="submit" value=" <?php echo (L("lan_submit")); ?> " class="coolbg np" />
                <input type="hidden" name="groupid" value="1"  />
            </td>
          </tr>
        </table>
      </form>
	  </td>
</tr>
</table>
</body>
</html>