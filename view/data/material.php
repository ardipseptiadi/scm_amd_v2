<?php
  $data_table = getAllMaterial();
?>
<h1>Pengolahan Data Material</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="index.php?content=tambah/material" class="btn btn-warning">Tambah Data Material </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Material</th>
    <th>Produk</th>
    <th>Harga</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i=1;?>
  <?php foreach ($data_table as $data) {?>
    <tr>
      <td><?=$i?></td>
      <td><?=$data['nama_material'];?></td>
      <td><?=$data['jenis'];?></td>
      <td><?=$data['harga'];?></td>
      <td>
          <button class="btn btn-xs btn-default aksiUbah"
            data-toggle="modal"
            data-target="#modalUbahMaterial"
            data-id="<?=$data['id_material']?>"
            data-nama="<?=$data['nama_material']?>"
            data-harga="<?=$data['harga']?>"
          >
            ubah
          </button>
      </td>
    </tr>
  <?php $i++;?>
  <?php } ?>
</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalUbahMaterial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Material</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <input type="hidden" class="form-control" id="f_id" name="ubah_id" required/>
          <div class="form-group">
            <label class="control-label col-sm-4">Nama Material:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="f_nama" name="ubah_nama" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Harga:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="f_harga" name="ubah_harga" required/>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary ubahMaterial">Ubah</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $(".aksiUbah").click(function(){
    $("#f_id").val($(this).data('id'));
    $("#f_nama").val($(this).data('nama'));
    $("#f_harga").val($(this).data('harga'));
  });
  $(".ubahMaterial").click(function(){

    var id_material = $("#f_id").val();
    var nama = $("#f_nama").val();
    var harga = $("#f_harga").val();
    $.post("proses.php?action=ubah_material",
      {
        id_material: id_material,
        nama: nama,
        harga: harga
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
