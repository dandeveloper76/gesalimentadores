<?php
$conn = new mysqli("rdbms.strato.de","dbu989005","Danielo2014@","dbs11145374");

$sql = "UPDATE datos SET estado = 1 WHERE estado = 0";	
$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM datos ORDER BY id DESC limit 10";
$result = mysqli_query($conn, $sql);

$response='';

while ($row = mysqli_fetch_array($result)) {
    // Formatear la fecha
    $fechaOriginal = $row["fecha"];
    $fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

    // Agregar el botón de eliminar junto a la notificación
    $response .= "<div class='notification-item'>" .
        "<div class='notification-subject'>" . $row["autor"] . " - <span>" . $fechaFormateada . "</span> </div>" .
        "<div class='notification-comment'>" . $row["mensaje"] . "</div>" .
        "<form action='php/eliminar.php' method='post'>" . // Cambiar 'eliminar.php' por el nombre de tu archivo de eliminación
        "<input type='hidden' name='id' value='" . $row["id"] . "'>" . // Pasar el ID de la notificación a eliminar
        "<input class='btn btn-primary'type='submit' value='Eliminar'>" . // Botón de eliminar
        "</form>" .
        "<a class='amagat' href='notificacions.php'>Veure tots</a></div>";
}

if(!empty($response)) {
	print $response;
}


?>