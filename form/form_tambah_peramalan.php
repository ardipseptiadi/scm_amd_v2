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
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../jquery/jquery-3.1.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
	<!-- datepicker -->
  <script src="../datepicker/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="../datepicker/css/bootstrap-datepicker3.css">
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
<div class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a href="../front/indexppic.php"><img src="../logo.png" class="img-responsive" alt="Responsive image" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	  	<li><a href="../dataperamalan.php">Data Peramalan</a></li>
	  	<li><a href="../login/login.php">Logout</a></li>
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
	  <center><h3> Form Tambah Data Peramalan</h3></center><br />
	  <p>Semua kolom wajib diisi!</p>
	  <form class="form-horizontal" name="tambahperamalan" method="post" action="../proses/proses_tambah_peramalan.php">
			<div class="form-group">
		    <label for="bln" class="col-sm-2 control-label">Bulan Peramalan</label>
		    <div class="col-sm-4 input-group">
		      <input type="text" name="bulanramal" class="form-control input_tanggal" >
		    </div>
		  </div>
			<div class="form-group">
		    <label for="bln" class="col-sm-2 control-label">Data diambil dari bulan:</label>
		    <div class="col-sm-4 input-group">
		      <input type="text" name="bulandata" class="form-control input_tanggal" >
		    </div>
		  </div>
		  <div class="form-group">
			    <label for="input_jenis_produk" class="col-sm-2 control-label">Jenis Produk</label>
			    <?php
					$listproduk=array();
					mysql_connect("localhost","root","") or die (mysql_error());
					mysql_select_db("dbamidis") or die (mysql_error());

					$hasil = mysql_query("SELECT kode_produk, jenis FROM t_produk") or die (mysql_error());
					while($row=mysql_fetch_array($hasil,MYSQL_ASSOC)){
					$listproduk[]=$row;
					}
					mysql_free_result($hasil);
				?>
				<div class="col-sm-4">

				  <select class="form-control" name="kodeproduk" required>
				  	<option>Pilih</option>
					<?php
					foreach($listproduk as $produk){
					echo "<option value='".$produk['kode_produk']."'>".$produk['jenis']."</option>";
					}
					?>
				</select>
			    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-2">
		      <input type="submit" name="tambahkan" class="btn btn-default" value="Tambahkan">
		    </div>
				<div class=" col-sm-3">
		      <a href="../dataperamalan.php" class="btn btn-default">Batal</a>
		    </div>
		  </div>
		</form>



   </div>
    <div class="col-sm-1 sidenav">

   </div>
 </div>
</div>

<footer class="container-fluid text-center">

</footer>
<script type="text/javascript">
$(document).ready(function() {
	$('.input_tanggal').datepicker({
		format : "mm-yyyy",
    startView: 2,
    minViewMode: 1,
    autoclose: true
	});
	$('$tanggal').daterangepicker(
	{
	singleDatePicker: true,
	format : 'YYYY-MM-DD'
	}
	);
});
</script>
</body>
</html>
