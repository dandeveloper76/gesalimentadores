<?php
$conn = new mysqli("rdbms.strato.de","dbu989005","Danielo2014@","dbs11145374");

$sql = "UPDATE datos SET estado = 1 WHERE estado = 0";	
$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM datos ORDER BY id DESC limit 5";
$result = mysqli_query($conn, $sql);

$response='';

while($row=mysqli_fetch_array($result)) {

	/* Formate fecha */
	$fechaOriginal = $row["fecha"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'>". $row["autor"] . " - <span>". $fechaFormateada . "</span> </div>" . 
	"<div class='notification-comment'>" . $row["mensaje"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>