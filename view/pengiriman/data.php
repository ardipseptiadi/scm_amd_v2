<?php
  $data_table = getPengiriman();
?>
<h1>Pengolahan Data Pengiriman</h1>
<hr>
<!-- <div style="text-align: right;">
<a type="button" href="form/form_tambah_agen.php" class="btn btn-warning">Tambah Data Pengiriman </a>
</div>
<br> -->
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>No Pengiriman</th>
    <th>Tanggal Kirim</th>
    <th>No Pesanan</th>
    <th>No Polisi</th>
    <th>Produk</th>
    <th>Nama Karyawan</th>
    <th>Status</th>
    <th>Tindakan</th>
  </tr>
</thead>
<tbody>
  <?php $i_table =1;?>
  <?php foreach ($data_table as $data) {?>
    <tr>
      <td><?=$i_table?></td>
      <td><?=$data['no_pengiriman'];?></td>
      <td><?=$data['tgl_kirim'];?></td>
      <td><?=$data['no_pesanan'];?></td>
      <td><?=$data['no_polisi'];?></td>
      <td><?=$data['nama_produk'];?></td>
      <td><?=$data['nama_karyawan'];?></td>
      <td><?=$data['keterangan_kirim'];?></td>
      <td>
          <button class="btn btn-xs btn-primary aksiProsesKirim"  data-toggle="modal" data-target="#modalProsesKirim" data-id="<?=$data['id_kirim']?>">proses</button>
          <button class="btn btn-xs btn-danger">hapus</button>
      </td>
    </tr>
  <?php $i_table++;?>
  <?php } ?>
</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalProsesKirim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Proses Pengiriman</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <h4>List Tunggu :</h4>
            <div class="contentTunggu">
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <h4>List Kendaraan Tersedia :</h4>
            <div class="contentTersedia">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" disabled="true" class="btn btn-primary prosesKiriman">Proses</button>
      </div>
    </div>
  </div>
</div>
<?php ?>
<script>
$(document).ready(function(){
  $(".aksiProsesKirim").click(function(){
    var id_kirim = $(this).data('id');
    var htmlTunggu = "tunggu";
    var htmlTersedia = "tersedia";
    $.post("proses.php?action=get_list_tunggu",
      {
        id_kirim:id_kirim
      },
      function(data){
        console.log(data);
        htmlTunggu = data;
        $(".contentTunggu").html(htmlTunggu);
    });
    $.post("proses.php?action=get_list_tersedia",
      {
        id_kirim:id_kirim
      },
      function(data){
        console.log(data);
        htmlTersedia = data;
        $(".contentTersedia").html(htmlTersedia);
    });
  });
  $(".prosesKiriman").click(function(){
    var kd_produk = $('#pengadaan_produk option:selected').val();
    var url = "index.php?content=pengadaan/tambah&kd="+kd_produk;
      $( location ).attr("href", url);
  });

});
</script>
