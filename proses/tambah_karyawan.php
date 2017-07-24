<?php
if(isset($_POST)){
  $post = $_POST;
  $res = insertKaryawan($post);
  if($res){
    header("Location: index.php?content=data/karyawan");
  }
}else{
  header("Location: index.php");
}
 ?>
