<?php
import('@.Common.Category');
Class CategoryModel extends RelationModel{
//获取分类表中的字段
public  function fieldname($field,$typeid)
{
   $wheremark['id']=$typeid;
   $Category=D('Category');
   $data=$Category->field($field)->where($wheremark)->find();
   return $data[$field];
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
	          'mapping_fields'=>'fieldlist,code',
	          'as_fields'=>'fieldlist,code'
	    ),
	);
	
}

?>