<?php
 Class CommentModel extends RelationModel
 {
	 
  	  protected $_link=array(
		'Article'=> array(  
	    	  'mapping_type'=>BELONGS_TO,
	          'class_name'=>'Article',
	          'foreign_key'=>'aid',
	          'mapping_name'=>'Article',
	          'mapping_fields'=>'title,typeid',
	          'as_fields'=>'title,typeid'
	    ),
		
		'User'=> array(  
	    	  'mapping_type'=>BELONGS_TO,
	          'class_name'=>'User',
	          'foreign_key'=>'userid',
	          'mapping_name'=>'User',
	          'mapping_fields'=>'username,nickname',
	          'as_fields'=>'username,nickname'
	    ),
		
	);
 
 
 }


?>