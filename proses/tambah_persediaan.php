<?php
if ($_POST['tambahkan']){
  if($_POST['material'] && $_POST['tambahpersediaan']){
	   $id = $_POST['material'];
     $jml= $_POST['tambahpersediaan'];
     $res_tambah = tambahPersediaan($jml,$id);
     $res_update = updateRiwayat($jml,$id);
     header( "Location: index.php?content=data/persediaan");die();
  }
}else{
 header( "Location: index.php");
}
?>
