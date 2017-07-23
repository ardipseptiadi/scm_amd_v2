<?php
if(isset($_POST['kd_produk'])){
  $kode = $_POST['kd_produk'];
}else{
  $kode = 'ABC';
}
$res_harga = getHargaProduk($kode);
if($res_harga){
  $harga = $res_harga;
  echo json_encode(array('response'=>true,'harga'=>$harga));
}else{
  $harga = 0;
  echo json_encode(array('response'=>false,'harga'=>$harga));
}

 ?>
