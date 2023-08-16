<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login/login.php");
    exit;
}
?>

<HTML>
<BODY>
<FORM ACTION="Modificar.php" Method="POST">
<h2>Modificación de registros </h2>
Missatge a modificar: <input type=text name="mensaje"><br>
Autor a modificar: <input type=text name="autor"><br><br><br>
<input type=submit value="Modificar Datos"><input type=reset value="Cancelar">
</form>
</BODY>
</HTML>