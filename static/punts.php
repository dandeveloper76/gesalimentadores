<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="">
	<meta name="keywords" content="">
    <meta name="robots" content="noindex, nofollow">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="" />

	<title>Gestió Alimentadores</title>

	<link href="css/app.css" rel="stylesheet"> 

    <link href="csss/estilos.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<style>

</style>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">GesAlimentadores</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pagines
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Escritori</span>
            </a>
					</li>

					<!-- <li class="sidebar-item">
						<a class="sidebar-link" href="pages-profile.html">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Perfil</span>
            </a>
					</li> -->

					<li class="sidebar-item">
						<a class="sidebar-link" href="login/login.php">
              <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Login</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="login/register.php">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Registre</span>
            </a>
					</li>
					
					<li class="sidebar-header">
						Que tenim ara?
					</li>

                    <li class="sidebar-item">
						<a class="sidebar-link" href="notificacions.php">
              <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Notificacions generals</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="afegir.php">
              <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Notifica d'alguna cosa</span>
            </a>
					</li>
					
					<li class="sidebar-header">
						Informació interna
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="punts.php">
              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Punts Colonies</span>
            </a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="autentificado.php">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Puja la teva imatge</span>
            </a>
					</li>
					
				</ul> 

				<!-- <div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Upgrade to Pro</strong>
						<div class="mb-3 text-sm">
							Are you looking for more components? Check out our premium version.
						</div>
						<div class="d-grid">
							<a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
						</div>
					</div>
				</div> -->
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">

					<ul class="navbar-nav navbar-align">
						<li>
						   

          <div class="demo-content">
            <div id="notification-header">
              <div style="position:relative">
                Missatges <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><img src="imgg/icono.png" /></button>
                <div id="notification-latest"></div>
              </div>          
            </div>
          </div>

          <?php if(isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>
          <?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                 <span class="text-dark">Hola <?php echo $_SESSION['username']; ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.php"><i class="align-middle me-1" data-feather="user"></i> Perfil</a>
								
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.php"><i class="align-middle me-1" data-feather="settings"></i> Panell de control</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="login/logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Zones de colonies de gats</h1>

					<div class="row">
						<div class="col-10">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Obra la eina de zona</h5>
									<p>&nbsp;</p>
									
									<h3><i class="align-middle me-1" data-feather="settings"></i><a href="punts/index.html" target="_blank">GesZona 1 </a><sub style="font-size:12px;color:red;"> SOL DE L'HORTA</sub></h3>
									<h3><i class="align-middle me-1" data-feather="settings"></i> <span>GesZona 2 <sub style="font-size:12px;color:red;">(inactiu)</sub></span></h3>
									<h3><i class="align-middle me-1" data-feather="settings"></i> <span>GesZona 3 <sub style="font-size:12px;color:red;">(inactiu)</sub></span></h3>
									</ul>
								</div>
								<div class="card-body">
								 
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="#" target="_blank"><strong>GesAdmin</strong></a> - <strong>Tots els drets reservats</strong>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#" target="_blank">Suport</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#" target="_blank">Help Center</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="jss/popper.min.js"></script>
    <script src="jss/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="jss/ie10-viewport-bug-workaround.js"></script>

    <script type="text/javascript">
      function myFunction() {
        $.ajax({
          url: "php/notificaciones.php",
          type: "POST",
          processData:false,
          success: function(data){
            $("#notification-count").remove();                  
            $("#notification-latest").show();$("#notification-latest").html(data);
          },
          error: function(){}           
        });
      }
                                 
      $(document).ready(function() {
        $('body').click(function(e){
          if ( e.target.id != 'notification-icon'){
            $("#notification-latest").hide();
          }
        });
      });                                     
    </script>
</body>

</html>