<?php
  $list_produk = getAllProduk();
 ?>
<h1>Pengolahan Data Kendaraan</h1>
<hr>
<center><h3> Form Tambah Data Kendaraan</h3></center><br />
<p>Semua Kolom harus diisi !</p>
<form class="form-horizontal" name="tambahagen" method="post" action="proses.php?action=tambah_kendaraan">
  <div class="form-group">
    <label for="input_nopolisi" class="col-sm-2 control-label">No Polisi</label>
    <div class="col-sm-4">
      <input type="text" name="no_polisi" class="form-control" id="i_nopolisi" placeholder="Masukan No Polisi" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_jenis" class="col-sm-2 control-label">Jenis Kendaraan</label>
    <div class="col-sm-4">
      <select class="form-control" name="jenis_kendaraan" required>
        <option>Pilih</option>
        <option value="Engkel">Engkel</option>
        <option value="Fuso">Fuso</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="input_kendaraan" class="col-sm-2 control-label">Kendaraan</label>
    <div class="col-sm-4">
      <input type="text" name="kendaraan" class="form-control" id="i_kendaraan" placeholder="Masukan Kendaraan" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_kapasitas" class="col-sm-2 control-label">Kapasitas</label>
    <div class="col-sm-4">
      <input type="number" name="kapasitas" class="form-control" id="i_kapasitas" placeholder="Masukan Kapasitas" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_statusagen" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-4">
      <select class="form-control" name="status" required>
        <option>Pilih</option>
        <option value="tersedia">Tersedia</option>
        <option value="tidak tersedia">Tidak Tersedia</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="input_statusagen" class="col-sm-2 control-label">Produk</label>
    <div class="col-sm-4">
      <select class="form-control" name="produk" required>
        <!-- <option>Pilih</option> -->
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
      <a href="index.php?content=data/kendaraan" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>
