<?php
$id_karyawan = $_POST['id_karyawan'];
$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$email = $_POST['email'];
$res = updateKaryawan($id_karyawan,$nama,$kontak,$email);
if($res){
  echo json_encode(array('success'=>true,'res'=>$res));
}else{
  echo json_encode(array('success'=>false,'res'=>$res));
}
