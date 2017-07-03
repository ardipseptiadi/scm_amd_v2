<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$kode_pesan=$_POST['kode_pesan'];
$status=$_POST['status'];



$res=mysql_query ("UPDATE  `dbamidis`.`t_pemesanan` SET   `status` =  '$status'  WHERE  `t_pemesanan`.`kode_pesan` =  '$kode_pesan'") or die (mysql_error());

 }
 if ($res){
 header( "Location: http://localhost/amidis/datapemesanan.php"); 
 }
?>