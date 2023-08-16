<?php
define('DB_SERVER', "rdbms.strato.de");
   define('DB_USERNAME', "dbu989005");
   define('DB_PASSWORD', 'Danielo2014@');
   define('DB_DATABASE', 'dbs11145374');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
<?php
$id = $_GET['EDITAR_ID'];
$sele = "SELECT * FROM resultados where id='$id'";
$result = $conn->query($sele);
$row = mysqli_fetch_assoc($result);  
?>

<script language="javascript" type="text/javascript">
function windowClose() {
window.open('','_parent','');
window.close();
}
</script>  

<?php
$status = "";
if(isset($_POST["enviar"]))
{
$donacion= $_POST["donacion"];
$adopcion= $_POST["adopcion"];
$socios= $_POST["socios"];
$eventos= $_POST["eventos"];
$fechaing= $_POST["fechaing"];
$id= $_POST["id"];
   
$update = 'UPDATE resultados SET

donacion=TRIM("'.$donacion.'"),

adopcion=TRIM("'.$adopcion.'"),

socios=TRIM("'.$socios.'"),

eventos=TRIM("'.$eventos.'"),
      
fechaing=TRIM("'.$fechaing.'")
      
WHERE id=TRIM('.$id.')';
  
  
if ($conn->query($update) === TRUE) 
{
echo '<script type="text/javascript">'; 
echo 'alert("EDICIO CORRECTA. JA POTS TANCAR AQUESTA FINESTRA");'; 
echo 'window.location = "javascript:history.back(1)";';
echo '</script>';
 
}
else
{
 
echo '<script type="text/javascript">'; 
echo 'alert("ERROR REVISAR SI FALTEN DADES");'; 
echo 'window.location = "javascript:history.back(1)";';
echo '</script>';
}
 
}

else {
 
?> 

	<div class="container">
	<h1><a>EDITAR RESULTATS </a></h1>
	<form id="form_18653"  method="post" action="">		
	
    <ul class="list-group">
  
    <input id="id" name="id"  class="element text small" type="hidden" maxlength="255" value="<?php echo $row['id'];?>"/> 
					
	<li class="list-group-item" id="li_2" >
	<label class="description" for="donacion">DONACIONS : </label>
	<div>
	<input id="donacion" name="donacion" class="element text medium" type="text" maxlength="255" value="<?php echo $row['donacion'];?>"/> 
	</div> 
	</li>
      
    <li class="list-group-item" id="li_3" >
	<label class="description" for="adopcion">ADOPCIONS : </label>
	<div>
	<input id="adopcion" name="adopcion" class="element text medium" type="text" maxlength="255" value="<?php echo $row['adopcion'];?>"/> 
	</div> 
	</li>	

    <li class="list-group-item" id="li_3" >
	<label class="description" for="socios">SOCIOS : </label>
	<div>
	<input id="socios" name="socios" class="element text medium" type="text" maxlength="255" value="<?php echo $row['socios'];?>"/> 
	</div> 
	</li>

    <li class="list-group-item" id="li_3" >
	<label class="description" for="eventos">EVENTOS : </label>
	<div>
	<input id="eventos" name="eventos" class="element text medium" type="text" maxlength="255" value="<?php echo $row['eventos'];?>"/> 
	</div> 
	</li>	


    <li class="list-group-item" id="li_4" >
	<label class="description" for="fechaing">FECHA : </label>
	<div>
	<input id="fechaing" name="fechaing" class="element text medium" type="text" maxlength="255" value="<?php echo $row['fechaing'];?>"/> 
	</div> 
	</li>	
			
	<br>
    <li class="list-group">
	<input type="hidden" name="form_id" value="18653" />
	<input id="saveForm" class="btn btn-primary" type="submit" name="enviar" value="Editar" /><br>
    <input class="btn btn-secondary" type="submit" onclick="javascript: form.action='../index.php';" value="Retornar" />      
                      
	</ul>
	</form>	
		
    <?php } ?>
      
	</div>