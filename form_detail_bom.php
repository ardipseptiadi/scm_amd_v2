<?php
session_start();
if ($_SESSION['statuslogin']){
	$con = mysqli_connect("localhost", "root", "","dbamidis");
	$nip=$_SESSION['nip']; 
	$query="select jabatan from t_karyawan where nip='$nip'";
	if ($result=mysqli_query($con,$query))
	  {
	  // Fetch one and one row
	  while ($row=mysqli_fetch_row($result))
		{
		$jabatanlogin = $row[0];
		}
	  // Free result set
	  mysqli_free_result($result);
	}
	
	mysqli_close($con);
}else{
	header("location: http://localhost/amidis/login/login.php");
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AMIDIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 621px;}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
	
	    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>
<?php
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());
$id= $_GET['id'];
$hasil = mysql_query("SELECT t_pemesanan.kode_pesan, t_produk.jenis, t_produk.harga, t_detail_pemesanan.jumlah, t_detail_pemesanan.sub_total
FROM t_detail_pemesanan
join t_pemesanan on t_detail_pemesanan.kode_pesan=t_pemesanan.kode_pesan 
join t_produk on t_detail_pemesanan.kode_produk=t_produk.kode_produk where t_detail_pemesanan.kode_pesan = '$id'") or die (mysql_error());

$hasil2 = mysql_query(" SELECT kode_pesan, tgl_pesan, status FROM t_pemesanan where kode_pesan='$id'");
$baris=mysql_fetch_row($hasil2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AMIDIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 621px;}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  
      
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>
<?php
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("dbamidis") or die (mysql_error());
$id= $_GET['id'];
$hasil = mysql_query("SELECT t_detail_bom.id_detail_bom, t_produk.jenis, t_detail_bom.kebutuhan, t_peramalan.hasil, t_detail_bom.total_kebutuhan FROM t_detail_bom
                      JOIN t_bom ON t_detail_bom.`id_bom`= t_bom.`id_bom` JOIN t_peramalan ON t_bom.`id_peramalan`= t_peramalan.`id_peramalan` JOIN t_produk ON t_peramalan.`kode_produk`= t_produk.`kode_produk`");
$baris=mysql_fetch_row($hasil2);

?>

<div class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a href="front/indexppic.php"><img src="logo.png" class="img-responsive" alt="Responsive image" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="dataperamalan.php">Data Peramalan</a></li>
      <li><a href="databom.php">Data Bill Of Material</a></li>
      <li><a href="login/login.php">Logout</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><h3 class="text-muted">PT. AMIDIS TIRTA MULIA</h3></li>
      </ul>
    </div>
  </div>
</div>

  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-1 sidenav">
      
    </div>
    <div class="col-sm-10 text-left"> 
      <h1>Pengolahan Data Bill Of Material</h1>
      <hr>
    <div style="text-align: right;">
    <h3 align="center">Data Bill Of Material</h3>
    <br><br>
    <table style="border-spacing:10px;">
      <thead>
      <tr align="left">
        <td>Jenis Produk</td> 
        <td>&nbsp;:&nbsp;<?php echo $baris[0]; ?></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr  align="left">
        <td>Bulan Dan Tahun</td> 
        <td>&nbsp;:&nbsp;<?php echo $baris[1]; ?></td>
      </tr>
     </thead>
    </table>     
  </div> <br>
    <table class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Jenis Produk</th>
        <th>Kebutuhan</th>
        <th>Hasil Peramalan</th>
        <th>Total Kebutuhan</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
     $i=1;
      while($row = mysql_fetch_array($hasil)){ ?>
      <tr>      
        <td><?php echo $i; ?></td>
        <td><?php echo $row['jenus']; ?></td>
        <td><?php echo $row['kebutuhan']; ?></td>
        <td><?php echo $row['hasil']; ?></td>
        <td><?php echo $row['total_kebutuhan']; ?></td>
        
        
      </tr>
    <?php $i++;}  ?>
    </tbody>
  </table>
  <a type="button" href="databom.php" class="btn btn-default">Kembali </a>  
   </div>
    <div class="col-sm-1 sidenav">
      
   </div>
 </div>
</div>

<footer class="container-fluid text-center">
  
</footer>

</body>
</html>