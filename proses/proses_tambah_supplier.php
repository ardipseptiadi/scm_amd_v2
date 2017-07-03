<?php
if ($_POST['tambahkan']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$namasupplier=$_POST['namasupplier'];
$alamatsupplier=$_POST['alamat_supplier'];
$kontak=$_POST['kontak'];
$email=$_POST['email'];
$statussupplier=$_POST['statussupplier'];

mysql_query ("INSERT INTO t_supplier VALUES('','$namasupplier','$alamatsupplier','$kontak','$email','$statussupplier');") or die (mysql_error());

 }
 header( "Location: http://localhost/amidis/datasupplier.php"); 
?>