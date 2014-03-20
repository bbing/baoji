<?php

Class CacheAction extends CommonAction{
  public function index(){
     $this->del_cache();
 }
  private function del_cache() { 
 header("Content-type: text/html; charset=utf-8");
  //清文件缓存
  $dirs = array('./App/Runtime/');
  @mkdir('./App/Runtime',0777,true);
  //清理缓存
  foreach($dirs as $value) {
   $this->rmdirr($value);
  }
  $this->success('系统缓存清除成功！',U(GROUP_NAME.'/Index/main'));
  //echo '<div style="color:red;">系统缓存清除成功！</div>';   
 } 
  public function rmdirr($dirname) {
  if (!file_exists($dirname)) {
   return false;
  }
  if (is_file($dirname) || is_link($dirname)) {
   return unlink($dirname);
  }
  $dir = dir($dirname);
  if($dir){
   while (false !== $entry = $dir->read()) {
    if ($entry == '.' || $entry == '..') {
     continue;
    }
    //递归
    $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
   }
  }
  $dir->close();
  return rmdir($dirname);
 }
}
?>