<?php
  $listmaterial = getAllMaterial();
 ?>
<h1>Pengolahan Data Persediaan</h1>
<hr>
<center><h3> Form Kurang Data Persediaan</h3></center><br />
<p>Semua Kolom Wajib diisi!</p>
<form class="form-horizontal" name="kurangpersediaan" method="post" action="proses.php?action=kurang_persediaan">
<div class="form-group">
<label for="input_nama_material" class="col-sm-2 control-label">Nama Material</label>
<div class="col-sm-4">

<select class="form-control" name="material" required>
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
<label for="input_persediaan" class="col-sm-2 control-label">Jumlah</label>
<div class="col-sm-4">
<input type="text" name="kurangpersediaan" class="form-control" id="input_persediaan" placeholder="Masukan jumlah" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-2">
<input type="submit" name="kurangi" class="btn btn-default" value="Kurangi" required>
</div>
<div class=" col-sm-3">
<a href="index.php?content=data/persediaan" class="btn btn-default">Batal</a>
</div>
</div>
</form>
