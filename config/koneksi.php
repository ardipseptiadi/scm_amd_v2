<?php
function open_conn()
{
  error_reporting(0);
  require(dirname(__FILE__).'/database.php');
  // Create connection
  $conn = mysqli_connect($config_db['host'],$config_db['user'],$config_db['pass'],$config_db['db']);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }else{
      return $conn;
  }
}

function free_close_db($result,$conn)
{
    // Free result set
    mysqli_free_result($result);
    mysqli_close($conn);
}
 ?>
