<?php
  mysql_connect("localhost","root","") or die (mysql_error());
  mysql_select_db("dbamidis") or die (mysql_error());
  $res = mysql_query("UPDATE t_pengadaan SET verifikasi = 'sudah' WHERE verifikasi = 'belum'");
  if($res){
    header( "Location: ../verifikasi/verifikasipengadaan.php");
  }else{

      header( "Location: ../verifikasi/verifikasipengadaan.php?error=1");
  }
 ?>
