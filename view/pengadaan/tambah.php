<?php
  $date = date("m-Y");
  if(isset($_GET['kd'])){
    $kd_produk = $_GET['kd'];
  }else{
    $kd_produk='GL';
  }
  $list_material = getAllMaterialByProduk($kd_produk);
  $nama_produk = getNameProduk($kd_produk);
 ?>

<h1>Pengolahan Data Pengadaan</h1>
<hr>
<center><h3> Form Tambah Data Pengadaan</h3><small>Produk <?=$nama_produk?></small></center><br />
<p>Semua kolom wajib diisi !</p>
<form class="form-horizontal" name="tambahpengadaan" method="post" action="proses.php?action=tambah_pengadaan">
  <div class="form-group">
    <label for="no_pengadaan" class="col-sm-2 control-label">No Pengadaan</label>
    <div class="col-sm-2">
      <input type="hidden" name="kd_produk" value="<?=$kd_produk?>"/>
      <input class="form-control" type="text" name="no_pengadaan" readonly="true" value="<?=generateNoPengadaan($kd_produk)?>" />
    </div>
  </div>
  <div class="form-group">
    <label for="input_peramalan" class="col-sm-2 control-label">Peramalan</label>
    <div class="col-sm-2">
      <p class="control-label">Produk <?=$nama_produk?></p>
    </div>
    <div class="col-sm-2">
      <input class="form-control" type="text" name="peramalan" readonly="true" value="<?=getLastPeramalan($kd_produk)?>" />
    </div>
  </div>
  <div class="form-group">
  <label class="col-sm-2 control-label">Rekomendasi Pengadaan</label>
  <?php foreach($list_material as $value) {
    $rekomendasi = getPengadaanMaterial($kd_produk,$value['id_material'],$date);
  ?>
  <div class="col-sm-2">
    <input type="text" name="rekomendasi[<?=$value['id_material']?>]" class="form-control" readonly="true" value="<?=$rekomendasi?>"/>
  </div>
  <?php }?>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Material</label>
  <?php foreach ($list_material as $key => $value) { ?>
  <div class="col-sm-2">
    <input type="text" class="form-control" name="material[<?=$value['id_material']?>]" readonly="true" value="<?=$value['nama_material']?>"/>
  </div>
  <?php }?>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Harga</label>
  <?php foreach ($list_material as $key => $value) { ?>
  <div class="col-sm-2">
    <input type="text" class="form-control" name="harga_material[<?=$value['id_material']?>]" readonly="true" value="<?=$value['harga']?>"/>
  </div>
  <?php }?>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Pilih Supplier</label>
  <?php foreach ($list_material as $key => $value) { ?>
  <?php $data_s = getSupplierByMaterial($value['id_material']);?>
  <div class="col-sm-2">
    <input type="text" class="form-control" name="supplier[<?=$data_s['id_supplier']?>]" readonly="true" value="<?=$data_s['nama_supplier']?>" data-id="<?=$data_s['id_supplier']?>"/>
    <input type="hidden" name="supplier_material[<?=$value['id_material']?>]" value="<?=$data_s['id_supplier']?>" />
  </div>
  <?php }?>
</div>
<div class="form-group">
  <label for="input_tgl" class="col-sm-2 control-label">Tgl Pengadaan</label>
  <div class="col-sm-4">
    <div class="input-group date">
      <input type="text" class="form-control" name="tanggal_pengadaan" id="tanggal_s" value="<?php echo date('d-m-Y'); ?>" readonly="true"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Pengadaan</label>
  <?php foreach ($list_material as $value) {
    $rekomendasi = getPengadaanMaterial($kd_produk,$value['id_material'],$date);
    ?>
  <div class="col-sm-2">
    <input type="number" name="pengadaan[<?=$value['id_material']?>]" class="form-control" required min="1" max="999999" value="<?=$rekomendasi?>" data-id="<?=$value['id_material']?>"/>
  </div>
  <?php }?>
</div>
<div class="form-group">
  <div class="col-sm-offset-2 col-sm-2">
  <input type="submit" name="tambahkan" class="btn btn-primary" value="Tambahkan" required>
  </div>
  <div class=" col-sm-3">
  <a href="index.php?content=data/pengadaan" class="btn btn-default">Batal</a>
  </div>
</div>
</form>
<script>
// $(document).ready(function(){
//   $("button").click(function(){
//       $("p").slideToggle();
//   });
// });
</script>
