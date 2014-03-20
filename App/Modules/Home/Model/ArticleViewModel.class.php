<?php
Class ArticleViewModel extends ViewModel{
	
	 public $viewFields = array(
        'Article'=>array('id','title','description','time','_type'=>'LEFT'),
        'Category'=>array('typename','remark','id'=>'typeid','_on'=>'Category.id=Article.typeid'),
        'article_attr'=>array('_on'=>'Article.id=article_attr.bid'),
        'attr'=>array('id'=>'attrid','name','color','_on'=>'attr.id=article_attr.aid'),
       );

}

?>