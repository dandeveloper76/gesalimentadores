<?php
	
    $conn = new mysqli("rdbms.strato.de","dbu989005","Danielo2014@","dbs11145374");
    $count = 0;
    $sql2 = "SELECT * FROM datos WHERE estado = 0";
    $result = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result);
