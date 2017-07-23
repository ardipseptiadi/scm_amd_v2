<?php
  $data_table = getAllProduk();
?>
<h1>Pengolahan Data Produk</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="index.php?content=tambah/produk" class="btn btn-warning">Tambah Data Produk </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Kode Produk</th>
    <th>Jenis</th>
    <th>Harga</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_table =1;?>
  <?php foreach ($data_table as $data) {?>
    <tr>
      <td><?=$i_table?></td>
      <td><?=$data['kode_produk'];?></td>
      <td><?=$data['jenis'];?></td>
      <td><?=$data['harga'];?></td>
      <td><a href="">UBAH</a></td>
    </tr>
  <?php $i_table++;?>
  <?php } ?>
</tbody>
</table>
