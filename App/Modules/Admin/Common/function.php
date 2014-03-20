<?php


//数组递归
function  node_merge($node,$access=null,$pid=0)
{
	//dump($node);
	$arr=array();
	foreach ($node as $v)
	{
		
	  if(is_array($access))
	  {
		 $v['access']=in_array($v['id'],$access)?1:0;  
	  }	
		
	   if($v['pid']==$pid)
	   	{
		   $v['child']=node_merge($node,$access,$v['id']);
	       $arr[]=$v;
		}
    }
    return $arr;	
}
function node_child($id)
{ 
  static $str=array();
  $str[]=$id;
  $Node=D('Node');
  $data=$Node->where(array('pid'=>$id))->select();
  
  if(is_array($data))
  {
     foreach($data as $d)
	 {
	   node_child($d['id']);	 
	  
	 }  
  }
  
  return $str;	
}


function getmark($rmark)
{
	 //dump($rmark);
  $arr=array();
  foreach($rmark as $r)
  {
	 // dump($r);
	  $arr[]=$r['name'];
 }
 
return $arr;
}

?>