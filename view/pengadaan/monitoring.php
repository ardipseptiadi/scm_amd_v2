<?php
  $data_table = getMonitoringPengadaan();
 ?>
<h1>Monitoring Pengadaan</h1>
<hr>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>No Pengadaan</th>
      <th>Status Verifikasi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1;?>
    <?php foreach($data_table as $data){ ?>
    <tr>
      <td><?=$i?></td>
      <td><?=$data['no_pengadaan'];?></td>
      <td><?=$data['is_verifikasi']==1?'Sudah':'Belum';?></td>
    </tr>
    <?php $i++; ?>
    <?php }?>
  </tbody>
</table>
