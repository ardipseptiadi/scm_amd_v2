<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['is_login']) && $_SESSION['is_login'])
{
  header('Location: ../index.php');
}
 ?>
<!DOCTYPE html>
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
       <div class="panel panel-default" >
       <div class="panel-body" align="">
          <div class="page-header">
		  <center>
  		  <img src="../logo.png"  class="img-responsive" alt="Responsive image" width="150" height="150" style="" >
  		  <h2>PT. Amidis Tirta Mulia</h2>
		  </center>
         <h3>Login</h3>
      </div>
      <form action="loginvalidate.php" method="post" accept-charset="utf-8" role="form">
        <?php
          if(isset($_SESSION['err_login']) && $_SESSION['err_login'])
          {
            ?>
            <div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><div class="glyphicon glyphicon-volume-off"></div></span><span class="sr-only">Close</span></button>
          Maaf, Username atau password yang anda masukkan tidak cocok. Silahkan coba lagi!
          </div>
            <?php
          }
         ?>
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

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>

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
