<?php
$id_material = $_POST['id_material'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$res = updateMaterial($id_material,$nama,$harga);
if($res){
  echo json_encode(array('success'=>true,'res'=>$res));
}else{
  echo json_encode(array('success'=>false,'res'=>$res));
}
