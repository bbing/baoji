<?php
$arr1=include './Common/webconfig.php';
$arr2=include './Common/dblink.php';
$arr=array_merge($arr1,$arr2);
$arr2=array(
	//'配置项'=>'配置值'
	//分组
	'APP_GROUP_LIST'=>'Home,Admin',
	'DEFAULT_GROUP'=>'Home',
    'TMPL_L_DELIM'=>'<{',
    'TMPL_R_DELIM'=>'}>',
    'TMPL_FILE_DEPR'=>'_',
    'LOAD_EXT_CONFIG'=>'water,mail',
  
    'TMPL_VAR_INDENTIFY'=>'array',
    'CFG_CONf'		 =>'./Common/',//网站基本配置文件路径
    //'SHOW_PAGE_TRACE'=>true,//开启页面Trace
	'URL_CASE_INSENSITIVE' =>true,
	'APP_GROUP_MODE'=>1,//开启独立分组
	'APP_GROUP_PATH'=>'Modules',//这个就是默认值，可以不写
	'URL_MODEL'=>1,

);
return array_merge($arr2,$arr);
?>