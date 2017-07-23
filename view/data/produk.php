<?php
  $data_table = getAllProduk();
?>
<h1>Pengolahan Data Produk</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="index.php?content=tambah/produk" class="btn btn-warning">Tambah Data Produk </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Kode Produk</th>
    <th>Jenis</th>
    <th>Harga</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_table =1;?>
  <?php foreach ($data_table as $data) {?>
    <tr>
      <td><?=$i_table?></td>
      <td><?=$data['kode_produk'];?></td>
      <td><?=$data['jenis'];?></td>
      <td><?=$data['harga'];?></td>
      <td>
          <button class="btn btn-xs btn-default aksiUbah" data-toggle="modal" data-target="#modalUbahProduk" data-id="<?=$data['kode_produk']?>" data-nama="<?=$data['jenis']?>" data-harga="<?=$data['harga']?>">ubah</button>
      </td>
    </tr>
  <?php $i_table++;?>
  <?php } ?>
</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalUbahProduk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Produk</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-sm-4">Kode Produk:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" readonly="true" id="f_kode" name="ubah_kode" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Nama Produk:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="f_nama" name="ubah_nama" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Harga Produk:</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="f_harga" name="ubah_harga" required min="1" max="9999999"/>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary ubahProduk">Ubah</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $(".aksiUbah").click(function(){
    $("#f_kode").val($(this).data('id'));
    $("#f_nama").val($(this).data('nama'));
    $("#f_harga").val($(this).data('harga'));
  });
  $(".ubahProduk").click(function(){

    var kd_produk = $("#f_kode").val();
    var nama_produk = $("#f_nama").val();
    var harga_produk = $("#f_harga").val();
    $.post("proses.php?action=ubah_produk",
      {
        kd_produk: kd_produk,
        nama_produk: nama_produk,
        harga_produk: harga_produk
      },
      function(data){
        console.log(data);
        var response = JSON.parse(data);
        if(response.success){
          alert("Ubah Data Berhasil");
          location.reload();
        }else{
          alert("Ubah Data Gagal");
        }
      });
  });

});
</script>
