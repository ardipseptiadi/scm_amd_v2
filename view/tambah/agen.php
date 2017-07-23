<h1>Pengolahan Data Agen</h1>
<hr>
<center><h3> Form Tambah Data Agen</h3></center><br />
<p>Semua Kolom harus diisi !</p>
<form class="form-horizontal" name="tambahagen" method="post" action="agen_proses.php">
  <div class="form-group">
    <label for="input_namaagen" class="col-sm-2 control-label">Nama Agen</label>
    <div class="col-sm-4">
      <input type="text" name="namaagen" class="form-control" id="input_namaagen" placeholder="Masukan Nama" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_alamatagen" class="col-sm-2 control-label">Alamat Agen</label>
    <div class="col-sm-4">
      <input type="text" name="alamat_agen" class="form-control" id="input_alamatagen" placeholder="Masukan Alamat" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_kontak" class="col-sm-2 control-label">Kontak</label>
    <div class="col-sm-4">
      <input type="text" name="kontak" class="form-control" id="input_kontak" placeholder="Masukan Nomor" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-4">
      <input type="text" name="email" class="form-control" id="input_email" placeholder="Masukan Email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_statusagen" class="col-sm-2 control-label">Status Agen</label>
    <div class="col-sm-4">
      <select class="form-control" name="statusagen" required>
        <option>Pilih</option>
        <option>Aktif</option>
        <option>Tidak Aktif</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <input type="submit" name="tambahkan" class="btn btn-default" value="Tambahkan" required>
    </div>
    <div class=" col-sm-3">
      <a href="?content=data/agen" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>
