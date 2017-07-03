<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$nip=$_POST['nip'];
$idnip=$_POST['idnip'];
$namakaryawan=$_POST['nama_karyawan'];
$kontak=$_POST['kontak'];
$email=$_POST['email'];




$res=mysql_query ("UPDATE  `dbamidis`.`t_karyawan` SET `nip`= '$nip', `nama_karyawan`='$namakaryawan',  `kontak` =  '$kontak', `email` =  '$email' WHERE  `t_karyawan`.`nip` =  '$idnip'") or die (mysql_error());

 }
 if ($res){
 header( "Location: http://localhost/amidis/datakaryawan.php"); 
 }
?>