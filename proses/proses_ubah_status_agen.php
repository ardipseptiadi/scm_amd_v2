<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$idnamaagen=$_POST['idnamaagen'];
$namaagen=$_POST['namaagen'];
$status=$_POST['statusagen'];



$res=mysql_query ("UPDATE  `dbamidis`.`t_agen` SET   `status` =  '$status' WHERE  `t_agen`.`nama_agen` =  '$idnamaagen'") or die (mysql_error());

 }
 if ($res){
 header( "Location: http://localhost/amidis/dataagen.php"); 
 }
?>