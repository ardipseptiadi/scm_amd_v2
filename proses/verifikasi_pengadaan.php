<?php
if(isset($_POST['id_pengadaan'])){
  $id = $_POST['id_pengadaan'];
}else{
  $id = 0;
}
if(isset($_POST['verifikasi'])){
  if($_POST['verifikasi'] == 'verify'){
    $res = verifikasiPengadaan($id);
  }elseif($_POST['verifikasi'] == 'cancel'){
    $res = batalVerifikasiPengadaan($id);
  }
}
if($res){
  echo json_encode(array('success'=>true));
}else{
  echo json_encode(array('success'=>false));
}
 ?>
