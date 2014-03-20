<?php
return array(
'DB_PREFIX'=>'ry_',
'DB_DSN'=>'mysql://root:123456@localhost:3306/rongyuan',
//RBAC使用的的设置
//请不要在这里设置'SESSION_PREFIX' 前缀
//因为会解析成$_SESSION['think']['name']
'RBAC_ROLE_TABLE'=>'ry_role',//角色表名称
'RBAC_USER_TABLE'=>'ry_role_user',//角色与用户的中间表名称
'RBAC_ACCESS_TABLE'=>'ry_access',//权限表名称
'RBAC_NODE_TABLE'=>'ry_node',//权限表名称
);
?>