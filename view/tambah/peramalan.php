<?php
  $listproduk = getAllProduk();
 ?>
<h1>Pengolahan Data Peramalan</h1>
<hr>
<center><h3> Form Tambah Data Peramalan</h3></center><br />
<p>Semua kolom wajib diisi!</p>
<form class="form-horizontal" name="tambahperamalan" method="post" action="proses.php?action=tambah_peramalan">
<div class="form-group">
  <label for="bln" class="col-sm-2 control-label">Bulan Peramalan</label>
  <div class="col-sm-4 input-group">
    <input type="text" name="bulanramal" class="form-control input_tanggal" >
  </div>
</div>
<div class="form-group">
  <label for="bln" class="col-sm-2 control-label">Data diambil dari bulan:</label>
  <div class="col-sm-4 input-group">
    <input type="text" name="bulandata" class="form-control input_tanggal" >
  </div>
</div>
<div class="form-group">
    <label for="input_jenis_produk" class="col-sm-2 control-label">Jenis Produk</label>
  <div class="col-sm-4">

    <select class="form-control" name="kodeproduk" required>
      <option>Pilih</option>
    <?php
    foreach($listproduk as $produk){
    echo "<option value='".$produk['kode_produk']."'>".$produk['jenis']."</option>";
    }
    ?>
  </select>
    </div>
</div>
<div class="form-group">
  <div class="col-sm-offset-2 col-sm-2">
    <input type="submit" name="tambahkan" class="btn btn-default" value="Tambahkan">
  </div>
  <div class=" col-sm-3">
    <a href="index.php?content=data/peramalan" class="btn btn-default">Batal</a>
  </div>
</div>
</form>
