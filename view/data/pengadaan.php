<?php
  $data_table = getAllPengadaan();
  $list_produk = getAllProduk()
 ?>
<h1>Pengolahan Data Pengadaan</h1>
<hr>
<div style="text-align: right;">
  <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#modalTambahPengadaan">Tambah Data Pengadaan </button>
</div>
<br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>No Pengadaan</th>
    <th>Tgl pengadaan</th>
    <th>Nama Produk</th>
    <th>Verifikasi</th>
    <th></th>
  </tr>
  </thead>
  <tbody>
    <?php $i=1;?>
    <?php foreach($data_table as $data){?>
      <tr>
        <td><?=$i?></td>
        <td><?=$data['no_pengadaan']?></td>
        <td><?=$data['tgl_pengadaan']?></td>
        <td><?=$data['jenis']?></td>
        <td><?=$data['is_verifikasi']=='1'?'Sudah Diverifikasi':'Belum Diverifikasi'?></td>
        <td><a href="index.php?content=pengadaan/detail&id=<?=$data['id_pengadaan']?>" class="btn btn-xs btn-primary">detail</a></td>
      </tr>
      <?php $i++;?>
    <?php }?>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalTambahPengadaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pilih Produk</h4>
      </div>
      <div class="modal-body">
        <form class="form-inline">
          <div class="form-group">
            <label class="control-label">Produk Dipilih :</label>
            <select id="pengadaan_produk" class="form-control">
              <?php foreach($list_produk as $produk){?>
              <option value="<?=$produk['kode_produk']?>"><?=$produk['jenis']?></option>
              <?php }?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary tambahPengadaan">Tambah</button>
      </div>
    </div>
  </div>
</div>
<?php ?>
<script>
$(document).ready(function(){

  $(".tambahPengadaan").click(function(){
    var kd_produk = $('#pengadaan_produk option:selected').val();
    var url = "index.php?content=pengadaan/tambah&kd="+kd_produk;
      $( location ).attr("href", url);
  });

});
</script>
