<?php
  $data_karyawan = getAllKaryawan();
?>
<h1>Pengolahan Data Karyawan</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="form/form_tambah_agen.php" class="btn btn-warning">Tambah Data Karyawan </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>NIP</th>
    <th>Nama Karyawan</th>
    <th>Kontak</th>
    <th>Jabatan</th>
    <th>Email</th>
    <th>Status</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_karyawan =1;?>
  <?php foreach ($data_karyawan as $karyawan) {?>
    <tr>
      <td><?=$i_karyawan?></td>
      <td><?=$karyawan['nip'];?></td>
      <td><?=$karyawan['nama_karyawan'];?></td>
      <td><?=$karyawan['kontak'];?></td>
      <td><?=$karyawan['jabatan'];?></td>
      <td><?=$karyawan['email'];?></td>
      <td><?=$karyawan['status'];?></td>
      <td><a href="">UBAH</a></td>
    </tr>
  <?php $i_agen++;?>
  <?php } ?>
</tbody>
</table>
