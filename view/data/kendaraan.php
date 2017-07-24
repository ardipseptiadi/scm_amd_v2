<?php
  $data_kendaraan = getAllKendaraan();
?>
<h1>Pengolahan Data Kendaraan</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="index.php?content=tambah/kendaraan" class="btn btn-warning">Tambah Data Kendaraan </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>No Polisi</th>
    <th>Jenis Kendaraan</th>
    <th>Kendaraan</th>
    <th>Kapasitas</th>
    <th>Status</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_kendaraan =1;?>
  <?php foreach ($data_kendaraan as $kendaraan) {?>
    <tr>
      <td><?=$i_kendaraan?></td>
      <td><?=$kendaraan['no_polisi'];?></td>
      <td><?=$kendaraan['jenis_kendaraan'];?></td>
      <td><?=$kendaraan['kendaraan'];?></td>
      <td><?=$kendaraan['kapasitas'];?></td>
      <td><?=$kendaraan['status'];?></td>
      <td><a href="">UBAH</a></td>
    </tr>
  <?php $i_kendaraan++;?>
  <?php } ?>
</tbody>
</table>
