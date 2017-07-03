<?php
if ($_POST['tambahkan']){
  include('../sem.php');

  mysql_connect("localhost","root","") or die (mysql_error());
  mysql_select_db("dbamidis") or die (mysql_error());

  $bulandata=$_POST['bulandata'];
  $bulanramal=$_POST['bulanramal'];
  $kodeproduk=$_POST['kodeproduk'];

  if(!empty($bulanramal)){
    $bulan = explode("-",$bulanramal);
    $bln = $bulan[0];
    $thn = $bulan[1];
  }else{
    $bln = 01;
    $thn = 2016;
  }
  if(!empty($bulandata)){
    $bulan_data = explode("-",$bulandata);
    $bln_data = $bulan_data[0];
    $thn_data = $bulan_data[1];
  }else{
    $bln_data = 01;
    $thn_data = 2016;
  }
  // var_dump($bulanramal);exit;
  // var_dump();exit;
  //$bln = 1;
  //$blnmulai = $bulandata

  for($i=$bln_data;$i<$bln;$i++){
    $query = "SELECT SUM(jumlah) as jumlah".$i." FROM t_detail_pemesanan WHERE kode_produk = '".$kodeproduk."' AND kode_pesan IN (SELECT kode_pesan FROM t_pemesanan WHERE MONTH(tgl_pesan) = ".$i." AND YEAR(tgl_pesan) = ".$thn.")";
    $res = mysql_query($query);
    $dataperamalan = mysql_fetch_assoc($res);
    $hasilperamalan[] = $dataperamalan['jumlah'.$i];
  }

  //$data = [37100,28400,34200,25000,38500,35400];
  if(!empty($hasilperamalan)){
    $data = $hasilperamalan;
    $peramalan = sem_MSE($data,$alpha,$numForecasts);
    $query_insertperamalan = mysql_query("INSERT INTO t_peramalan (peramalan,hasil,kode_produk) VALUES ('$bulanramal','$peramalan','$kodeproduk')");

  }

  // var_dump($peramalan);exit;

  //mysql_query ("INSERT INTO t_kendaraan VALUES('$nopolisi','$jeniskendaraan','$kapasitaskendaraan','$statuskendaraan');") or die (mysql_error());

 }
 header( "Location: ../dataperamalan.php");
?>
