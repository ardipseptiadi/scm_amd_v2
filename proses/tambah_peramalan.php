<?php
$blnramal = empty($_POST['bulanramal'])?'01-1970':$_POST['bulanramal'];
$blndata = empty($_POST['bulandata'])?'12-1969':$_POST['bulandata'];
$kodeproduk = empty($_POST['kodeproduk'])?'test':$_POST['kodeproduk'];

$bulanramal = '01-'.$blnramal;
$daten = new DateTime($bulanramal);
$daten->modify('-1 months');
$date_end = $daten->format('m-Y');

$data_pesanan=[];
$listbulan = periodeBulan($blndata,$date_end);
foreach ($listbulan as $value) {
  $get_data = getDataPesananBulan($value,$kodeproduk);
  if($get_data){
    $data_pesanan[] = $get_data;
  }else{
    $data_pesanan[] = 0;
  }
}
if(!empty($data_pesanan)){
  $peramalan = sem_MSE($data_pesanan,$alpha,$numForecasts);
  $res = insertPeramalan($blnramal,$peramalan,$kodeproduk);
  if($res){
    header('Location: index.php?content=data/peramalan');
  }
}
 ?>
