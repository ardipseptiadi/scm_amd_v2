<?php
if(isset($_POST)){
  $post = $_POST;
  $res = insertAgen($post);
  if($res){
    header("Location: index.php?content=data/agen");
  }
}else{
  header("Location: index.php");
}
 ?>
