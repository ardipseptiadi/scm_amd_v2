<?php
$post = isset($_POST)?$_POST:[];
$no_pengadaan = $post['no_pengadaan'];
$kode_produk = $post['kd_produk'];
$sup_mat = $post['supplier_material'];
$har_mat = $post['harga_material'];
$list_material = $post['material'];
$pengadaan = $post['pengadaan'];
$tgl = date("Y-m-d");
$jml=0;
$total_harga=0;
foreach ($list_material as $key => $value) {
  $total_harga+= $pengadaan[$key]*$har_mat[$key];
}
$id_pengadaan = insertPengadaan($no_pengadaan,$kode_produk,$jml,$total_harga);
foreach ($list_material as $key => $value) {
  $detail = array(
    'id_material' => $key,
    'id_supplier' => $sup_mat[$key],
    'no_pengadaan' => $no_pengadaan,
    'id_pengadaan' => $id_pengadaan,
    'qty' => $pengadaan[$key],
    'harga' => $har_mat[$key]
  );
  $res = insertDetailPengadaan($detail);
}
var_dump($res);exit;
header('Location: index.php?content=pengadaan/data');
die;

 ?>
