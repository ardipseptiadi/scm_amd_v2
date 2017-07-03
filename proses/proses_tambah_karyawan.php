<?php
if ($_POST['tambahkan']){

	$nip = $_POST['nip'];
	$namakaryawan=$_POST['nama_karyawan'];
	$kontak=$_POST['kontak'];
	$jabatan=$_POST['jabatan'];
	$email=$_POST['email'];
	$statuskaryawan=$_POST['status'];
	$password=$_POST['password'];

	
	mysql_connect("localhost","root","") or die (mysql_error());
	mysql_select_db("dbamidis") or die (mysql_error());
	
	mysql_query ("INSERT INTO t_karyawan 		VALUES('','$nip','$namakaryawan','$kontak','$jabatan','$email ','$statuskaryawan','$password');") or die (mysql_error());
}
 
 header( "Location: http://localhost/amidis/datakaryawan.php"); 
?>