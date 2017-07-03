<?php
if ($_POST['tambahkan']){
  mysql_connect("localhost","root","") or die (mysql_error());
  mysql_select_db("dbamidis") or die (mysql_error());

  $kode_produk=$_POST['kodeproduk'];
  $jumlah=$_POST['jumlah'];
  $id_agen=$_POST['agen'];
  $tglpesan= $_POST['tanggal'];

  $sql= mysql_query("SELECT harga FROM t_produk WHERE kode_produk ='$kode_produk'");
  $data = mysql_fetch_array($sql);
    if($data){
      $total_harga=$data['harga']*$jumlah;

      $tglpesan = date_format(date_create($tglpesan),"Y-m-d");

      $result= mysql_query("INSERT INTO t_pemesanan (tgl_pesan, verifikasi, status, id_agen, total_harga) VALUES ('$tglpesan','belum','belum di setujui','$id_agen','$total_harga')");

      $result_detail = mysql_query ("INSERT INTO t_detail_pemesanan (sub_total,kode_produk, kode_pesan,jumlah) VALUES('$total_harga','$kode_produk',last_insert_id(),'$jumlah');") or die (mysql_error());
    }


 }
 header( "Location: datapemesanan.php");
?>
