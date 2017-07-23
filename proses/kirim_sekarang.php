<?php
$id_kirim = $_POST['id_kirim'];
$res = updateStatusPengiriman(3,null,$id_kirim);
if($res){
  $res2 = updateProsesPengiriman(2,$id_kirim);
  if($res2){
    echo json_encode(array('success'=>true));
  }else{
    echo json_encode(array('success'=>false));
  }
}
 ?>
