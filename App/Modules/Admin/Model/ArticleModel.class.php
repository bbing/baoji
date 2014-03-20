<?php

Class ArticleModel extends RelationModel
{
	protected $_auto = array (
    	array('time','strtotime',3,'function'),     
		array('optime','time',3,'function'),     
	);
	protected  $_validate =array(
			array('title','require','文档名称必须填写',0,'',3),				
			array('typeid','require','栏目分类必须选择',0,'',3),		
			
			
	);
	
	 protected $_link=array(
		'Category'=> array(  
	    	  'mapping_type'=>BELONGS_TO,
	          'class_name'=>'Category',
	          'foreign_key'=>'typeid',
	          'mapping_name'=>'Category',
	          'mapping_fields'=>'cmark,typename',
	          'as_fields'=>'cmark,typename'
	    ),
		 'imgs'=> array(  
	          'mapping_type'=>HAS_MANY,
 			  'class_name'=>'imgs',
	          'foreign_key'=>'aid',
	          'mapping_name'=>'imgs',
	          'mapping_fields'=>'img'

	    ),
		'Mtable'=> array(  
	    	  'mapping_type'=>BELONGS_TO,
	          'class_name'=>'Mtable',
	          'foreign_key'=>'cmark',
	          'mapping_name'=>'Mtable',
	          'mapping_fields'=>'code',
	          'as_fields'=>'code'
	    ),

       'attr'=>array(
			'mapping_type'=>MANY_TO_MANY,
			'mapping_name'=>'attr',
			'foreign_key'=>'bid',
			'relation_foreign_key'=>'aid',
			'relation_table'=>'ry_article_attr',
			),

	);
	
}


?>