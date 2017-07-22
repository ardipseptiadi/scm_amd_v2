<?php
$post = isset($_POST)?$_POST:[];
$no_pengadaan = $post['no_pengadaan'];
$kode_produk = $post['kd_produk'];
$sup_mat = $post['supplier_material'];
$list_material = $post['material'];
$pengadaan = $post['pengadaan'];
$tgl = date("Y-m-d");
$jml=0;
$total_harga=0;
$id_pengadaan = insertPengadaan($no_pengadaan,$kode_produk,$jml,$total_harga);
foreach ($list_material as $key => $value) {
  $detail = array(
    'id_material' => $key,
    'id_supplier' => $sup_mat[$key],
    'no_pengadaan' => $no_pengadaan,
    'id_pengadaan' => $id_pengadaan,
    'qty' => $pengadaan[$key]
  );
  $res = insertDetailPengadaan($detail);
}
header('Location: index.php?content=data/pengadaan');
die;

 ?>
