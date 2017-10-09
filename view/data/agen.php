<?php
  $data_agen = getAllAgen();
?>
<h1>Pengolahan Data Agen</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="?content=tambah/agen" class="btn btn-warning">Tambah Data Agen </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>Nama Agen</th>
    <th>Alamat Agen</th>
    <th>Kontak</th>
    <th>Email</th>
    <th>Status</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_agen =1;?>
  <?php foreach ($data_agen as $agen) {?>
    <tr>
      <td><?=$i_agen?></td>
      <td><?=$agen['nama_agen'];?></td>
      <td><?=$agen['alamat_agen'];?></td>
      <td><?=$agen['kontak'];?></td>
      <td><?=$agen['email'];?></td>
      <td><?=$agen['status'];?></td>
      <td>
          <button class="btn btn-xs btn-default aksiUbah"
            data-toggle="modal"
            data-target="#modalUbahAgen"
            data-id="<?=$agen['id_agen']?>"
            data-nama="<?=$agen['nama_agen']?>"
            data-alamat="<?=$agen['alamat_agen']?>"
            data-kontak="<?=$agen['kontak']?>"
            data-email="<?=$agen['email']?>"
            data-status="<?=$agen['status']?>"
          >
            ubah
          </button>
      </td>
    </tr>
  <?php $i_agen++;?>
  <?php } ?>
</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalUbahAgen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Agen</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <input type="hidden" class="form-control" id="f_id" name="ubah_id" required/>
          <div class="form-group">
            <label class="control-label col-sm-4">Nama Agen:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="f_nama" name="ubah_nama" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Alamat Agen :</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="f_alamat" name="ubah_alamat" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Kontak Agen :</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="f_kontak" name="ubah_kontak" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Email Agen :</label>
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
        <button type="button" class="btn btn-primary ubahAgen">Ubah</button>
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
  $(".ubahAgen").click(function(){

    var id_agen = $("#f_id").val();
    var nama = $("#f_nama").val();
    var alamat = $("#f_alamat").val();
    var kontak = $("#f_kontak").val();
    var email = $("#f_email").val();
    $.post("proses.php?action=ubah_agen",
      {
        id_agen: id_agen,
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
