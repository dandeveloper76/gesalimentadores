<!DOCTYPE html>
<html>
<head>
    <title>Datos del formulario</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
@media print {
  .oculto-impresion,
  .oculto-impresion * {
    display: none !important;
  }
}
</style>
<body>
    <h2 style="margin-top:10px;text-align:center;">ASSOCIACIÓ MONTBLANC GAT I GOS</h2>
	<p style="text-align:center;"><img src="gatigos.png"/></p>
	<p style="text-align:center;"><strong>NIF: G-55689566</strong></p>
	<p style="text-align:center;"><strong>E-mail: montblanc.gatigos@gmail.com</strong></p>
	<div style="height:50px;"></div>
    <h4 style="margin-top:10px;text-align:center;margin-bottom:50px;">CONTRACTE D'ADOPCIÓ D'ANIMALS DE COMPANYIA</h4>
    <?php
    $nombre = $_GET['nombre'] ?? '';
    $phone = $_GET['phone'] ?? '';
    $dni = $_GET['dni'] ?? '';
	$carrer = $_GET['carrer'] ?? '';
    ?>
	<p class="container"><strong>Reunides les parts a Montblanc a data d'avui</strong><br><br>
	D' una part, l'adoptant <strong><?php echo htmlspecialchars($nombre); ?></strong> major d'edat, amb DNI: <strong><?php echo htmlspecialchars($dni); ?></strong> el telèfon mòbil <strong><?php echo htmlspecialchars($phone); ?></strong> amb domicili a <strong><?php echo htmlspecialchars($carrer); ?></strong>.<br>
	I de l'altra part l'Associació Montblanc Gat i Gos amb NIF G55689566.<br><br>
	Adoptant i Associació, de comú acord, fixen els termes del present contracte d'adopció d'animal de companyia les caracteristiques del qual es detallen tot seguit:<br><br>
	<div class="container" style="width:82%;border: 1px solid #000; padding: 20px;">
	Nom:<br>
	<hr>
	Espècia:<br>
	<hr>
	Sexe:<br>
	<hr>
	Raça<br>
	<hr>
	Data de naixement:<br>
	<hr>
	Esterilitzat:<br>
	<hr>
	Color:<br>
	<hr>
	Microxip nº:<br>
	<hr>
	Cartilla sanitària o passaport nº:<br>
	<hr>
	Procedència: <strong>Montblanc</strong><br>
	<hr>
	Altres característiques:
	<div style="height:50px;"></div>
	</div>
	</p>
</body>
<br>
<center><button class="oculto-impresion" type="text" name="Submit" onclick="javascript:window.print()">IMPRIMIR</button></center>
<br>
</html>
