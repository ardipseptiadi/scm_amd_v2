<?php
  mysql_connect("localhost","root","") or die (mysql_error());
  mysql_select_db("dbamidis") or die (mysql_error());
  $lt = 3;
  $sql = mysql_query("select * from t_material where bulan = 'januari'"); 

  while($data = mysql_fetch_array($sql)){
    echo "Data pemakasian bahan baku bulan sebelumnya", $data['pengeluaran'];
    echo "<br>";
$s= $data['nama_material'];
    $st = $data['pengeluaran']*$lt;
    $st2 = $st/30;


    echo "Batas Aman di gudang adalah ", $st2;
echo "<br>";
mysql_query("update t_material set safety_stock='$st2' where nama_material='$s'");

  }
?>
