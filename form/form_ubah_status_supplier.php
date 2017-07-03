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
$namasupplier=$_GET['nama_supplier'];

?>
<div class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       <a href="../front/indexadmin.php"><img src="../logo.png" class="img-responsive" alt="Responsive image" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Master <span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href="../datakaryawan.php">Data Karyawan</a></li>
      <li role="separator" class="divider"></li>
      <li><a href="../datakendaraan.php">Data Kendaraan</a></li>
      <li role="separator" class="divider"></li>
            <li><a href="../dataagen.php">Data Agen</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../datasupplier.php">Data Supplier</a></li>
      <li role="separator" class="divider"></li>
            <li><a href="../dataproduk.php">Data Produk</a></li>
          </ul>
        </li>
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
      <h1>Pengolahan Data supplier</h1>
      <hr>
	  <center><h3> Form Ubah Status Data supplier</h3></center><br />
	  <form class="form-horizontal" name="ubahstatussupplier" method="post" action="../proses/proses_ubah_status_supplier.php">
	  <div class="form-group">
    <label for="input_namasupplier" class="col-sm-2 control-label">Nama Supplier</label>
    <div class="col-sm-4">
      <input type="text" name="namasupplier" class="form-control" id="input_namasupplier" placeholder="Masukan Nama" value="<?php echo $namasupplier  ?>">
	  <input type="hidden" name="idnamasupplier" class="form-control" id="input_namasupplier" placeholder="Masukan Nama" value="<?php echo $namasupplier  ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="input_statussupplier" class="col-sm-2 control-label">Status Supplier</label>
    <div class="col-sm-4">
      <select class="form-control" name="statussupplier">
	  	<option>Pilih</option>
  		<option>Aktif</option>
  		<option>Tidak Aktif</option>
	</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <input type="submit" name="ubah" class="btn btn-default" value="Ubah">
    </div>
	<div class=" col-sm-3">
      <a href="../datasupplier.php" class="btn btn-default">Batal</a>
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

</body>
</html>
