<?php

Class MtableModel extends Model
{
	protected $_auto = array (  
		array('optime','time',3,'function'),     
	);
	
		protected  $_validate =array(
		array('name','require','模型名称必须填写',0,'',1),			
		array('code','require','模型表必须填写',0,'',1),				
		array('code','checkName','模型表已经存在',0,'callback',1),
	);
	protected function checkName($code)
	{
		$Mtable=M('Mtable');
		$where['code']=$code;
		$count=$Mtable->where($where)->count();

		if($count>0)
			return false;
		else
			return true;
	}


}

?>