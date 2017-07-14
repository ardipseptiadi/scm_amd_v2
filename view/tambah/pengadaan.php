<h1>Pengolahan Data Pengadaan</h1>
<hr>
<center><h3> Form Tambah Data Pengadaan</h3></center><br />
<p>Semua kolom wajib diisi !</p>
<form class="form-horizontal" name="tambahpengadaan" method="post" action="../proses/proses_tambah_pengadaan.php">
<div class="form-group">
<label for="input_peramalan" class="col-sm-2 control-label">Peramalan</label>
<div class="col-sm-4">

<!-- <select class="form-control" name="peramalan" required>
<option>Pilih</option>

</select> -->
<input class="form-control" type="text" disabled="true" value="<?=getLastPeramalan('GL')?>" />
</div>
</div>
<div class="form-group">
<label for="input_material" class="col-sm-2 control-label">Nama Material</label>
<?php
$listmaterial=array();
// mysql_connect("localhost","root","") or die (mysql_error());
// mysql_select_db("dbamidis") or die (mysql_error());
//
// $hasil = mysql_query("SELECT id_material, nama_material FROM t_material") or die (mysql_error());
// while($row=mysql_fetch_array($hasil,MYSQL_ASSOC)){
// $listmaterial[]=$row;
// }
// mysql_free_result($hasil);
?>
<div class="col-sm-4">

<select class="form-control" name="nama_material" required>
<option>Pilih</option>
<?php
foreach($listmaterial as $material){
echo "<option value='".$material['id_material']."'>".$material['nama_material']."</option>";
}
?>

</select>
</div>
</div>
<div class="form-group">
<label for="input_nama_supplier" class="col-sm-2 control-label">Nama Supplier</label>
<?php
$listsupplier=array();
// mysql_connect("localhost","root","") or die (mysql_error());
// mysql_select_db("dbamidis") or die (mysql_error());
//
// $hasil = mysql_query("SELECT id_supplier, nama_supplier FROM t_supplier") or die (mysql_error());
// while($row=mysql_fetch_array($hasil,MYSQL_ASSOC)){
// $listsupplier[]=$row;
// }
// mysql_free_result($hasil);
?>

<div class="col-sm-4">
 <select class="form-control" name="supplier" required>
<option>Pilih</option>
<?php
foreach($listsupplier as $supplier){
echo "<option value='".$supplier['id_supplier']."'>".$supplier['nama_supplier']."</option>";
}
?>

</select>
</div>
</div>
<div class="form-group">
<label for="input_tgl" class="col-sm-2 control-label">Tgl Pengadaan</label>
<div class="col-sm-4">
<div class="input-group date">

<input type="text" class="form-control" name="tanggal" id="tanggal" value="<?php echo date('d-m-Y'); ?>" disabled="disabled"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
</div>
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-2">
<input type="submit" name="tambahkan" class="btn btn-default" value="Tambahkan" required>
</div>
<div class=" col-sm-3">
<a href="../datapengadaan.php" class="btn btn-default">Batal</a>
</div>
</div>
</form>
