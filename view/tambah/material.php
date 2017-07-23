<?php
$list_supplier = getAllSupplier();
$list_produk = getAllProduk();
 ?>

<h1>Pengolahan Data Material</h1>
<hr>
<center><h3> Form Tambah Data Material</h3></center><br />
<p>Semua Kolom harus diisi !</p>
<form class="form-horizontal" name="tambahmaterial" method="post" action="proses.php?action=tambah_material">
  <div class="form-group">
    <label for="input_nama" class="col-sm-2 control-label">Nama Material</label>
    <div class="col-sm-4">
      <input type="text" name="nama_material" class="form-control" placeholder="Masukan Nama" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_harga" class="col-sm-2 control-label">Harga Material</label>
    <div class="col-sm-4">
      <input type="number" name="harga_material" class="form-control" placeholder="Masukan Harga" required min="1" max="999999">
    </div>
  </div>
  <div class="form-group">
    <label for="input_stok" class="col-sm-2 control-label">Stok Awal</label>
    <div class="col-sm-4">
      <input type="number" name="stok_awal" class="form-control" placeholder="Masukan Stok" value="0" required min="0" max="999999">
    </div>
  </div>
  <div class="form-group">
    <label for="input_supplier" class="col-sm-2 control-label">Pilih Supplier</label>
    <div class="col-sm-4">
      <select name="supplier" class="form-control">
        <option disabled selected value>-- Pilih Supplier --</option>
        <?php foreach($list_supplier as $supplier){ ?>
        <option value="<?=$supplier['id_supplier']?>"><?=$supplier['nama_supplier']?></option>
        <?php }?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="input_produk" class="col-sm-2 control-label">Pilih Produk</label>
    <div class="col-sm-4">
      <select name="produk" class="form-control">
        <option disabled selected value>-- Pilih Produk --</option>
        <?php foreach($list_produk as $produk){ ?>
        <option value="<?=$produk['kode_produk']?>"><?=$produk['jenis']?></option>
        <?php }?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <input type="submit" name="tambahkan" class="btn btn-default" value="Tambahkan" required>
    </div>
    <div class=" col-sm-3">
      <a href="?content=data/produk" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>
