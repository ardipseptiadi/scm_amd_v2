<?php
  mysql_connect("localhost","root","") or die (mysql_error());
  mysql_select_db("dbamidis") or die (mysql_error());
  $res = mysql_query("UPDATE t_pemesanan SET verifikasi = 'sudah' WHERE verifikasi = 'belum'");
  if($res){
    header( "Location: ../verifikasi/verifikasipemesanan.php");
  }else{

      header( "Location: ../verifikasi/verifikasipemesanan.php?error=1");
  }
 ?>
