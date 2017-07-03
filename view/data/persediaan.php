<?php
  $bulan_teks = array(
    1=>'Januari',
    2=>'Februari',
    3=>'Maret',
    4=>'April',
    5=>'Mei',
    6=>'Juni',
    7=>'Juli',
    8=>'Agustus',
    9=>'September',
    10=>'Oktober',
    11=>'Nopember',
    12=>'Desember'
  );
  $bln_safety = 1;
  $thn_safety = 2017;
  if(isset($_GET['tgl1_safety']) && isset($_GET['tgl2_safety'])){
    $bln_safety = !$_GET['tgl1_safety']?1:$_GET['tgl1_safety'];
    $thn_safety = !$_GET['tgl2_safety']?2017:$_GET['tgl2_safety'];
    $res = updateSafety($bln_safety,$thn_safety);
  }
  $data_table = dataSafety($bln_safety,$thn_safety);
?>
<script type="text/javascript">
    function get_action(form) {
        var tgl1 = document.getElementById("tgl_1").value;
        var tgl2 = document.getElementById("tgl_2").value;
        form.action = 'index.php?content=data/persediaan&tgl1_safety='+tgl1+'&tgl2_safety='+tgl2;
    }
</script>
<h1>Pengolahan Data Persediaan</h1>
<hr>
<div class="row">
  <div class="col-lg-8">
    <form method="post" name="data_safety" onsubmit="get_action(this);">
      <div class="form-group">
        <label class="col-sm-2 control-label">Safety Stok</label>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">Bulan:</label>
        <div class="col-sm-2">
          <select id="tgl_1">
              <option value="1">Januari</option>
              <option value="2">Februari</option>
              <option value="3">Maret</option>
              <option value="4">April</option>
              <option value="5">Mei</option>
              <option value="6">Juni</option>
              <option value="7">Juli</option>
              <option value="8">Agustus</option>
              <option value="9">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label">Tahun:</label>
        <div class="col-sm-2">
          <input type="number" id="tgl_2" min="1900" max="2099" step="1" value="2017" />
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <input type="submit" value="Update">
        </div>
      </div>
    </form>
  </div>
  <div class="col-lg-4">
    <a type="button" href="?content=tambah/persediaan" class="btn btn-warning">Tambah Persediaan </a>
    <a type="button" href="?content=proses/kurang_persediaan" class="btn btn-warning">Kurang Persediaan </a>
  </div>
</div>
<br>
<div class="row">
  <div class="col-lg-12">
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Material</th>
    <th>Sisa</th>
    <th>Safety Stock <?=$bulan_teks[$bln_safety].'-'.$thn_safety?></th>
    <th>Status</th>
  </tr>
</thead>
<tbody>
  <?php $i_table =1;?>
  <?php foreach ($data_table as $data) {?>
    <tr>
      <td><?=$i_table?></td>
      <td><?=$data['nama_material'];?></td>
      <td><?=$data['sisa'];?></td>
      <td><?=$data['jumlah'];?></td>
      <td><?=$data['status_tersedia'];?></td>
    </tr>
  <?php $i_table++;?>
  <?php } ?>
</tbody>
</table>
  </div>
</div>
