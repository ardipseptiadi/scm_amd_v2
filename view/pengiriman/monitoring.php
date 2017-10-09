<?php
  $data_table = getMonitoringPengiriman();
 ?>
<h1>Monitoring Pengiriman</h1>
<hr>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>No Pengiriman</th>
      <th>Tanggal Kirim</th>
      <th>Status Kirim</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1;?>
    <?php foreach($data_table as $data){ ?>
    <tr>
      <td><?=$i?></td>
      <td><?=$data['no_pengiriman'];?></td>
      <td><?=$data['tgl_kirim']?></td>
      <td><?=$data['keterangan']?></td>
    </tr>
    <?php $i++; ?>
    <?php }?>
  </tbody>
</table>
