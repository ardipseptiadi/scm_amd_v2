<?php
include(dirname(__FILE__).'/lib/query.php');
include(dirname(__FILE__).'/lib/function.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['is_login']) && $_SESSION['is_login'])
{
  if($_GET['action']){
    $action = $_GET['action'];
    $file = dirname(__FILE__).'/proses/'.$action.'.php';
    if(file_exists($file)){
      include($file);
    }
  }
}
 ?>
