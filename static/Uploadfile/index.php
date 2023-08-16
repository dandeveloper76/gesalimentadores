<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css"> <!-- link to the stylesheet -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
	<title>Carrega imatges gats</title>
</head>
<body>

	<h2>Puja les teves imatges de la teva colonia de gats <a class="btn btn-primary" href="borrar.php">Borrar imatges</a></h2>
	<!-- Formulario para la carga de archivos -->

	<form name="upload-form">
		<input class="btn btn-secondary" name="file" type="file" required>
		<input class="btn btn-primary" type="submit" name="submit" value="Pujar" >
		<div class="progress-bar-container">
           <div class="progress-bar">
              <div class="progress-bar-inner"></div>
           </div>
        </div>
		 <progress class="progress-bard" value="0" max="100"></progress>

		<p class="error"></p>
		<p class="success"></p>
	</form> 
<?php
 include ('slide.php');
?>


	<script src="script.js"></script> <!-- link to the javascript file -->
	
</body>
</html>
