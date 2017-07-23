<?php
$alpha = array(0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9);
$numForecasts = 1;

function fetchMenu()
{
  // include('query.php');
}

function periodeBulan($date1,$date2)
{
  //format YYYY-MM
  $date1 = explode('-',$date1);
  $bln1 = $date1[0];
  $thn1 = $date1[1];
  $date2 = explode('-',$date2);
  $bln2 = $date2[0];
  $thn2 = $date2[1];
  $hasil = [];

  if($thn1 < $thn2){
    $jmlbln = 12 - $bln1 + 1 + $bln2;
    for($i=$bln1;$i<=12;$i++){
      $hasil[] = $thn1.'-'.$i;
    }
    for($i=1;$i<=$bln2;$i++){
      $hasil[] = $thn2.'-'.$i;
    }
  }elseif($thn1 == $thn2){
    $jmlbln = $bln2 - $bln1 + 1;
    for($i=$bln1;$i<=$bln2;$i++){
      $hasil[] = $thn1.'-'.$i;
    }
  }
  return $hasil;

}

function singleExpo($data, $alpha, $numForecasts)
{
  $y = array();
  $y[0] = 0;
  $y[1] = $data[0];
  $i = 2;
  for ($i=2;$i<count($data);$i++)
  {
    $y[$i] = $alpha * $data[$i-1] + (1 - $alpha) * $y[$i-1];
  }
  for ($j=0;$j<$numForecasts;$j++)
  {
    $y[$i] = $alpha * $data[count($data)-1] + (1-$alpha) * $y[$i-1];
    $i++;
  }

  return $y;
}

function sem_MSE($data,$alpha,$numForecasts)
{
  foreach($alpha as $key => $value)
  {

    for($k = 1;$k<count($data);$k++)
    {
      $temp = $data[$k] - singleExpo($data,$value,$numForecasts)[$k];
      $mse[$k] = pow($temp,2);
    }
    $ja["$value"] = singleExpo($data,$value,$numForecasts)[$k];
    $sum = array_sum($mse);
    $jt["$value"] = $sum / count($data);
  }
  $cari =array_keys($jt,min($jt));
  $hasil= $ja[$cari[0]];
  return $hasil;
}

function getPengadaanMaterial($kd_produk,$id_material,$date)
{
  $date_e = explode('-',$date);
  $safety = getMaterialSafety($id_material,$date_e[0],$date_e[1]);
  $peramalan = getPeramalanByProduk($kd_produk,$date);
  $a=!$peramalan['hasil']?0:$peramalan['hasil'];
  $b=!$safety['jumlah']?0:$safety['jumlah']/30;
  $c=!$safety['sisa']?0:$safety['sisa'];
  if($b==0 || $c ==0){
    $res = 0;
  }else{
    $res = ($a+$b-$c);
  }
  return $res;
}

function generateNoPengadaan($kode_produk)
{
  $lastPengadaan = getLastPengadaan($kode_produk);
  if(isset($lastPengadaan['no_pengadaan'])){
    $no_terakhir = $lastPengadaan['no_pengadaan'];
    $arrTemp = explode('/',$no_terakhir);
    $arrTemp[3] = $arrTemp[3]+1;
		$no_urut = str_pad($arrTemp[3],6,"0",STR_PAD_LEFT);
  }else{
    $no_urut = '000001';
  }
  return 'PGD/'.date('m').'/'.$kode_produk.'/'.$no_urut;
}

function generateNoPesanan()
{
  $lastPesanan = getLastPesanan();
  if($lastPesanan){
    $arrTemp = explode('/',$lastPesanan);
    if($arrTemp[1] == date('m') && $arrTemp[2] == date('Y')){
      $arrTemp[3] = $arrTemp[3]+1;
		  $no_urut = str_pad($arrTemp[3],6,"0",STR_PAD_LEFT);
    }else{
      $no_urut = '000001';
    }
  }else{
    $no_urut = '000001';
  }
  return 'PSN/'.date('m'.'/'.date('Y').'/'.$no_urut);
}
 ?>
