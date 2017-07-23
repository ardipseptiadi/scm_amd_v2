<?php
  if(isset($_GET['id'])){
    $id_detail = $_GET['id'];
  }else{
    $id_detail = 0;
  }
  $data_table = getPesananDetailByID($id_detail);
 ?>
<h1>Detail Pesanan</h1>
<hr>
<div style="text-align: left;">
  <a type="button" class="btn btn-default" href="index.php?content=pemesanan/data">Kembali </a>
</div>
<br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Produk</th>
    <th>QTY</th>
    <th>Harga Jual</th>
  </tr>
  </thead>
  <tbody>
    <?php $i=1;?>
    <?php foreach($data_table as $data){?>
      <tr>
        <td><?=$i;?></td>
        <td><?=$data['produk']?></td>
        <td><?=$data['qty_pesanan']?></td>
        <td><?=$data['harga_jual']?></td>
      </tr>
      <?php $i++;?>
    <?php }?>
  </tbody>
</table>
