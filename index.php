<?php
if(!file_exists('./Common/dblink.php'))
{
   header('Location:./install.php');
   exit();
}
define('THINK_PATH', './ThinkPHP/');
define('APP_NAME','App');
define('APP_PATH', './App/');
define('APP_DEBUG', true);
define('RUNTIME_PATH',APP_PATH."/Runtime/");
include THINK_PATH."ThinkPHP.php";
?>