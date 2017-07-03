<?php
if ($_POST['tambahkan']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

	$kodepesan = $_POST['pesan'];
	$kendaraan=$_POST['kendaraan'];
	$tglkirim= date('Y-m-d');
	$pengemudi=$_POST['pengemudi'];


	mysql_query ("INSERT INTO t_pengiriman (id_detail_pemesanan,no_polisi,tgl_kirim, status, id_karyawan) VALUES('$kodepesan','$kendaraan','$tglkirim','Dalam Pengiriman','$pengemudi');") or die (mysql_error());

 }
 header( "Location: ../datapengiriman.php");
?>
