<?php
  $data_table = getMonitoringKendaraan();
 ?>
<h1>Monitoring Kendaraan</h1>
<hr>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>No Polisi</th>
      <th>Status Kendaraan</th>
      <th>Status Kiriman</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1;?>
    <?php foreach($data_table as $data){ ?>
    <tr>
      <td><?=$i?></td>
      <td><?=$data['no_polisi']?></td>
      <td><?=$data['status']?></td>
      <td>
        <?php
        switch ($data['status_proses']) {
          case '0':
            echo 'Belum Diproses';
            break;
            case '1':
              echo 'Sedang Menunggu Barang';
              break;
              case '2':
                echo 'Dalam Pengiriman';
                break;
                case '3':
                  echo 'Telah Selesai Digunakan';
                  break;

          default:
            echo 'Belum Digunakan';
            break;
        }
         ?>
      </td>
    </tr>
    <?php $i++; ?>
    <?php }?>
  </tbody>
</table>
