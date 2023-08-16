<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/login.php");
    exit;
}

if(!empty($_GET['id'])){
    //Credenciales de conexion
    $Host = 'rdbms.strato.de';
    $Username = 'dbu989005';
    $Password = 'Danielo2014@';
    $dbName = 'dbs11145374';
    
    //Crear conexion mysql
    $db = new mysqli($Host, $Username, $Password, $dbName);
    
    //revisar conexion
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Extraer imagen de la BD mediante GET
    $result = $db->query("SELECT users FROM image WHERE id = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgDatos = $result->fetch_assoc();
        
        //Mostrar Imagen
        header("Content-type: image/jpg"); 
        echo $imgDatos['image']; 
    }else{
        echo 'Imagen no existe...';
    }
}
?>