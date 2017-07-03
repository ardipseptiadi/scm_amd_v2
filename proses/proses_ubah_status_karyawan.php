<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$idnip=$_POST['idnip'];
$namakaryawan=$_POST['nama_karyawan'];
$status=$_POST['statuskaryawan'];



$res=mysql_query ("UPDATE  `dbamidis`.`t_karyawan` SET   `status` =  '$status' WHERE  `t_karyawan`.`nip` =  '$idnip'") or die (mysql_error());

 }
 if ($res){
 header( "Location: http://localhost/amidis/datakaryawan.php"); 
 }
?>