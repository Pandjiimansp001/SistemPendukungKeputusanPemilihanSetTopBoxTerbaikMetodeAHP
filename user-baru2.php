<?php
include "includes/config.php";

$config = new Config();
$db = $config->getConnection();

if($_POST){
    
    include_once 'includes/user.inc.php';
    $eks = new User($db);

    $eks->nl = $_POST['nl'];
    $eks->un = $_POST['un'];
    $eks->pw = md5($_POST['pw']);

    if($eks->pw == md5($_POST['up'])){
    
    if($eks->insert()){
?>
<script type="text/javascript">
window.onload=function(){
  showStickySuccessToast();
  setTimeout("location.href='login.php'", 2000);

};
</script>

<?php
    }
    
    else{
?>
<script type="text/javascript">
window.onload=function(){
  showStickyErrorToast();
};
</script>
<?php
    }

    } else{
?>
<script type="text/javascript">
window.onload=function(){
  showStickyWarningToast();
};
</script>
<?php   
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sistem Pendukung Keputusan Pemilihan Jurusan di Universitas</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="css/jquery.toastmessage.css" rel="stylesheet"/>
        <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background: #141414 url(images/webb-dark.png) left bottom fixed;">
  
	<nav class="navbar navbar-default navbar-static-top">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		 <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>-->
		  <center><a class="navbar-brand" href="index.html">Sistem Pendukung Keputusan Pemilihan Set Top Box Terbaik</a></center>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="http://www.codeberkas.xyz/">Code Berkas</a></li>
			<li><a href="http://kautube.com/">Kautube</a></li> 
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
  
    <div class="container">
		<div class="row">
		  <div class="col-xs-12 col-sm-4 col-md-4">&nbsp;</div>
		  <div class="col-xs-12 col-sm-4 col-md-4">
		  	
          <div style="margin-top: 100px;" class="panel panel-default"><div class="panel-body">
          <div class="text-center"><h4>REGISTRASI</h4></div>
          <form method="post">
          <div class="form-group">
                      <label for="nl">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nl" name="nl" required>
                    </div>
                    <div class="form-group">
                      <label for="un">Username</label>
                      <input type="text" class="form-control" id="un" name="un" required>
                    </div>
                    <div class="form-group">
                      <label for="pw">Password</label>
                      <input type="password" class="form-control" id="pw" name="pw" required>
                    </div>
                    <div class="form-group">
                      <label for="up">Ulangi Password</label>
                      <input type="password" class="form-control" id="up" name="up" required>
                    </div>

            <button type="submit" href='login.php'" class="btn btn-primary btn-lg btn-block">REGISTER</button>
				  
				</form>
		  	</div></div>
		  	
		  </div>
		  <div class="col-xs-12 col-sm-4 col-md-4">&nbsp;</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
<?php
include_once 'footer.php';
?>
</html>