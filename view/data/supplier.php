<?php
  $data_supplier = getAllSupplier();
?>
<h1>Pengolahan Data Supplier</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="form/form_tambah_agen.php" class="btn btn-warning">Tambah Data Supplier </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Nama Supplier</th>
    <th>Alamat Supplier</th>
    <th>Kontak</th>
    <th>Email</th>
    <th>Status</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_supplier =1;?>
  <?php foreach ($data_supplier as $supplier) {?>
    <tr>
      <td><?=$i_supplier?></td>
      <td><?=$supplier['nama_supplier'];?></td>
      <td><?=$supplier['alamat_supplier'];?></td>
      <td><?=$supplier['kontak'];?></td>
      <td><?=$supplier['email'];?></td>
      <td><?=$supplier['status'];?></td>
      <td><a href="">UBAH</a></td>
    </tr>
  <?php $i_supplier++;?>
  <?php } ?>
</tbody>
</table>
