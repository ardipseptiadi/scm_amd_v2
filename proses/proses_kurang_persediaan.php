<?php
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

	$material = $_POST['material'];
	$sql =mysql_query("select * from t_material where id_material='$material'");
	$data=mysql_fetch_array($sql);

	$jml=$_POST['kurangpersediaan'];
	$jmlbaru = $data['sisa']-$jml;

mysql_query ("UPDATE t_material set sisa = '$jmlbaru' where id_material = '$material'") or die (mysql_error());

 echo $material , "-" , $jmlbaru;

 header( "Location: ../datapersediaan.php"); 
?>
