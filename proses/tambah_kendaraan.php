<?php
if(isset($_POST)){
  $post = $_POST;
  $res = insertKendaraan($post);
  if($res){
    header("Location: index.php?content=data/kendaraan");
  }
}else{
  header("Location: index.php");
}
 ?>
