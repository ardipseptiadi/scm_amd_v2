<?php
if($_POST){
  $kode = $_POST['kode_produk'];
  $nama = $_POST['nama_produk'];
  $harga = $_POST['harga_produk'];
  $res = insertProduk($kode,$nama,$harga);
  if($res){
    header("Location: index.php?content=data/produk");
  }else{
    header("Location: index.php");
  }
}else{
  header("Location: index.php");
}
 ?>
