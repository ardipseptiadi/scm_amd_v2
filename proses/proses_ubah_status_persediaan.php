<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$nama_material=$_POST['nama_material'];
$status=$_POST['status'];



$res=mysql_query ("UPDATE  `dbamidis`.`t_material` SET   `status` =  '$status'  WHERE  `t_material`.`nama_material` =  '$nama_material'") or die (mysql_error());

 }
 if ($res){
 header( "Location: http://localhost/amidis/datapersediaan.php"); 
 }
?>