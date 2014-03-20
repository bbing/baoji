<?php
import('@.Common.Category');
Class ImgcategoryModel extends RelationModel{
	protected $_auto = array (
    	array('optime','time',3,'function'),     
	);


	protected  $_validate =array(
			array('typename','require','栏目名称必须填写',0,'',3),				
		
			array('typename','checkName','栏目名称已经存在',0,'callback',1),	
			
	);
	protected function checkName($typename)
	{
		$Imgcategory=M('Imgcategory');
		$where['typename']=$typename;
		$count=$Imgcategory->where($where)->count();
		if($count>0)
			return false;
		else
			return true;
	}
	
	 public function category($typeid=0) {
         $cat = new Category('Imgcategory', array('id', 'reid', 'typename', 'fullname'));
          return $cat->getList('',$typeid,'`sort` asc,`id` asc');               //获取分类结构
    }

  
	
}

?>