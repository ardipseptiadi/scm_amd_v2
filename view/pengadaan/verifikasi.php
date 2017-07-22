<?php
  $data_table = getAllPengadaan();
  $list_produk = getAllProduk()
 ?>
<h1>Pengolahan Data Pengadaan</h1>
<hr>
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
        <td><?=$data['is_verifikasi']=='1'?'<p class="label label-success">Sudah Diverifikasi</p>':'<p class="label label-default">Belum Diverifikasi</p>'?></td>
        <td>
          <button data-id="<?=$data['id_pengadaan']?>" name="verifikasi[<?=$data['id_pengadaan']?>]" class="btn btn-xs btn-primary aksiVerifikasi" <?=$data['is_verifikasi']=='1'?'disabled':''?> ><b>verifikasi</b></button>
          <button data-id="<?=$data['id_pengadaan']?>" name="verifikasi[<?=$data['id_pengadaan']?>]" class="btn btn-xs btn-danger batalVerifikasi" <?=$data['is_verifikasi']=='0'?'disabled':''?> ><b>batal</b></button>
        </td>
      </tr>
      <?php $i++;?>
    <?php }?>
  </tbody>
</table>

<script>
$(document).ready(function(){

  $(".aksiVerifikasi").click(function(){
    var id_pengadaan = $(this).data('id');
    $.post("proses.php?action=verifikasi_pengadaan",
      {
        id_pengadaan: id_pengadaan,
        verifikasi: 'verify'
      },
      function(data){
        console.log(data);
        var response = JSON.parse(data);
        if(response.success){
          alert("Verifikasi Berhasil");
          location.reload();
        }else{
          alert("Verifikasi Gagal");
        }
      });
    console.log(id_pengadaan);
  });

  $(".batalVerifikasi").click(function(){
    var id_pengadaan = $(this).data('id');
    $.post("proses.php?action=verifikasi_pengadaan",
      {
        id_pengadaan: id_pengadaan,
        verifikasi: 'cancel'
      },
      function(data){
        console.log(data);
        var response = JSON.parse(data);
        if(response.success){
          alert("Pembatalan Berhasil");
          location.reload();
        }else{
          alert("Pembatalan Gagal");
        }
      });
    console.log(id_pengadaan);
  });

});
</script>
