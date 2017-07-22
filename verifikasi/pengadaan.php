<?php
include(dirname(dirname(__FILE__)).'/lib/query.php');
$id = 14;
$res = verifikasiPengadaan($id);
var_dump($res);exit;
if($res){
  echo json_encode(array('success'=>true));
}else{
  echo json_encode(array('success'=>false));
}
 ?>
