<?php
  $data_agen = getAllAgen();
?>
<h1>Pengolahan Data Agen</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="?content=tambah/agen" class="btn btn-warning">Tambah Data Agen </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Nama Agen</th>
    <th>Alamat Agen</th>
    <th>Kontak</th>
    <th>Email</th>
    <th>Status</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_agen =1;?>
  <?php foreach ($data_agen as $agen) {?>
    <tr>
      <td><?=$i_agen?></td>
      <td><?=$agen['nama_agen'];?></td>
      <td><?=$agen['alamat_agen'];?></td>
      <td><?=$agen['kontak'];?></td>
      <td><?=$agen['email'];?></td>
      <td><?=$agen['status'];?></td>
      <td><a href="">UBAH</a></td>
    </tr>
  <?php $i_agen++;?>
  <?php } ?>
</tbody>
</table>
