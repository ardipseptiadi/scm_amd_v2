<?php
$id_agen = $_POST['id_agen'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
$email = $_POST['email'];
$res = updateAgen($id_agen,$nama,$alamat,$kontak,$email);
if($res){
  echo json_encode(array('success'=>true,'res'=>$res));
}else{
  echo json_encode(array('success'=>false,'res'=>$res));
}
