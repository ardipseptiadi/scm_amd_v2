<?php
$nopol = $_POST['nopol'];
$kendaraan = $_POST['kendaraan'];
$jenis = $_POST['jenis'];
$kapasitas = $_POST['kapasitas'];
$res = updateKendaraan($nopol,$kendaraan,$jenis,$kapasitas);
if($res){
  echo json_encode(array('success'=>true,'res'=>$res));
}else{
  echo json_encode(array('success'=>false,'res'=>$res));
}
