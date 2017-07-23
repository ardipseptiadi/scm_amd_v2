<h1>Pengolahan Data Produk</h1>
<hr>
<center><h3> Form Tambah Data Produk</h3></center><br />
<p>Semua Kolom harus diisi !</p>
<form class="form-horizontal" name="tambahproduk" method="post" action="proses.php?action=tambah_produk">
  <div class="form-group">
    <label for="input_kode" class="col-sm-2 control-label">Kode Produk</label>
    <div class="col-sm-4">
      <input type="text" name="kode_produk" class="form-control" placeholder="Masukan Kode" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_nama" class="col-sm-2 control-label">Nama Produk</label>
    <div class="col-sm-4">
      <input type="text" name="nama_produk" class="form-control" placeholder="Masukan Nama" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_harga" class="col-sm-2 control-label">Harga Produk</label>
    <div class="col-sm-4">
      <input type="number" name="harga_produk" class="form-control" placeholder="Masukan Harga" required min="100" max="999999">
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
