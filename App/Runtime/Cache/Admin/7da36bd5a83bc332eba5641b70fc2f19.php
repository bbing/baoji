<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>menu</title>
<link rel="stylesheet" href="__PUBLIC__/Css/base.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/Css/menu.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language='javascript'>var curopenItem = '1';</script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/menu.js"></script>
<base target="main" />
</head>
<body target="main">
<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td style='padding-left:3px;padding-top:8px' valign="top">
      <?php if(is_array($menu)): foreach($menu as $key=>$m): ?><!-- Item <?php echo ($key); ?> Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items<?php echo ($key); ?>_1")'><b><?php echo ($m['name']); ?></b></dt>
        <dd style='display:block' class='sitem' id='items<?php echo ($key); ?>_1'>
          <ul class='sitemu'>
            <?php if(is_array($m["menu"])): foreach($m["menu"] as $key=>$child): ?><li><a href='<?php echo ($child['url']); ?>' target='main'><?php echo ($child['name']); ?></a> </li><?php endforeach; endif; ?>
          </ul>
        </dd>
      </dl>
      <!-- Item <?php echo ($key); ?> End --><?php endforeach; endif; ?>
      <!-- Item 2 Strat -->
     <!--  <dl class='bitem'>
        <dt onClick='showHide("items2_1")'><b>系统帮助</b></dt>
        <dd style='display:block' class='sitem' id='items2_1'>
          <ul class='sitemu'>
            <li><a href='http://www.mycodes.net' target='_blank'>官方网站</a></li>
            <li><a href='http://www.mycodes.net' target='_blank'>更多后台模板</a></li>
          </ul>
        </dd>
      </dl> -->
      <!-- Item 2 End -->
	  </td>
  </tr>
</table>
</body>
</html>