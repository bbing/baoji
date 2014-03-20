<?php

Class ImgModel extends RelationModel
{
	protected $_auto = array (
    	array('time','time',3,'function'),     
		array('optime','time',3,'function'),    
	);
	protected  $_validate =array(
			array('title','require','文档名称必须填写',0,'',3),				
			array('typeid','require','图片分类必须选择',0,'',3),		
			
			
	);
	
	 protected $_link=array(
		'Imgcategory'=> array(  
	    	  'mapping_type'=>BELONGS_TO,
	          'class_name'=>'Imgcategory',
	          'foreign_key'=>'typeid',
	          'mapping_name'=>'Imgcategory',
	          'mapping_fields'=>'typename',
	          'as_fields'=>'typename'
	    ),
		
		
	);
	
}


?>