<?php
include('../lib/query.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$nip = isset($_POST['nip'])?$_POST['nip']:'';
$pass = isset($_POST['password'])?$_POST['password']:'';
if(cekLogin($nip,$pass)){
  $_SESSION['is_login'] = true;
  $_SESSION['err_login'] = false;
  $_SESSION['data_login'] = getLoginData($nip,$pass);
  header('Location: ../index.php');
}else{
  $_SESSION['is_login'] = false;
  $_SESSION['err_login'] = true;
  $_SESSION['data_login'] = [];
  header('Location: login.php');
}
 ?>
