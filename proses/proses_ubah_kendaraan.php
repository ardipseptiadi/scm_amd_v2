<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$nopolisi=$_POST['nopolisi'];
$idnopolisi=$_POST['idnopolisi'];
$jeniskendaraan=$_POST['jeniskendaraan'];
$kapasitaskendaraan=$_POST['kapasitaskendaraan'];



$res=mysql_query ("UPDATE  `dbamidis`.`t_kendaraan` SET `no_polisi`= '$nopolisi', `kapasitas`='$kapasitaskendaraan',  `jenis_kendaraan` =  '$jeniskendaraan' WHERE  `t_kendaraan`.`no_polisi` =  '$idnopolisi'") or die (mysql_error());

 }
 if ($res){
 header( "Location: http://localhost/amidis/monitoringkendaraan.php"); 
 }
?>