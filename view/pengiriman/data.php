<?php
  $data_table = getPengiriman();
?>
<h1>Pengolahan Data Pengiriman</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="form/form_tambah_agen.php" class="btn btn-warning">Tambah Data Pengiriman </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Tanggal Kirim</th>
    <th>Kode Pesan</th>
    <th>No Polisi</th>
    <th>Nama Agen</th>
    <th>Nama Karyawan</th>
    <th>Status</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_table =1;?>
  <?php foreach ($data_table as $data) {?>
    <tr>
      <td><?=$i_table?></td>
      <td><?=$data['tgl_kirim'];?></td>
      <td><?=$data['kode_pesan'];?></td>
      <td><?=$data['no_polisi'];?></td>
      <td><?=$data['nama_agen'];?></td>
      <td><?=$data['nama_karyawan'];?></td>
      <td><?=$data['status'];?></td>
      <td><a href="">UBAH</a></td>
    </tr>
  <?php $i_table++;?>
  <?php } ?>
</tbody>
</table>
