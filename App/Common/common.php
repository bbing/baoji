<?php
import('Class.Cate',APP_PATH);
function gettopid($id)
 {
 	 $Category=D('Category');
   $order['sort']='asc';
   $order['id']='asc';
   $field=array('id','reid','typename','remark','type');
   $cate=$Category->field($field)->where($where)->select();
   $parents=getparent($id);
   return $parents[count($parents)-1];
 }


 function getlist($id)
 { 
   $Category=D('Category');
   $order['sort']='asc';
   $order['id']='asc';
   $field=array('id','reid','typename','remark','type','pic','isshow');
   $cate=$Category->field($field)->where($where)->order($order)->select();

   foreach($cate as $key=>$value)
   {

    $remark=$value['remark'];
    if($value['type']==0)
      $cate[$key]['url']=U($remark."/lists",array('typeid'=>$value['id']));
    else
      $cate[$key]['url']=U($remark."/index",array('typeid'=>$value['id']));
     $cate[$key]['flag']=in_array($value['id'],getparent(I('typeid')));
   }
   $list=Cate::unlimitedForLayer($cate,'child',$id);
   return $list;
 }

//获取一个栏目的所有的父级id
function getparent($id)
 {
   $Category=D('Category');
   $order['sort']='asc';
   $order['id']='asc';
   $field=array('id','reid','typename','remark','type');
   $cate=$Category->field($field)->where($where)->select();
   $parents=Cate::getParents($cate,$id);
   return $parents;
 }

//读取一个栏目的所有的子栏目的id
function getchild($reid)
{
   $Category=D('Category');
   $order['sort']='asc';
   $order['id']='asc';
   $field=array('id','reid','typename','remark','type');
   $sort=array('sort'=>'asc','id'=>'asc');
   $cate=$Category->field($field)->where($where)->order($sort)->select();
   $childids=Cate::getChildsId($cate,$reid);
   $childids[]=$reid;
   return $childids;
}

function brand($typeid)
{
   $Category=D('Category');
   $parents=getparent($typeid);
   
 
   $j=0;
   for ($i=count($parents)-1; $i >=0 ; $i--) 
   {
      $id=$parents[$i];


      $data=$Category->find($id);

      $brands[$j]['typename']=$data['typename'];
	  /*$brands[$j]['typename_en']=$data['typename_en'];*/
      if($data['type']==0)
         $brands[$j]['url']=U($data['remark']."/lists",array('typeid'=>$id,'t'=>I('t')));
      else
          $brands[$j]['url']=U($data['remark']."/index",array('typeid'=>$id,'t'=>I('t')));
       $j++;
   }

   return $brands;
}

//获得一个栏目的的推荐信息
function recommend($typeid,$attrid,$limit='')
{
  $ArticleView=D('ArticleView');
  $child=getchild($typeid);
  $where['typeid']=array('in',$child);
  $where['attrid']=$attrid;
  $order['time']='desc';
  $order['id']='desc';
  $data=$ArticleView->where($where)->order($order)->limit($limit)->select();
  foreach($data as $k=>$v)
  {
    $data[$k]['url']=U($data['remark']."/view",array('typeid'=>$v['typeid'],'id'=>$v['id']));
  }
  $info['data']=$data;
  $Category=D('Category');
  $info['typename']=$Category->fieldname('typename',$typeid);
  $info['typename_en']=$Category->fieldname('typename_en',$typeid);
  $info['url']=U($Category->fieldname('remark',$typeid).'/lists',array('typeid'=>$typeid,'t'=>I('t')));
  return $info;
 } 

//横幅
function banner($typeid,$limit)
{
  $Img=D('Img');
  $where['typeid']=$typeid;
  $order=array('sort'=>'asc','id'=>'asc');
  $data=$Img->where($where)->limit($limit)->order($order)->select();
  foreach($data as $key=> $item)
  {
	  $data[$key]['pic']=__ROOT__."/".C('cfg_pic').$item['pic'];
   }
  return $data;

}

function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $str_lenth = count($match[0]);
    if(function_exists("mb_substr"))
      { 
        if($suffix && $str_lenth>$length) 
         return mb_substr($str, $start, $length, $charset)."...";
        else
         return mb_substr($str, $start, $length, $charset);
      }
  elseif(function_exists('iconv_substr')) 
      {
         if($suffix && $str_lenth>$length) 
            return iconv_substr($str,$start,$length,$charset)."...";
         else
            return iconv_substr($str,$start,$length,$charset); 
      }    
}
//加水印上传方法
function upload($img='pic')
{
  import('ORG.Net.UploadFile');
  $info['error']="";
  $upload = new UploadFile();// 实例化上传类
  $upload->maxSize  = C('cfg_max') ;// 设置附件上传大小
  $upload->allowExts  = preg_split('/\|/',C('cfg_pictype'));// 设置附件上传类型
  $upload->savePath = './'.C('cfg_pic');// 设置附件上传目录
 /* $upload->autoSub=true;
  $upload->subType='date';
  $upload->dateFormat='Ym';*/
  $infoimg=$upload->uploadOne($_FILES[$img]);
  if(!$infoimg) 
  {// 上传错误提示错误信息
    $info['error']=$upload->getErrorMsg();

  }
  else
  {// 上传成功 获取上传文件信息
  	$info['info'] = $infoimg;
	
	for($i=0;$i<count($info['info']);$i++)
	{
		
		$Imgconfig=D('Imgconfig');
		$datac=$Imgconfig->find();
	  if(C('WATER_OPEN'))
      {
         import('Class.Image',APP_PATH);
         Image::water('./'.C('cfg_pic').$info['info'][$i]['savename']);
      }
    if(C('WATER_OPEN_FONT'))
      {
         import('Class.Image',APP_PATH);
         Image::text('./'.C('cfg_pic').$info['info'][$i]['savename'],C('WATER_TEXT'));
      }
	 }

  }
  return $info;
}

//不加水印上传方法
function uploadpic()
{
  import('ORG.Net.UploadFile');
  $info['error']="";
  $upload = new UploadFile();// 实例化上传类
  $upload->maxSize  = C('cfg_max') ;// 设置附件上传大小
  $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
  $upload->savePath = './'.C('cfg_pic');// 设置附件上传目录
 /* $upload->autoSub=true;
  $upload->subType='date';
  $upload->dateFormat='Ym';*/
  if(!$upload->upload()) 
  {// 上传错误提示错误信息
    $info['error']=$upload->getErrorMsg();

  }
  else
  {// 上传成功 获取上传文件信息
  	$info['info'] =  $upload->getUploadFileInfo();
  }
  return $info;
}

function htmtocode($content) 
{
    $content=str_replace(chr(13),'<br>',$content);
    return $content;
}
function deldir($dir) {
    $dh=opendir($dir);
    while ($file=readdir($dh)) {
        if($file!="." && $file!="..") {
            $fullpath=$dir."/".$file;
            if(!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                deldir($fullpath);
            }
        }
    }
    closedir($dh);
    if(rmdir($dir)) {
        return true;
    } else {
        return false;
    }
}
 //获取附表信息
function getdatae($typeid,$aid)
{
  $datac=D('Category')->Relation('Mtable')->find($typeid);
  $etable=ucfirst(strtolower($datac['code'])); 
  $et=D($etable);
  $datae=$et->find($aid);

  return $datae;
}




/** 
* 产生随机字符串 
* 
* 产生一个指定长度的随机字符串,并返回给用户 
* 
* @access public 
* @param int $len 产生字符串的位数 
* @return string 
*/ 
function randstr($len=6) 
{ 
  $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~'; 
  // characters to build the password from 
  mt_srand((double)microtime()*1000000*getmypid()); 
  // seed the random number generater (must be done) 
  $password=''; 
  while(strlen($password)<$len) 
  $password.=substr($chars,(mt_rand()%strlen($chars)),1); 
  return $password; 
}
//发送邮件的方法
function sendmail($title,$body,$email)
{
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf8' . "\r\n";
    $headers .= 'From: ' . "mudy.com.cn" . "\r\n";
    if(!mail($email,"=?UTF-8?B?".base64_encode($title)."?=", $body,$headers))
    {
      import('Class.Smtp',APP_PATH);
      $smtp = new smtp(C('smtpserver'),C('smtpserverport'),true,C('smtpuser'),C('smtppass'));
      //$smtp->debug = TRUE;//是否显示发送的调试信息  
      $smtp->sendmail($email,C('smtpusermail'), $title, $body, C('mailtype'));
    }
}
?>