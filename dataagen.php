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

$hasil = mysql_query("SELECT id_agen,nama_agen, alamat_agen, kontak, email, status FROM t_agen") or die (mysql_error());

?>

<div class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       <a href="front/indexadmin.php"><img src="logo.png" class="img-responsive" alt="Responsive image" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Master <span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href="datakaryawan.php">Data Karyawan</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="datakendaraan.php">Data Kendaraan</a></li>
			<li role="separator" class="divider"></li>
            <li><a href="dataagen.php">Data Agen</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="datasupplier.php">Data Supplier</a></li>
			<li role="separator" class="divider"></li>
            <li><a href="dataproduk.php">Data Produk</a></li>
			
          </ul>
        </li>
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
      <h1>Pengolahan Data Agen</h1>
      <hr>
	  <div style="text-align: right;">
		<a type="button" href="form/form_tambah_agen.php" class="btn btn-warning">Tambah Data Agen </a>  
	</div> <br>
	  <table class="table table-bordered table-striped">
	  	<thead>
			<tr>
				<th>No</th>
				<th>Nama Agen</th>
				<th>Alamat Agen</th>
				<th>Kontak</th>
				<th>Email</th>
				<th>Status</th>
				<th>Tindakan</th>
			</tr>
		</thead>
		<tbody>
			<?php
		 $i=1;
			while($row = mysql_fetch_array($hasil)){ ?>
			<tr> 			
				<td><?php echo $i; ?></td>
				<td><?php echo $row['nama_agen']; ?></td>
				<td><?php echo $row['alamat_agen']; ?></td>
				<td><?php echo $row['kontak']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><a href="<?php echo "form/form_ubah_status_agen.php?&nama_agen=".$row['nama_agen']."&status=".$row['status']; ?>"><?php echo $row['status']; ?></a></td>
			
				<td><a href="<?php echo "form/form_ubah_agen.php?&nama_agen=".$row['nama_agen']."&alamat_agen=".$row['alamat_agen']."&kontak=".$row['kontak']."&email=".$row['email']; ?>">UBAH</a> </td>
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
