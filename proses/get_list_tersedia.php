<?php
$id_kirim = $_POST['id_kirim'];
$data_tersedia = getListTersedia();
$responseHtml = '';
$responseHtml .= "<table class='table table table-bordered'>";
foreach ($data_tersedia as $value) {
  $nopol = $value['no_polisi'];
  $responseHtml .= "<tr>";
  $responseHtml.="<td>{$value['no_polisi']}</td>";
  $responseHtml.="<td>{$value['jenis_kendaraan']}</td>";
  $responseHtml.="<td>{$value['kapasitas']}</td>";
  $responseHtml.="<td><a class='btn btn-sm btn-primary' href='proses.php?action=pilih_kendaraan&nopol={$nopol}&id={$id_kirim}'>pilih</a></td>";
  $responseHtml .= "</tr>";
}
$responseHtml .= "</table>";
echo $responseHtml;
 ?>
