<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$idnopolisi=$_POST['idnopolisi'];
$statuskendaraan=$_POST['statuskendaraan'];



$res=mysql_query ("UPDATE  `dbamidis`.`t_kendaraan` SET   `status` =  '$statuskendaraan' WHERE  `t_kendaraan`.`no_polisi` =  '$idnopolisi'") or die (mysql_error());

 }
 if ($res){
 header( "Location: http://localhost/amidis/monitoringkendaraan.php"); 
 }
?>