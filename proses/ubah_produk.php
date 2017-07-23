<?php
$kode = $_POST['kd_produk'];
$nama = $_POST['nama_produk'];
$harga = $_POST['harga_produk'];
$res = updateProduk($kode,$nama,$harga);
if($res){
  echo json_encode(array('success'=>true,'res'=>$res));
}else{
  echo json_encode(array('success'=>false,'res'=>$res));
}
 ?>
