<?php
$data_tunggu = getListTunggu();
$responseHtml = '';
$responseHtml .= "<table class='table table table-bordered'>";
$responseHtml .= "<tr>";
foreach ($data_tunggu as $value) {
  $responseHtml.="<td>{$value['no_polisi']}</td>";
  $responseHtml.="<td>{$value['jenis_kendaraan']}</td>";
}
$responseHtml .= "</tr>";
$responseHtml .= "</table>";
echo $responseHtml;
 ?>
