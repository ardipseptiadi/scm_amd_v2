<?php
include(dirname(__FILE__).'/lib/query.php');
include(dirname(__FILE__).'/lib/function.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['is_login']) && $_SESSION['is_login'])
{
  $data_login = $_SESSION['data_login'];
  $menu = getMenuJabatan($data_login['jabatan']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Amidis</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="datepicker/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="datepicker/css/bootstrap-datepicker3.css">
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
       <a href="index.php"><img src="logo.png" class="img-responsive" alt="Responsive image" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!-- <li class="dropdown">
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
        </li> -->
        <?php
          foreach($menu as $item){
            if($item['has_child']){
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$item['judul']?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php
                unset($item['judul']);unset($item['url']);unset($item['has_child']);
                foreach($item as $item_child){ ?>
                  <li><a href="<?='?content='.$item_child['url']?>"><?=$item_child['judul']?></a></li>
            			<li role="separator" class="divider"></li>
                <?php }?>
              </ul>
            </li>
            <?php
            }else{
              // asfasf
            }
          }
         ?>
         <li><a href="login/logout.php">Logout</a></li>
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
    <?php if($_GET['content']){?>
    <div class="col-sm-10 text-left">
      <?php
        $content = $_GET['content'];
        $file = dirname(__FILE__).'/view/'.$content.'.php';
       ?>
      <?php if(file_exists($file)){
              include($file);
            }else{?>
        <h1 style='text-align:center; !important'>404</h1>
        <h3 style='text-align:center; !important'>Halaman Tidak Ditemukan</h3>
      <?php }?>
    </div>
    <?php
    }elseif($_GET['proses']){
      $proses = $_GET['proses'];
      $file = dirname(__FILE__).'/proses/'.$proses.'.php';
      if(file_exists($file)){
        include($file);
      }else{ ?>
        <h1 style='text-align:center; !important'>404</h1>
        <h3 style='text-align:center; !important'>Halaman Tidak Ditemukan</h3>
    <?php
      }
    }else{?>
    <div class="col-sm-10 text-center">
      <h1>SELAMAT DATANG</h1>
      <p> Anda Login Sebagai <?=$data_login['jabatan']?></p>
      <hr>
    </div>
    <?php }?>
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
	// $('$tanggal').daterangepicker(
	// {
	// singleDatePicker: true,
	// format : 'YYYY-MM-DD'
	// }
	// );
});
</script>]
</body>
</html>
<?php
}else{
  header('Location: login/login.php');
}
 ?>
