<?php

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
//$data = [37100,28400,34200,25000,38500,35400];
$alpha = array(0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9);
$numForecasts = 1;
//echo sem_MSE($data,$alpha,$numForecasts);
