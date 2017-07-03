<?php
if ($_POST['tambahkan']){
  mysql_connect("localhost","root","") or die (mysql_error());
  mysql_select_db("dbamidis") or die (mysql_error());

  $kode_produk=$_POST['kodeproduk'];
  $tglpesan= $_POST['tanggal'];
  $peramalan= $_POST['peramalan'];

  $sql= mysql_query("SELECT kebutuhan FROM t_detail_bom WHERE peramalan ='$peramalan'");
  $data = mysql_fetch_array($sql);
    if($data){
      $total_kebutuhan=$data['kebutuhan']*$peramalan;

      $tglpesan = date_format(date_create($tglpesan),"Y-m-d");

      $result= mysql_query("INSERT INTO t_bom (bulan_tahun, kode_produk, 'hasil') VALUES ('$tglpesan','$kodeproduk','')");

      $result_detail = mysql_query ("INSERT INTO t_detail_bom (kode_produk, kebutuhan,hasil, total_kebutuhan) VALUES('$kodeproduk','1',$hasil,'$total_kebutuhan');") or die (mysql_error());
    }


 }
 header( "Location: ../databom.php");
?>
