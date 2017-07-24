<?php
  $data_table = getMonitoringPesanan();
 ?>
<h1>Monitoring Pemesanan</h1>
<hr>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>No Pesanan</th>
      <th>Status Verifikasi</th>
      <th>Status Kiriman</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1;?>
    <?php foreach($data_table as $pesan){ ?>
    <tr>
      <td><?=$i;?></td>
      <td><?=$pesan['nomor'];?></td>
      <td><?=$pesan['is_verifikasi']==1?'Sudah':'Belum';?></td>
      <td><?=$pesan['keterangan'];?></td>
    </tr>
    <?php $i++; ?>
    <?php }?>
  </tbody>
</table>
