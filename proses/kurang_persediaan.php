<?php
if ($_POST['kurangi']){
  if($_POST['material'] && $_POST['kurangpersediaan']){
	   $id = $_POST['material'];
     $jml= $_POST['kurangpersediaan'];
     $res_tambah = kurangPersediaan($jml,$id);
     $jml = $jml * -1;
     $res_update = updateRiwayat($jml,$id);
     header( "Location: index.php?content=data/persediaan");die();
  }
}else{
 header( "Location: index.php");
}
?>
