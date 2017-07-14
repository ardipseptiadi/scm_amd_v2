<?php
  $data_table = getAllPengadaan();
 ?>
<h1>Pengolahan Data Pengadaan</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="?content=tambah/pengadaan" class="btn btn-warning">Tambah Data Pengadaan </a></div> <br>
<table class="table table-bordered table-striped">
<thead>
<tr>
  <th>No</th>
  <th>Tgl pengadaan</th>
  <th>Verifikasi</th>
  <th>Nama Supplier</th>
</tr>
</thead>
<tbody>
  <?php foreach($data_table as $data){?>
    <tr>
      <td>1</td>
      <td><?=$data['tgl_pengadaan']?></td>
      <td><?=$data['verifikasi']?></td>
      <td><?=$data['nama_supplier']?></td>
    </tr>
  <?php }?>
</tbody>
</table>
