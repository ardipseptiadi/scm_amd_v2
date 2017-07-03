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
	header("location: /login/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AMIDIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="datepicker/css/bootstrap-datepicker3.css">
  <script src="jquery/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="datepicker/js/bootstrap-datepicker.min.js"></script>
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

$hasil = mysql_query("select * from t_peramalan") or die (mysql_error());

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
      <h1>Pengolahan Data Peramalan</h1>
      <hr>
	  <div style="text-align: right;">
		<a type="button" href="form/form_tambah_peramalan.php" class="btn btn-warning">Tambah Data Peramalan </a>
	</div> <br>
	  <table class="table table-bordered table-striped">
	  	<thead>
			<tr>
				<th>No</th>
				<th>Bulan Peramalan</th>
				<th>Jenis Produk</th>
				<th>Jumlah Peramalan</th>

			</tr>
		</thead>
		<tbody>
			<?php
		 $i=1;
			while($row = mysql_fetch_array($hasil)){ ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['peramalan']; ?></td>
				<td><?php echo $row['kode_produk']; ?></td>
				<td><?php echo $row['hasil']; ?></td>
			</tr>
		<?php $i++;}  ?>
		</tbody>
	</table>
   </div>
    <div class="col-sm-1 sidenav">

   </div>
 </div>
</div>

<footer class="container-fluid text-center">

</footer>

</body>
</html>
