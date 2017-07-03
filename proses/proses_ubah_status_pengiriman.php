<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$status=$_POST['status'];
$kodepesan = $_POST['kodepesan'];



$res=mysql_query ("UPDATE  `dbamidis`.`t_pengiriman` SET   `status` =  '$status' WHERE id_detail_pemesanan IN (SELECT id_detail_pemesanan FROM t_detail_pemesanan WHERE kode_pesan = '$kodepesan') ") or die (mysql_error());

 }
 if ($res){
 header( "Location: ../datapengiriman.php");
 }
?>
