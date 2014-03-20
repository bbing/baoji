<?php
Class Cate
{
	//组合一位数组
	Static Public function unlimiteForLevel($cate,$html='--',$pid=0,$level=0)
	{
	  $arr=array();
	  foreach($cate as $v)
	  {
		 if($v['reid']==$pid) 
		 {
		   $v['level']=$level+1;
		   $v['html']=str_repeat($html,$level);
		   $arr[]=$v;
		   $arr=array_merge($arr,self::unlimiteForLevel($cate,$html,$v['id'],$level+1));
		 } 
	  }
	  return $arr;
	}
	//组合多维数组
	Static Public function  unlimitedForLayer($cate,$name='child',$pid=0)
	{
	  $arr=array();
	  foreach($cate as $v)
	  {
		 if($v['reid']==$pid) 
		 {
		   $v[$name]=self::unlimitedForLayer($cate,$name,$v['id']);
		   $arr[]=$v;
		 } 
		 
	  }
	  return $arr;
	}
	//传递一个子分类ID放回所有的父级分类
	Static Public function getParents($cate,$id)
	{
	  $arr=array();
	  foreach($cate as $v)
	  {
	   if($v['id']==$id)
	   {
		 $arr[]=$v['id']; 
	     $arr=array_merge($arr,self::getParents($cate,$v['reid']));
	   }
	 }
	 return $arr;
	}
	//传递一个父级分类ID返回所有的子集ID
	Static function  getChildsId($cate,$id)
	{
	  $arr=array();
	  foreach($cate as $v)
	  {
	  	if($v['reid']==$id)
	   	{
		 $arr[]=$v['id']; 
	     $arr=array_merge($arr,self::getChildsId($cate,$v['id']));
	   	}
	  
	  }
	  return $arr;
	}
	
	//传递一个父级分类ID返回所有的子集
	Static function  getChilds($cate,$id)
	{
	  $arr=array();
	  foreach($cate as $v)
	  {
	  	if($v['reid']==$id)
	   	{
		 $arr[]=$v; 
	     $arr=array_merge($arr,self::getChildsId($cate,$v['id']));
	   	}
	  
	  }
	  return $arr;
	}
	
}




?>