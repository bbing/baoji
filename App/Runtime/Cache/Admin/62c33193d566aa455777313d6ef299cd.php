<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>系统基本设置</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/style.js"></script>
  <script type="text/javascript">
  $(function(){
      $('#configadd').hide();
      $('.configadd').click(function(){
        $('#configadd').show();
      });
      <?php if(is_array($datalists)): foreach($datalists as $key=>$lists): ?>$('#config<?php echo ($key+2); ?>').hide();<?php endforeach; endif; ?>
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
          <td style="padding-left:10px;"><b><strong><?php echo (L("lan_gconfig")); ?></strong></b> </td>
          <td align=right><b><strong><a href='###' class='configadd'><?php echo (L("lan_aconfig")); ?></a></strong></b></td>
        </tr>
      </table></td>
   </tr>

<tr><td align='center' background="__PUBLIC__/Images/tbg.gif" bgcolor="#E7E7E7">
   <table>
      <tr>
          <td class="config_title">
            <?php if(is_array($datalists)): foreach($datalists as $key=>$lists): ?><span rel='config<?php echo ($key+1); ?>'><?php echo ($lists["info"]); ?></span>&nbsp;<?php if($key+1 != count($datalists) ): ?>|<?php endif; ?>&nbsp;<?php endforeach; endif; ?>
          </td>
      </tr>
   </table>
</td></tr>

   <tr id="configadd">
     <td  align="center" valign="top" bgcolor="#FFFFFF">
       <form action="<?php echo U(GROUP_NAME.'/Config/add_config');?>" name="configadd" method="post">
         <table width="98%" bgcolor="#D6D6D6" cellspacing="1" cellpadding="1">
           <tr>
            <td  bgcolor="#FFFFFF" height='30'  style="padding:3px;" >   类别：</td>
            <td  bgcolor="#FFFFFF" height='30'  style="padding:3px;" >
            <select name='reid'>
              <?php if(is_array($datalists)): foreach($datalists as $key=>$lists): ?><option value="<?php echo ($lists["id"]); ?>"><?php echo ($lists["info"]); ?></option><?php endforeach; endif; ?>
            </select>
            </td>
             <td bgcolor="#FFFFFF" height='30'  style="padding:3px;"  ><span class='red'>*</span><?php echo (L("lan_bname")); ?></td>
             <td bgcolor="#FFFFFF" height='30'  style="padding:3px;"><input type="text" name="name" style='width:80%' /></td>    
             <td bgcolor="#FFFFFF" height='30'  style="padding:3px;" ><?php echo (L("lan_czhi")); ?></td>
             <td bgcolor="#FFFFFF" height='30'  style="padding:3px;" ><input type="text" name="content" style='width:80%' /></td>
           </tr>
            <tr>
             <td bgcolor="#FFFFFF" height='30'  style="padding:3px;" ><span class='red'>*</span><?php echo (L("lan_cinfo")); ?></td>
             <td bgcolor="#FFFFFF" height='30'  style="padding:3px;" ><input type="text" name="info" style='width:80%' /></td>
             <td bgcolor="#FFFFFF" height='30'  style="padding:3px;" ><?php echo (L("lan_ctype")); ?></td>
             <td bgcolor="#FFFFFF" height='30'  style="padding:3px;"  colspan='2' >
             <input type="radio" name="type" value='string' id='string' checked/>&nbsp;<label for="string"><?php echo (L("lan_cwb")); ?></label>
             <input type="radio" name="type" value='bstring'id='bstring'/>&nbsp;<label for="bstring"><?php echo (L("lan_cdhwb")); ?></label>
             <input type="radio" name="type" value='bool' id='bool'/>&nbsp;<label for="bool"><?php echo (L("lan_cb")); ?></label>
             <input type="radio" name="type" value='number' id='number'/>&nbsp;<label for="number"><?php echo (L("lan_sz")); ?></label>
           
             </td>
             <td bgcolor="#FFFFFF" height='30'  style="padding:3px;" ><input type="submit" name="submit" value=" <?php echo (L("lan_bc")); ?> " class="coolbg np" /></td
           </tr>

         </table>
       </form>
     </td>
   </tr>
  <tr>
  <td  align="center" valign="top" bgcolor="#FFFFFF">
	<form name="form1" action="<?php echo U(GROUP_NAME.'/Config/edit_config');?>" method="post">
    <?php if(is_array($datalists)): foreach($datalists as $key=>$lists): ?><table width="98%" border="0" cellspacing="1" cellpadding="1" bgcolor="#D6D6D6" id="config<?php echo ($key+1); ?>">
   <tr bgcolor="#FBFCE2">
      <td align='center'><?php echo (L("lan_cinfo")); ?></td>
			<td align='center'><?php echo (L("lan_czhi")); ?></td>
			<td align='center'><?php echo (L("lan_bname")); ?></td>
   </tr>

     <?php if(is_array($lists["child"])): foreach($lists["child"] as $key=>$datalist): ?><tr > 
            <td height="30" bgcolor='<?php if($key%2 == 0): ?>#F9FCEF<?php else: ?>#ffffff<?php endif; ?>' style="padding:3px;"  width="300"><?php echo ($datalist['info']); ?>：</td>
            <td style="text-align:left;" bgcolor='<?php if($key%2 == 0): ?>#F9FCEF<?php else: ?>#ffffff<?php endif; ?>'>
            <?php if($datalist['type'] == 'string'): ?><input name="<?php echo ($datalist['name']); ?>" type="text" id="<?php echo ($datalist['name']); ?>"  value='<?php echo ($datalist['content']); ?>' style='width:80%'/> &nbsp;
              <?php elseif($datalist['type'] == 'number'): ?>
                <input name="<?php echo ($datalist['name']); ?>" type="text" id="<?php echo ($datalist['name']); ?>"  value='<?php echo ($datalist['content']); ?>' style='width:30%'/> &nbsp;
            <?php elseif($datalist['type'] == 'bstring'): ?>
            	<textarea name='<?php echo ($datalist['name']); ?>' id="<?php echo ($datalist['name']); ?>" class='textarea_info' style='width:98%;height:50px'><?php echo ($datalist['content']); ?></textarea>&nbsp;
            <?php elseif($datalist['type'] == bool): ?>
            	<input type='radio' class='np' name='<?php echo ($datalist['name']); ?>' value='Y'  
        		 <?php if($datalist['content'] == 'Y'): ?>checked<?php endif; ?>><?php echo (L("lan_yes")); ?>&nbsp;
         		 <input type='radio' class='np' name='<?php echo ($datalist['name']); ?>' value='N'  
          		<?php if($datalist['content'] == 'N'): ?>checked<?php endif; ?>><?php echo (L("lan_no")); ?>&nbsp;<?php endif; ?>
            </td>
            <td  align='center' bgcolor='<?php if($key%2 == 0): ?>#F9FCEF<?php else: ?>#ffffff<?php endif; ?>'><?php echo ($datalist['name']); ?></td>
          </tr><?php endforeach; endif; ?>
        </table><?php endforeach; endif; ?>

      <table width="98%" border="0" cellspacing="1" cellpadding="1" bgcolor="#D6D6D6">
          <tr bgcolor="#F9FCEF"> 

            <td height="60" colspan='3'>
              <input type="submit" name="submit" value=" <?php echo (L("lan_change")); ?>" class="coolbg np" />
            </td>
   
          </tr>

       </table>
         </foreach>
      </form>
      
	  </td>
</tr>

</table>
</body>
</html>