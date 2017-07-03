<?php
if ($_POST['tambahkan']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$namaagen=$_POST['namaagen'];
$alamatagen=$_POST['alamat_agen'];
$kontak=$_POST['kontak'];
$email=$_POST['email'];
$statusagen=$_POST['statusagen'];

mysql_query ("INSERT INTO t_agen VALUES('','$namaagen','$alamatagen','$kontak','$email','$statusagen');") or die (mysql_error());

 }
 header( "Location: http://localhost/amidis/dataagen.php"); 
?>