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
      <h1>Pengolahan Data Pengiriman</h1>
      <hr>
	  <center><h3> Form Tambah Data Pengiriman</h3></center><br />
	  <p>Semua kolom wajib diisi !</p>

	  <form class="form-horizontal" name="tambahpengiriman" method="post" action="../proses/proses_tambah_pengiriman.php">
  <div class="form-group">
    <label for="input_kodepesan" class="col-sm-2 control-label">Kode Pesan</label>
    <?php
		$listpesan=array();
		mysql_connect("localhost","root","") or die (mysql_error());
		mysql_select_db("dbamidis") or die (mysql_error());

		$hasil = mysql_query("select kode_pesan,id_detail_pemesanan from t_detail_pemesanan where kode_pesan in (SELECT kode_pesan FROM t_pemesanan where verifikasi='sudah')") or die (mysql_error());
		while($row=mysql_fetch_array($hasil,MYSQL_ASSOC)){
		$listpesan[]=$row;
		}
		mysql_free_result($hasil);
	?>

	<div class="col-sm-4">
       <select class="form-control" name="pesan" required>
	  	<option>Pilih</option>
		<?php
		foreach($listpesan as $pesan){
		echo "<option value='".$pesan['id_detail_pemesanan']."'>".$pesan['kode_pesan']."</option>";
		}
		?>

	</select>
    </div>
  </div>
  <div class="form-group">
    <label for="input_kendaraan" class="col-sm-2 control-label">Kendaraan</label>
    <?php
		$listkendaraan=array();
		mysql_connect("localhost","root","") or die (mysql_error());
		mysql_select_db("dbamidis") or die (mysql_error());

		$hasil = mysql_query("SELECT no_polisi, kendaraan FROM t_kendaraan where  status='tersedia'") or die (mysql_error());
		while($row=mysql_fetch_array($hasil,MYSQL_ASSOC)){
		$listkendaraan[]=$row;
		}
		mysql_free_result($hasil);
	?>

	<div class="col-sm-4">
       <select class="form-control" name="kendaraan" required>
	  	<option>Pilih</option>
		<?php
		foreach($listkendaraan as $kendaraan){
		echo "<option value='".$kendaraan['no_polisi']."'>".$kendaraan['kendaraan']."</option>";
		}
		?>

	</select>
    </div>
  </div>
   <div class="form-group">
    <label for="input_tgl" class="col-sm-2 control-label">Tgl Pengiriman</label>
    <div class="col-sm-4">
	<div class="input-group date">

  		<input type="text" class="form-control" name="tanggal" id="tanggal" value="<?php echo date('d-m-Y'); ?>" disabled="disabled"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
	</div>

    </div>
  </div>
  <div class="form-group">
    <label for="input_kendaraan" class="col-sm-2 control-label">Pengemudi</label>
    <?php
    $listpengemudi=array();
    mysql_connect("localhost","root","") or die (mysql_error());
    mysql_select_db("dbamidis") or die (mysql_error());

    $hasil = mysql_query("SELECT id_karyawan, nama_karyawan FROM t_karyawan where jabatan='supir'") or die (mysql_error());
    while($row=mysql_fetch_array($hasil,MYSQL_ASSOC)){
    $listpengemudi[]=$row;
    }
    mysql_free_result($hasil);
  ?>

  <div class="col-sm-4">
       <select class="form-control" name="pengemudi" required>
      <option>Pilih</option>
    <?php
    foreach($listpengemudi as $pengemudi){
    echo "<option value='".$pengemudi['id_karyawan']."'>".$pengemudi['nama_karyawan']."</option>";
    }
    ?>

  </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <input type="submit" name="tambahkan" class="btn btn-default" value="Tambahkan" required>
    </div>
	<div class=" col-sm-3">
      <a href="../datapengiriman.php" class="btn btn-default">Batal</a>
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
