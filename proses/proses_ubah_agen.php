<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$namaagen=$_POST['namaagen'];
$idnamaagen=$_POST['idnamaagen'];
$alamatagen=$_POST['alamat_agen'];
$kontak=$_POST['kontak'];
$email=$_POST['email'];




$res=mysql_query ("UPDATE  `dbamidis`.`t_agen` SET `nama_agen`= '$namaagen', `alamat_agen`='$alamatagen',  `kontak` =  '$kontak', `email` =  '$email' WHERE  `t_agen`.`nama_agen` =  '$idnamaagen'") or die (mysql_error());

 }
 if ($res){
 header( "Location: http://localhost/amidis/dataagen.php"); 
 }
?>