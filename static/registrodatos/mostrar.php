		<body style = "margin-top:0; background-color:#fff">
    <div class="content"> 
		<div class="container">
        <div class='wrap-table100'>  
        <div class='table100 ver1 m-b-110'>    
        <table data-vertable='ver1' class="table table-bordered">
          					<br>
              				<h2 >TAULA DE RESULTATS</h2>
          					<br>
                        	<thead>
							<tr class=''>
							<th align="center" scope="col">ID</th> 
							<th scope="col" data-column='column2'><center>DONACION</center></th>
							<th scope="col" data-column='column3'><center>ADOPCION</center></th>
							<th scope="col" data-column='column3'><center>SOCIOS</center></th>
							<th scope="col" data-column='column3'><center>EVENTOS</center></th>
							<th scope="col" data-column='column4'><center>FECHA INGRES</center></th>
                            <!-- <th scope="col" data-column='column4'><center>EDIT</center></th> -->
           					</tr>
							</thead>   
              <tbody>
<?php
define('DB_SERVER', "rdbms.strato.de");
   define('DB_USERNAME', "dbu989005");
   define('DB_PASSWORD', 'Danielo2014@');
   define('DB_DATABASE', 'dbs11145374');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>

<?php

$sql = "SELECT * from resultados order by fechaing DESC";
$result = mysqli_query($conn, $sql);
while($crow = mysqli_fetch_assoc($result))
            			{	
?>
<tr class='row100'>
<td style='width:10px'><center> <?php echo $crow['id'];?> </center></td>
<td> <center><?php echo $crow['donacion']; ?>  </center> </td>
<td> <center><?php echo $crow['adopcion']; ?></center></td>
<td> <center><?php echo $crow['socios']; ?></center></td>
<td> <center><?php echo $crow['eventos']; ?></center></td>
<td> <center><?php echo $crow['fechaing']; ?></center></td>
<!-- <td><center><a href="editar_registro.php?EDITAR_ID=<?php echo $crow['id']; ?>" class="edit_btn" >Edita</a></center></td> -->
</tr>
<?php
  	    	}		
?>
       	</tbody>
	    	</table>             
        	    
	</div>
	</div>
	<div>
	</div>
	</div>
	</div>
 
