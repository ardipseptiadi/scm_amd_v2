<?php
  $list_produk = getAllProduk();
 ?>
<h1>Pengolahan Data Supplier</h1>
<hr>
<center><h3> Form Tambah Data Supplier</h3></center><br />
<p>Semua Kolom harus diisi !</p>
<form class="form-horizontal" name="tambahagen" method="post" action="proses.php?action=tambah_supplier">
  <div class="form-group">
    <label for="input_nama" class="col-sm-2 control-label">Nama Supplier</label>
    <div class="col-sm-4">
      <input type="text" name="nama" class="form-control" id="i_nama" placeholder="Masukan Nama Supplier" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_alamat" class="col-sm-2 control-label">Alamat Supplier</label>
    <div class="col-sm-4">
      <input type="text" name="alamat" class="form-control" id="i_alamat" placeholder="Masukan Alamat" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_kontak" class="col-sm-2 control-label">Kontak</label>
    <div class="col-sm-4">
      <input type="number" name="kontak" class="form-control" id="i_kontak" placeholder="Masukan Kontak" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-4">
      <input type="email" name="email" class="form-control" id="i_email" placeholder="Masukan Email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_status" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-4">
      <select class="form-control" name="status" required>
        <option>Pilih</option>
        <option value="aktif">Aktif</option>
        <option value="tidak aktif">Tidak Aktif</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <input type="submit" name="tambahkan" class="btn btn-default" value="Tambahkan" required>
    </div>
    <div class=" col-sm-3">
      <a href="index.php?content=data/supplier" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>
