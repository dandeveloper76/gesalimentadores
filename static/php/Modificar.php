<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login/login.php");
    exit;
}
?>

<html>
<body>
<?php
$conexion = mysql_connect("localhost", "", "");
mysql_select_db("zoologico");
if (isset($nombre) && isset($fecha))
{
// Recuperación de datos del formulario

$especie =$_POST['especie'];
$fecha =$_POST['fecha'];
$sql = "UPDATE mascotas SET nacimiento = '$fecha' where nombre ='$nombre'";
mysql_query($sql,$conexión);
echo "¡Modificación Exitosa!";
}
else
{
echo "Se debe escribir un nombre y una fecha";
}
?>
</body>
</html>