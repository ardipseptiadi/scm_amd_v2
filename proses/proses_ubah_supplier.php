<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$namasupplier=$_POST['namasupplier'];
$idnamasupplier=$_POST['idnamasupplier'];
$alamatsupplier=$_POST['alamat_supplier'];
$kontak=$_POST['kontak'];
$email=$_POST['email'];




$res=mysql_query ("UPDATE  `dbamidis`.`t_supplier` SET `nama_supplier`= '$namasupplier', `alamat_supplier`='$alamatsupplier',  `kontak` =  '$kontak', `email` =  '$email' WHERE  `t_supplier`.`nama_supplier` =  '$idnamasupplier'") or die (mysql_error());

 }
 if ($res){
 header( "Location: http://localhost/amidis/datasupplier.php"); 
 }
?>