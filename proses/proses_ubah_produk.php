<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$kode_produk=$_POST['produk'];
$kodeproduk=$_POST['kodeproduk'];
$jenis=$_POST['jenis'];
$harga=$_POST['harga'];

$res=mysql_query ("UPDATE  `dbamidis`.`t_produk` SET `kode_produk`= '$kode_produk', `harga` =  '$harga', `jenis`='$jenis'   WHERE  `t_produk`.`kode_produk` =  '$kode_produk'") or die (mysql_error());

 }
 if ($res){
 header( "Location: http://localhost/amidis/dataproduk.php"); 
 }
?>