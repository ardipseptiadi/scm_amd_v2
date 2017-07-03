<?php
if ($_POST['ubah']){
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());

$idnamasupplier=$_POST['idnamasupplier'];
$namasupplier=$_POST['namasupplier'];
$status=$_POST['statussupplier'];



$res=mysql_query ("UPDATE  `dbamidis`.`t_supplier` SET   `status` =  '$status' WHERE  `t_supplier`.`nama_supplier` =  '$idnamasupplier'") or die (mysql_error());

 }
 if ($res){
 header( "Location: http://localhost/amidis/datasupplier.php"); 
 }
?>