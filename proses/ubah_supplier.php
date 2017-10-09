<?php
$id_supplier = $_POST['id_supplier'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
$email = $_POST['email'];
$res = updateSupplier($id_supplier,$nama,$alamat,$kontak,$email);
if($res){
  echo json_encode(array('success'=>true,'res'=>$res));
}else{
  echo json_encode(array('success'=>false,'res'=>$res));
}
