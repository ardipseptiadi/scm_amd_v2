<?php
  $data_supplier = getAllSupplier();
?>
<h1>Pengolahan Data Supplier</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="index.php?content=tambah/supplier" class="btn btn-warning">Tambah Data Supplier </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Nama Supplier</th>
    <th>Alamat Supplier</th>
    <th>Kontak</th>
    <th>Email</th>
    <th>Status</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_supplier =1;?>
  <?php foreach ($data_supplier as $supplier) {?>
    <tr>
      <td><?=$i_supplier?></td>
      <td><?=$supplier['nama_supplier'];?></td>
      <td><?=$supplier['alamat_supplier'];?></td>
      <td><?=$supplier['kontak'];?></td>
      <td><?=$supplier['email'];?></td>
      <td><?=$supplier['status'];?></td>
      <td>
          <button class="btn btn-xs btn-default aksiUbah"
            data-toggle="modal"
            data-target="#modalUbahSupplier"
            data-id="<?=$supplier['id_supplier']?>"
            data-nama="<?=$supplier['nama_supplier']?>"
            data-alamat="<?=$supplier['alamat_supplier']?>"
            data-kontak="<?=$supplier['kontak']?>"
            data-email="<?=$supplier['email']?>"
            data-status="<?=$supplier['status']?>"
          >
            ubah
          </button>
      </td>
    </tr>
  <?php $i_supplier++;?>
  <?php } ?>
</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalUbahSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Supplier</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <input type="hidden" class="form-control" id="f_id" name="ubah_id" required/>
          <div class="form-group">
            <label class="control-label col-sm-4">Nama Supplier:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="f_nama" name="ubah_nama" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Alamat Supplier:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="f_alamat" name="ubah_alamat" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Kontak :</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="f_kontak" name="ubah_kontak" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Email :</label>
            <div class="col-sm-4">
              <input type="email" class="form-control" id="f_email" name="ubah_email" required/>
            </div>
          </div>
          <!-- <div class="form-group">
            <label class="control-label col-sm-4">Status Agen :</label>
            <div class="col-sm-4">
              <select class="form-control" id="f_status" name="ubah_status">
                <option>--Status--</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
              </select>
            </div>
          </div> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary ubahSupplier">Ubah</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $(".aksiUbah").click(function(){
    $("#f_id").val($(this).data('id'));
    $("#f_nama").val($(this).data('nama'));
    $("#f_alamat").val($(this).data('alamat'));
    $("#f_kontak").val($(this).data('kontak'));
    $("#f_email").val($(this).data('email'));
  });
  $(".ubahSupplier").click(function(){

    var id_supplier = $("#f_id").val();
    var nama = $("#f_nama").val();
    var alamat = $("#f_alamat").val();
    var kontak = $("#f_kontak").val();
    var email = $("#f_email").val();
    $.post("proses.php?action=ubah_supplier",
      {
        id_supplier: id_supplier,
        nama: nama,
        alamat: alamat,
        kontak: kontak,
        email: email
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
