<h1>Tambah Data Karyawan</h1>
<hr>
<center><h3> Form Tambah Data Karyawan</h3></center><br />
<p>Semua Kolom harus diisi !</p>
<form class="form-horizontal" name="tambahkaryawan" method="post" action="proses.php?action=tambah_karyawan">
  <div class="form-group">
    <label for="input_nip" class="col-sm-2 control-label">NIP</label>
    <div class="col-sm-4">
      <input type="number" name="nip" class="form-control" id="input_nip" placeholder="Masukan NIP" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_nama" class="col-sm-2 control-label">Nama Karyawan</label>
    <div class="col-sm-4">
      <input type="text" name="nama" class="form-control" id="input_nama" placeholder="Masukan Nama" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_jabatan" class="col-sm-2 control-label">Jabatan</label>
    <div class="col-sm-4">
      <select name="jabatan" class="form-control">
        <option value="admin">Admin</option>
          <option value="operational direktur">Operasional Direktur</option>
            <option value="ppic">PPIC</option>
              <option value="gudang">Gudang</option>
                <option value="purchasing">Purchasing</option>
                  <option value="supir">Supir</option>
      </select>
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
    <label for="input_statusagen" class="col-sm-2 control-label">Status Karyawan</label>
    <div class="col-sm-4">
      <select class="form-control" name="statusagen" required>
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
      <a href="index.php?content=data/karyawan" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>
