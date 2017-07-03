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
        <li><a href="../login/logout.php">Logout</a></li>
        
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
      <h1>Pengolahan Data Karyawan</h1>
      <hr>
	  <center><h3> Form Tambah Data Karyawan</h3></center><br />
	  <p>Semua Kolom Wajib Diisi! </p>

	  <form class="form-horizontal" name="tambahkaryawan" method="post" action="../proses/proses_tambah_karyawan.php">
  <div class="form-group">
    <label for="input_nip" class="col-sm-2 control-label">Nip</label>
    <div class="col-sm-4">
      <input type="text" name="nip" class="form-control" id="input_nip" placeholder="Masukan Nip" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_nama" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-4">
      <input type="text" name="nama_karyawan" class="form-control" id="input_nama" placeholder="Masukan Nama" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_kontak" class="col-sm-2 control-label">Kontak</label>
    <div class="col-sm-4">
      <input type="text" name="kontak" class="form-control" id="input_kontak" placeholder="Masukan Nomor HP" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_jabatan" class="col-sm-2 control-label">Jabatan</label>
    <?php
    $listjabatan=array();
    mysql_connect("localhost","root","") or die (mysql_error());
    mysql_select_db("dbamidis") or die (mysql_error());

    $hasil = mysql_query("SELECT id_karyawan,jabatan FROM t_karyawan ") or die (mysql_error());
    while($row=mysql_fetch_array($hasil,MYSQL_ASSOC)){
    $listkaryawan[]=$row;
    }
    mysql_free_result($hasil);
  ?>

  <div class="col-sm-4">
       <select class="form-control" name="jabatan" required>
      <option>Pilih</option>
    <?php
    foreach($listkaryawan as $karyawan){
    echo "<option value='".$karyawan['id_karyawan']."'>".$karyawan['jabatan']."</option>";
    }
    ?>

  </select>
    </div>
  </div>
  <div class="form-group">
    <label for="input_email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-4">
      <input type="text" name="email" class="form-control" id="input_email" placeholder="Masukan Email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="input_statuskaryawan" class="col-sm-2 control-label">Status Karyawan</label>
    <div class="col-sm-4">
      <select class="form-control" name="status" required>
	  	<option>Pilih</option>
  		<option>Aktif</option>
  		<option>Tidak Aktif</option>
	</select>
    </div>
  </div>
  <div class="form-group">
    <label for="input_kontak" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-4">
      <input type="text" name="password" class="form-control" id="input_password" placeholder="Masukan Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <input type="submit" name="tambahkan" class="btn btn-default" value="Tambahkan" required>
    </div>
	<div class=" col-sm-3">
      <a href="../datakaryawan.php" class="btn btn-default">Batal</a>
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
