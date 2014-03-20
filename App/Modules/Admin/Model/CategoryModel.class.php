<?php
import('@.Common.Category');
Class CategoryModel extends RelationModel{
	protected $_auto = array (
    	array('optime','time',3,'function'),     
	);


	protected  $_validate =array(
			array('typename','require','栏目名称必须填写',0,'',3),				
			array('cmark','require','请选择栏目模型',0,'',3),				    
			//array('typename','checkName','栏目名称已经存在',0,'callback',1),	
			
	);
	protected function checkName($typename)
	{
		$Category=M('Category');
		$where['typename']=$typename;
		$count=$Category->where($where)->count();
		if($count>0)
			return false;
		else
			return true;
	}
	
	 public function category($typeid=0) {
         $cat = new Category('Category', array('id', 'reid', 'typename', 'fullname'));
          return $cat->getList('',$typeid,'`sort` asc,`id` asc');               //获取分类结构
    }

    protected $_link=array(
		'Mgroup'=> array(  
	    	  'mapping_type'=>BELONGS_TO,
	          'class_name'=>'Mgroup',
	          'foreign_key'=>'usertypeid',
	          'mapping_name'=>'mgroup',
	          'mapping_fields'=>'groupname',
	          'as_fields'=>'groupname'
	    ),
		'Mtable'=> array(  
	    	  'mapping_type'=>BELONGS_TO,
	          'class_name'=>'Mtable',
	          'foreign_key'=>'cmark',
	          'mapping_name'=>'Mtable',
	          'mapping_fields'=>'code,id',
	          'as_fields'=>'code,id:mid'
	    ),


	    
	);
	
}

?>