<?php
if ($_POST['tambahkan']){

	$kode_produk = $_POST['produk'];
	$jenis=$_POST['nama_jenis'];
	$harga=$_POST['harga'];
	$jumlah=$_POST['jumlah'];
	
	
	mysql_connect("localhost","root","") or die (mysql_error());
	mysql_select_db("dbamidis") or die (mysql_error());
	
	mysql_query ("INSERT INTO t_produk VALUES('$kode_produk','$jenis','$harga','$jumlah');") or die (mysql_error());

 }
 header( "Location: http://localhost/amidis/dataproduk.php"); 
?>