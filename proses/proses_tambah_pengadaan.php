<?php
if ($_POST['tambahkan']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$peramalan=$_POST['peramalan'];
$nama_material=$_POST['nama_material'];
$supplier=$_POST['supplier'];
$id=$_POST['peramalan'];
$tgl = date('y-m-d');
$sql=mysql_query("select * from t_peramalan where id_peramalan='$id'");
$data=mysql_fetch_array($sql);
$jumlah=$data['hasil'];
$result= mysql_query("INSERT INTO t_pengadaan (id_material,tgl_pengadaan,jumlah, id_supplier, verifikasi) VALUES ('$nama_material','$tgl','$jumlah','$supplier','belum')");



 }
 header( "Location: http://localhost/amidis/datapengadaan.php"); 
?>