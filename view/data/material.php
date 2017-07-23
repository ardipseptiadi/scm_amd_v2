<?php
  $data_table = getAllMaterial();
?>
<h1>Pengolahan Data Material</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="index.php?content=tambah/material" class="btn btn-warning">Tambah Data Material </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Material</th>
    <th>Produk</th>
    <th>Harga</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i=1;?>
  <?php foreach ($data_table as $data) {?>
    <tr>
      <td><?=$i?></td>
      <td><?=$data['nama_material'];?></td>
      <td><?=$data['jenis'];?></td>
      <td><?=$data['harga'];?></td>
      <td><a href="">UBAH</a></td>
    </tr>
  <?php $i++;?>
  <?php } ?>
</tbody>
</table>
