<?php
$list_agen=getAllAgen();
$list_produk=getAllProduk();
 ?>
<h1>Pengolahan Data Pemesanan</h1>
<hr>
<center><h3> Form Tambah Data Pemesanan</h3></center><br />
<p>Semua Kolom harus diisi !</p>
<form class="form-horizontal" name="pesanan" method="post" action="proses.php?action=tambah_pesanan">
  <div class="form-group">
    <label class="col-sm-2 control-label">No Pemesanan</label>
    <div class="col-sm-4">
      <input type="text" name="no_pesanan" class="form-control" readonly="true" value="<?=generateNoPesanan()?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tanggal Pesan</label>
    <div class="col-sm-4">
      <input type="text" name="tgl_pesan" class="form-control" readonly="true" value="<?=date('d-m-Y')?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Pilih Agen</label>
    <div class="col-sm-4">
      <select name="agen" class="form-control" required>
        <option disabled selected value>-- Pilih Agen --</option>
        <?php foreach($list_agen as $agen) {?>
        <option value="<?=$agen['id_agen']?>"><?=$agen['nama_agen']?></option>
        <?php }?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="input_alamatagen" class="col-sm-2 control-label">Pilih Produk</label>
    <div class="col-sm-4">
      <select class="form-control dpd_produk" id="produk_pesan" name="produk" required>
        <option disabled selected value>-- Pilih Produk --</option>
        <?php foreach($list_produk as $produk) {?>
        <option value="<?=$produk['kode_produk']?>"><?=$produk['jenis']?></option>
        <?php }?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="input_kontak" class="col-sm-2 control-label">Harga Jual</label>
    <div class="col-sm-4">
      <input type="text" name="harga_jual" class="form-control qty_pesan" readonly='true' value="0">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Jumlah Pesan</label>
    <div class="col-sm-4">
      <input type="number" name="qty_pesan" class="form-control" required min="1" max="999999">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <input type="submit" name="tambahkan" class="btn btn-default" value="Tambahkan" required>
    </div>
    <div class=" col-sm-3">
      <a href="index.php?content=pemesanan/data" class="btn btn-default">Batal</a>
    </div>
  </div>
</form>
<script>
$(document).ready(function(){

  $(".dpd_produk").change(function(){
    var kd_produk = $('#produk_pesan option:selected').val();
    console.log(kd_produk);
    $.post("proses.php?action=get_harga_produk",
    {
      kd_produk: kd_produk
    },function(data){
      var res = JSON.parse(data);
      if(res.response == true){
        $(".qty_pesan").val(res.harga);
      }else{
        $(".qty_pesan").val(res.harga);
      }
    });
  });

});
</script>
