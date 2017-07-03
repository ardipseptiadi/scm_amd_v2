<?php
if ($_POST['tambahkan']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$nopolisi=$_POST['nopolisi'];
$jeniskendaraan=$_POST['jeniskendaraan'];
$kendaraan=$_POST['kendaraan'];
$kapasitaskendaraan=$_POST['kapasitaskendaraan'];
$statuskendaraan=$_POST['statuskendaraan'];

mysql_query ("INSERT INTO t_kendaraan VALUES('$nopolisi','$jeniskendaraan','$kendaraan','$kapasitaskendaraan','$statuskendaraan');") or die (mysql_error());

 }
 header( "Location: http://localhost/amidis/datakendaraan.php"); 
?>