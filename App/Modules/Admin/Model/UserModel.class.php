<?php
Class UserModel extends RelationModel
{
	protected $_link=array(
           'Grade'=> array(  
	    	  'mapping_type'=>BELONGS_TO,
	          'class_name'=>'Grade',
	          'foreign_key'=>'grade_id',
	          'mapping_name'=>'Grade',
	          'mapping_fields'=>'gradename',
	          'as_fields'=>'gradename'
	          ),
			  
			   'Role'=>array(
			    'mapping_type'=>MANY_TO_MANY,
			    'relation_table'=>'ry_role_user',
			    'foreign_key'=>'user_id',
				'relation_key'=>'role_id',
				'mapping_fields'=>'remark,name,id'
			   ),
			   
			   
	          );
	protected $_auto = array (
    	array('password','md5',1,'function') , 	 
    	
    	array('regtime','time',1,'function'),    
    	array('lastlogintime','time',1,'function'),  
    	array('optime','time',3,'function'),     
	);
	protected  $_validate =array(
		array('username','require','用户名必须填写',0,'',1),				
		array('username','checkName','用户名已经存在',0,'callback',1),		
		array('nickname','require','昵称必须填写',0,'',3),				
		array('groupid','require','用户组必须选择',0,'',1),				
	   
	    array('password','require','密码必须填写',0,'',3),					
		array('password','/^.{5,}$/','密码必须5位数以上',0,'regex',3),  	
		array('repassword','require','确认密码必须填写',0,'',3),			
		array('repassword','password','两次密码不一致',0,'confirm',3),		
	);
	protected function checkName($username)
	{
		$User=M('User');
		$where['username']=$username;
		$count=$User->where($where)->count();
		if($count>0)
			return false;
		else
			return true;
	}

}

?>