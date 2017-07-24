<?php
if(isset($_POST)){
  $post = $_POST;
  $res = insertSupplier($post);
  if($res){
    header("Location: index.php?content=data/supplier");
  }
}else{
  header("Location: index.php");
}
 ?>
