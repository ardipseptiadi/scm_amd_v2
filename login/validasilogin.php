<?php
session_start();
 //koneksi ke database
mysql_connect("localhost", "root", "");
mysql_select_db("dbamidis");
//validasi login
$username=$_POST['nip'];
$password=$_POST['password'];
$query=mysql_query("select * from t_karyawan where nip='$username' and password='$password' and status = 'aktif' ");
$cek=mysql_num_rows($query);
if($cek){
	$_SESSION['nip']=$username;
	$_SESSION['statuslogin']=true;
	//header("location: http://localhost/amidis/index.php");
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
	switch ($jabatanlogin){
		case "admin":
			header("location: ../front/indexadmin.php");
			break;
		case "purchasing":
			header("location: ../indexpurchasing.php");
			break;
		case "gudang":
			header("location: ../front/indexgudang.php");
			break;
		case "operational direktur":
			header("location: ../indexdirektur.php");
			break;
		case "ppic":
			header("location:../front/indexppic.php");
			break;

	}
}else{
$_SESSION['statuslogin']=false;
echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
 <link href="../css/bootstrap-theme.min.css" rel="stylesheet"/>
 <style>
.tengah{
position:fixed;
margin-top: -100px;
margin-left: -200px;
left: 50%;
top: 20%;
}
</style>
</head>

<body>
<p><br/><br/><br/><br/></p>
<div class="tengah">
 <div class="container">
      <div class="row">
  <div class="col-md-4">
       <div class="panel panel-default">
       <div class="panel-body">
          <div class="page-header">
		  <center>
  		  <img src="../logo.png"  class="img-responsive" alt="Responsive image" width="150" height="150" style="" >
  		  </center>
         <h3>Login</h3>
      </div>
   <form action="validasilogin.php" method="post" accept-charset="utf-8" role="form">
   <div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><div class="glyphicon glyphicon-volume-off"></div></span><span class="sr-only">Close</span></button>
 Maaf, Username atau password yang anda masukkan tidak cocok. Silahkan coba lagi!
 </div>
      <form action="validasiid1.php" method="post" accept-charset="utf-8" role="form">
         <div class="form-group">
            <label for="nip">Username</label>
            <div class="input-group">
           <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
           <input type="text" class="form-control" name="nip" placeholder="Enter nip" required />
        </div>
         </div>
         <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
           <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
           <input type="password" class="form-control" name="password" placeholder="Password" required />
        </div>
         </div>
         <hr/>
         <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Login</button>
         <p>
</p>
      </form>
	  </div>
       </div>
    </div>

     </div>
  </div>
    </div>

 <!-- jQuery necessary for Bootstrap -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
';
}
?>
