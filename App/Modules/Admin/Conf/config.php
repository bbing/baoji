<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING'=>array(
        '__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME."/Tpl/Public",
		'__PLUGIN__'=>__ROOT__.'/Common/Plugin',
    ),
    'URL_HTML_SUFFIX'=>'',
	
   	'LANG_SWITCH_ON' => true,   // 开启语言包功能
	'LANG_LIST'        => 'zh-cn,en-us', // 允许切换的语言列表 用逗号分隔
	'DEFAULT_LANG' => 'zh-cn', // 默认语言
	
	'RBAC_SUPERADMIN'=>'Manger',       //超级管理员名称
	'ADMIN_AUTH_KEY'=>'superadmin',   //超级管理员识别 
	'USER_AUTH_ON'=>true,             //是否需要认证
    'USER_AUTH_TYPE'=>1,              //认证类型
    'USER_AUTH_KEY'=>'userid',    // 认证识别号
	'NOT_AUTH_MODULE'=>'Index,CommonAction.Public',            //无需认证的控制器
	'NOT_AUTH_ACTION'=>'do_add,do_edit,do_addUser,do_edituser,do_addNode,do_editNode,do_addRole,do_editRole,getCategory,mgroup,mtable,change,getextend,del_cache,ReWriteConfig,checksame,delimg',            //无需认证的动作方法

);
?>