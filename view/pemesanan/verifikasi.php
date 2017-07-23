<?php
  $data_table = getAllPesanan();
  $list_produk = getAllProduk()
 ?>
<h1>Verifikasi Data Pemesanan</h1>
<hr>
<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>No</th>
    <th>No Pesanan</th>
    <th>Tgl Pesanan</th>
    <th>Produk dipesan</th>
    <th>Verifikasi</th>
    <th></th>
  </tr>
  </thead>
  <tbody>
    <?php $i=1;?>
    <?php foreach($data_table as $data){?>
      <tr>
        <td><?=$i?></td>
        <td><?=$data['no_pesanan']?></td>
        <td><?=$data['tgl_pesan']?></td>
        <td><?=$data['nama_produk']?></td>
        <td><?=$data['is_verifikasi']=='1'?'<p class="label label-success">Sudah Diverifikasi</p>':'<p class="label label-default">Belum Diverifikasi</p>'?></td>
        <td>
          <button data-id="<?=$data['id_pesanan']?>" name="verifikasi[<?=$data['id_pesanan']?>]" class="btn btn-xs btn-primary aksiVerifikasi" <?=$data['is_verifikasi']=='1'?'disabled':''?> ><b>verifikasi</b></button>
          <button data-id="<?=$data['id_pesanan']?>" name="verifikasi[<?=$data['id_pesanan']?>]" class="btn btn-xs btn-danger batalVerifikasi" <?=$data['is_verifikasi']=='0'?'disabled':''?> ><b>batal</b></button>
        </td>
      </tr>
      <?php $i++;?>
    <?php }?>
  </tbody>
</table>

<script>
$(document).ready(function(){

  $(".aksiVerifikasi").click(function(){
    var id_pesanan = $(this).data('id');
    $.post("proses.php?action=verifikasi_pesanan",
      {
        id_pesanan: id_pesanan,
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
    console.log(id_pesanan);
  });

  $(".batalVerifikasi").click(function(){
    var id_pesanan = $(this).data('id');
    $.post("proses.php?action=verifikasi_pesanan",
      {
        id_pesanan: id_pesanan,
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
    console.log(id_pesanan);
  });

});
</script>
