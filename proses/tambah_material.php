<?php
if($_POST){
  $nama = $_POST['nama_material'];
  $harga = $_POST['harga_material'];
  $awal = $_POST['stok_awal'];
  $id_supplier = $_POST['supplier'];
  $id_produk = $_POST['produk'];
  $res = insertMaterial($nama,$harga,$awal,$id_supplier,$id_produk);
  if($res){
    header("Location: index.php?content=data/material");
  }else{
    header("Location: index.php");
  }
}else{
  header("Location: index.php");
}
 ?>
