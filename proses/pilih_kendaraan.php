<?php
$nopol = $_GET['nopol'];
$id_kirim = $_GET['id'];
$res = simpanProsesKirim($id_kirim,$nopol);
if($res){
  $res2 = updateStatusPengiriman(2,null,$id_kirim);
  if($res2){
    $res3 = updateNoPolisiPengiriman($nopol,$id_kirim);
    if($res3){
      header("Location: index.php?content=pengiriman/data");
    }else{
      echo "res3",var_dump($res3);
    }
  }else{
    echo "res3",var_dump($res3);
  }
}else{
  echo "res3",var_dump($res3);
}
 ?>
