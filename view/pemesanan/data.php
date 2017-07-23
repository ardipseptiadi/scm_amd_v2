<?php
  $data_table = getAllPesanan();
  $list_produk = getAllProduk();
 ?>
<h1>Pengolahan Data Pemesanan</h1>
<hr>
<div style="text-align: right;">
  <a type="button" class="btn btn-warning" href="index.php?content=pemesanan/tambah">Tambah Data Pemesanan </a>
</div>
<br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>No Pesanan</th>
    <th>Tgl Pesanan</th>
    <th>Total Harga</th>
    <th>Verifikasi</th>
    <th></th>
  </tr>
  </thead>
  <tbody>
    <?php $i=1;?>
    <?php foreach($data_table as $data){?>
      <tr>
        <td><?=$i?></td>
        <td><?=$data['no_pesanan']?></td>
        <td><?=$data['tgl_pesan']?></td>
        <td><?=$data['tot_harga']?></td>
        <td><?=$data['is_verifikasi']=='1'?'Sudah Diverifikasi':'Belum Diverifikasi'?></td>
        <td><a href="index.php?content=pemesanan/detail&id=<?=$data['id_detail_pesanan']?>" class="btn btn-xs btn-primary">detail</a></td>
      </tr>
      <?php $i++;?>
    <?php }?>
  </tbody>
</table>
