<?php
  $data_karyawan = getAllKaryawan();
?>
<h1>Pengolahan Data Karyawan</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="index.php?content=tambah/karyawan" class="btn btn-warning">Tambah Data Karyawan </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>NIP</th>
    <th>Nama Karyawan</th>
    <th>Kontak</th>
    <th>Jabatan</th>
    <th>Email</th>
    <th>Status</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_karyawan =1;?>
  <?php foreach ($data_karyawan as $karyawan) {?>
    <tr>
      <td><?=$i_karyawan?></td>
      <td><?=$karyawan['nip'];?></td>
      <td><?=$karyawan['nama_karyawan'];?></td>
      <td><?=$karyawan['kontak'];?></td>
      <td><?=$karyawan['jabatan'];?></td>
      <td><?=$karyawan['email'];?></td>
      <td><?=$karyawan['status'];?></td>
      <td>
          <button class="btn btn-xs btn-default aksiUbah"
            data-toggle="modal"
            data-target="#modalUbahKaryawan"
            data-id="<?=$karyawan['id_karyawan']?>"
            data-nip="<?=$karyawan['nip']?>"
            data-nama="<?=$karyawan['nama_karyawan']?>"
            data-kontak="<?=$karyawan['kontak']?>"
            data-email="<?=$karyawan['email']?>"
            data-status="<?=$karyawan['status']?>"
          >
            ubah
          </button>
      </td>
    </tr>
  <?php $i_karyawan++;?>
  <?php } ?>
</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalUbahKaryawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Karyawan</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <input type="hidden" class="form-control" id="f_id" name="ubah_id" required/>
          <div class="form-group">
            <label class="control-label col-sm-4">Nama Karyawan:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="f_nama" name="ubah_nama" required/>
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
        <button type="button" class="btn btn-primary ubahKaryawan">Ubah</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $(".aksiUbah").click(function(){
    $("#f_id").val($(this).data('id'));
    $("#f_nama").val($(this).data('nama'));
    $("#f_kontak").val($(this).data('kontak'));
    $("#f_email").val($(this).data('email'));
  });
  $(".ubahKaryawan").click(function(){

    var id_karyawan = $("#f_id").val();
    var nama = $("#f_nama").val();
    var kontak = $("#f_kontak").val();
    var email = $("#f_email").val();
    $.post("proses.php?action=ubah_karyawan",
      {
        id_karyawan: id_karyawan,
        nama: nama,
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
