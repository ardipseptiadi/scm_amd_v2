<?php
  $data_table = getAllPeramalan();
?>
<h1>Pengolahan Data Peramalan</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="?content=tambah/peramalan" class="btn btn-warning">Tambah Data Peramalan </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Bulan Peramalan</th>
    <th>Jenis Produk</th>
    <th>Jumlah Peramalan</th>

  </tr>
</thead>
<tbody>
  <?php
    $i=1;
    foreach($data_table as $data){?>
    <tr>
      <td><?=$i?></td>
      <td><?=$data['peramalan']?></td>
      <td><?=$data['kode_produk']?></td>
      <td><?=$data['hasil']?></td>
    </tr>
  <?php
    $i++;
  }?>
</tbody>
</table>
