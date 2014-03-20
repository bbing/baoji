<?php

Class ConfigModel extends Model
{
	protected $_auto = array (
    	array('optime','time',1,'function'),    
	);
	protected  $_validate =array(
		array('configname','require','变量名必须填写',0,'',1),			
		array('info','require','参数说明必须填写',0,'',1),				
		array('configname','checkName','变量名已经存在',0,'callback',1),
	);
	protected function checkName($configname)
	{
		$Config=M('Config');
		$where['configname']=$configname;
		$count=$Config->where($where)->count();
		if($count>0)
			return false;
		else
			return true;
	}
}

?>