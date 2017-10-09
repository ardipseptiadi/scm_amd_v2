<?php
  $data_kendaraan = getAllKendaraan();
?>
<h1>Pengolahan Data Kendaraan</h1>
<hr>
<div style="text-align: right;">
<a type="button" href="index.php?content=tambah/kendaraan" class="btn btn-warning">Tambah Data Kendaraan </a>
</div> <br>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>No Polisi</th>
    <th>Jenis Kendaraan</th>
    <th>Kendaraan</th>
    <th>Kapasitas</th>
    <th>Status</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_kendaraan =1;?>
  <?php foreach ($data_kendaraan as $kendaraan) {?>
    <tr>
      <td><?=$i_kendaraan?></td>
      <td><?=$kendaraan['no_polisi'];?></td>
      <td><?=$kendaraan['jenis_kendaraan'];?></td>
      <td><?=$kendaraan['kendaraan'];?></td>
      <td><?=$kendaraan['kapasitas'];?></td>
      <td><?=$kendaraan['status'];?></td>
      <td>
          <button class="btn btn-xs btn-default aksiUbah"
            data-toggle="modal"
            data-target="#modalUbahKendaraan"
            data-id="<?=$kendaraan['no_polisi']?>"
            data-jenis="<?=$kendaraan['jenis_kendaraan']?>"
            data-kendaraan="<?=$kendaraan['kendaraan']?>"
            data-kapasitas="<?=$kendaraan['kapasitas']?>"
            data-status="<?=$kendaraan['status']?>"
          >
            ubah
          </button>
      </td>
    </tr>
  <?php $i_kendaraan++;?>
  <?php } ?>
</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalUbahKendaraan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Kendaraan</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <input type="hidden" class="form-control" id="f_id" name="ubah_id" required/>
          <div class="form-group">
            <label class="control-label col-sm-4">Kendaraan:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="f_kendaraan" name="ubah_kendaraan" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Jenis :</label>
            <div class="col-sm-4">
              <select class="form-control" id="f_jenis" name="ubah_jenis">
                <option>--Jenis--</option>
                <option value="Engkel">Engkel</option>
                <option value="Fuso">Fuso</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Kapasitas :</label>
            <div class="col-sm-4">
              <input type="email" class="form-control" id="f_kapasitas" name="ubah_kapasitas" required/>
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
        <button type="button" class="btn btn-primary ubahKendaraan">Ubah</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $(".aksiUbah").click(function(){
    $("#f_id").val($(this).data('id'));
    $("#f_kendaraan").val($(this).data('kendaraan'));
    $("#f_jenis").val($(this).data('jenis'));
    $("#f_kapasitas").val($(this).data('kapasitas'));
  });
  $(".ubahKendaraan").click(function(){

    var nopol = $("#f_id").val();
    var kendaraan = $("#f_kendaraan").val();
    var jenis = $("#f_jenis").val();
    var kapasitas = $("#f_kapasitas").val();
    $.post("proses.php?action=ubah_kendaraan",
      {
        nopol: nopol,
        kendaraan: kendaraan,
        jenis: jenis,
        kapasitas: kapasitas
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
