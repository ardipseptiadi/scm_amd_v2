<?php
  if(isset($_GET['id'])){
    $id_pengadaan = $_GET['id'];
  }else{
    $id_pengadaan = 0;
  }
  $data_table = getPengadaanDetailByID($id_pengadaan);
 ?>
<h1>Detail Pengadaan</h1>
<hr>
<div style="text-align: left;">
  <a type="button" class="btn btn-default" href="index.php?content=pengadaan/data">Kembali </a>
</div>
<br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>No Pengadaan</th>
    <th>Material</th>
    <th>Supplier</th>
    <th>QTY</th>
    <th>Harga</th>
  </tr>
  </thead>
  <tbody>
    <?php $i=1;?>
    <?php foreach($data_table as $data){?>
      <tr>
        <td><?=$i;?></td>
        <td><?=$data['no_pengadaan']?></td>
        <td><?=$data['nama_material']?></td>
        <td><?=$data['nama_supplier']?></td>
        <td><?=$data['qty_pengadaan']?></td>
        <td><?=$data['harga_pengadaan']?></td>
      </tr>
      <?php $i++;?>
    <?php }?>
  </tbody>
</table>
