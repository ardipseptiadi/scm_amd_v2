<?php
if(isset($_POST['id_pesanan'])){
  $id = $_POST['id_pesanan'];
}else{
  $id = 0;
}
if(isset($_POST['verifikasi'])){
  if($_POST['verifikasi'] == 'verify'){
    $res = verifikasiPesanan($id);
  }elseif($_POST['verifikasi'] == 'cancel'){
    $res = batalVerifikasiPesanan($id);
  }
}
if($res){
  echo json_encode(array('success'=>true));
}else{
  echo json_encode(array('success'=>false));
}
 ?>
