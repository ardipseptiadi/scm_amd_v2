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
$nopolisi=$_GET['nopolisi'];

?>
<div class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       <a href="../front/indexgudang.php"><img src="../logo.png" class="img-responsive" alt="Responsive image" ></a>
    </div>
     <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> GBK <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../datapersediaan.php">Data Persediaan</a></li>
      
          </ul>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> GBJ <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../datapengiriman.php">Data Pengiriman</a></li>
      
    </ul>
    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Monitoring <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../monitoringpemesanan.php">Data Pemesanan</a></li>
      <li role="separator" class="divider"></li>
      <li><a href="../monitoringpengadaan.php">Data Pengadaan</a></li>
      <li role="separator" class="divider"></li>
      <li><a href="../monitoringkendaraan.php">Data Kendaraan</a></li>
      
      
      
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
      <h1>Pengolahan Data Kendaraan</h1>
      <hr>
	  <center><h3> Form Ubah Status Data Kendaraan</h3></center><br />
	  <form class="form-horizontal" name="ubahstatuskendaraan" method="post" action="../proses/proses_ubah_status_kendaraan.php">
	  <div class="form-group">
    <label for="input_nopolisi" class="col-sm-2 control-label">No Polisi</label>
    <div class="col-sm-4">
      <input type="text" name="nopolisi" class="form-control" id="input_nopolisi" placeholder="Masukan No Polisi" required value="<?php echo $nopolisi  ?>">
	  <input type="hidden" name="idnopolisi" class="form-control" id="input_nopolisi" placeholder="Masukan No Polisi" required value="<?php echo $nopolisi  ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="input_statuskendaraan" class="col-sm-2 control-label">Status Kendaraan</label>
    <div class="col-sm-4">
      <select class="form-control" name="statuskendaraan" required>
	  	<option>Pilih</option>
  		<option>Tersedia</option>
  		<option>Tidak Tersedia</option>
	</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <input type="submit" name="ubah" class="btn btn-default" value="Ubah">
    </div>
	<div class=" col-sm-3">
      <a href="../monitoringkendaraan.php" class="btn btn-default" required>Batal</a>
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
document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("field tidak boleh kosong !");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})
</script>

</body>
</html>
