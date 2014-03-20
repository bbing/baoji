<?php

class  GradeModel extends Model
{
	
   	
	protected $_auto = array (
    	array('optime','time',3,'function'),     
	);

    protected  $_validate =array(
			array('groupname','require','等级名称必须填写',0,'',3),				

			array('groupname','checkName','等级名称已经存在',0,'callback',1),	
			
	);
	protected function checkName($groupname)
	{
		$Grade=M('Grade');
		$where['groupname']=$groupname;
		$count=$Grade->where($where)->count();
		if($count>0)
			return false;
		else
			return true;
	}

}

?>