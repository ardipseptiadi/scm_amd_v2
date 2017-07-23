<?php
$post = isset($_POST)?$_POST:[];
$no_pesanan = $post['no_pesanan'];
$tgl_pesan = $post['tgl_pesan'];
$id_agen = $post['agen'];
$harga_jual = $post['harga_jual'];
$qty = $post['qty_pesan'];
$kode_produk = $post['produk'];
$detail = array(
  'kd_produk' => $kode_produk,
  'qty' => $qty,
  'harga' => $harga_jual
);
$id_detail = insertDetailPesanan($detail);
if($id_detail) {
  $datapsn = array(
    'id_detail' => $id_detail,
    'id_agen' => $id_agen,
    'no_pesanan' => $no_pesanan,
    'tgl_pesan' => $tgl_pesan
  );
  $id_pesanan = insertPesanan($datapsn);
  if($id_pesanan){
    $tgl_kirim = $tgl_pesan;
    $no_kirim = generateNoPengiriman();
    $res_kirim = insertPengiriman($no_kirim,$tgl_kirim,$id_pesanan);
    if($res_kirim)
      header("Location: index.php?content=pemesanan/data");
  }
}
 ?>
