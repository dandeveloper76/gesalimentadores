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

	<title>Ges Alimentadores perfil</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="csss/estilos.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
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
					<li class="sidebar-item">
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
						   <?php
            include("php/conexion.php");
        ?>                        

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
				<div class="col-md-12 col-xl-9">

					<div class="col-md-8 col-xl-9">
						<h1 class="h3 d-inline align-middle">Perfil</h1>
					</div>
					<div class="row">
						<div class="col-md-12 col-xl-9">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Detalls perfil</h5>
								</div>
								<div class="card-body text-center">
									<img src="img/avatars/avatar.png" alt="" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0">
									Nom: <?php echo $_SESSION['username']; ?><br>
									Id registre: <?php echo $_SESSION['id']; ?><br>
									<?php									 
									ini_set('display_errors', 1);
                                    ini_set('display_startup_errors', 1);
                                    error_reporting(E_ALL);
									?>
									<br>
									<strong>On treballo? </strong>
									<?php
									// Consulta los registros en la base de datos
									$id = $_SESSION['id'];
                                    $sql = "SELECT * FROM users where id = '$id'";
                                    $result = $conn->query($sql);

                                    // Muestra los registros en una tabla
                                      if ($result->num_rows > 0) {
                                         echo "<div>";
                                         echo "";
                                         while($row = $result->fetch_assoc()) {
                                         echo "<div style='text-align:center;'>".$row["ofici"]."</div>";
                                        }
                                         echo "</div>";
                                     } else {
                                         echo "No se encontraron registros.";
                                     }

                                     // Cierra la conexión a la base de datos
                                       $conn->close();
									
									?>
									
									</h5>
									
									
								<br>
								<hr class="my-0" />
								<!-- <div class="card-body">
									<h5 class="h6 card-title">Habilitats</h5>
									<a href="#" class="badge bg-primary me-1 my-1">HTML</a>
									<a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
									<a href="#" class="badge bg-primary me-1 my-1">Sass</a>
									<a href="#" class="badge bg-primary me-1 my-1">Angular</a>
									<a href="#" class="badge bg-primary me-1 my-1">Vue</a>
									<a href="#" class="badge bg-primary me-1 my-1">React</a>
									<a href="#" class="badge bg-primary me-1 my-1">Redux</a>
									<a href="#" class="badge bg-primary me-1 my-1">UI</a>
									<a href="#" class="badge bg-primary me-1 my-1">UX</a>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Sobre mi</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Viu a <a href="#">Montblanc</a></li>

										<li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Treballa a <a href="#">Avaibooksports by Idealista</a></li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> Es de <a href="#">Barcelona</a></li>
									</ul>
								</div> -->
								<hr class="my-0" />
								
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
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
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