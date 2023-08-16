<?php
//Reanudamos la sesión
@session_start();
//Validamos si existe realmente una sesión activa o no
if ($_SESSION["id"] != "1" && $_SESSION["id"] != "10") {
    //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión)
    header("Location: ../index.php");
    exit();
}

?>
<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $ofici = $image = "";
$username_err = $password_err = $confirm_password_err = $ofici_err = $image_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingrese un usuario.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Este usuario ya fue tomado.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Al parecer algo salió mal.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingresa una contraseña.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Confirma tu contraseña.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "No coincide la contraseña.";
        }
    }

    // Validate ofici
    if (empty(trim($_POST["ofici"]))) {
        $ofici_err = "Por favor ingresa un valor para ofici.";
    } else {
        $ofici = trim($_POST["ofici"]);
    }

    // Validate image
    if ($_FILES["image"]["name"] !== "") {
        $target_dir = "uploads/"; // Especifica el directorio donde deseas almacenar las imágenes cargadas
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verificar si el archivo es una imagen válida o una imagen falsa
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $image_err = "El archivo no es una imagen válida.";
        }

        // Verificar el tamaño del archivo
          $max_file_size = 5242880; // 5MB (puedes ajustar este valor)
          if ($_FILES["image"]["size"] > $max_file_size) {
          $image_err = "El tamaño del archivo supera el límite permitido.";
          }
		  
		      // Permitir solo formatos de archivo de imagen específicos (puedes agregar más formatos si es necesario)
    $allowed_formats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowed_formats)) {
        $image_err = "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
    }

    // Si no hay errores, mueve la imagen cargada al directorio de destino
    if (empty($image_err)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            $image_err = "Error al subir el archivo.";
        }
    }
}

// Verificar los errores de entrada antes de insertar en la base de datos
if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($ofici_err) && empty($image_err)) {

    // Preparar una declaración de inserción
    $sql = "INSERT INTO users (username, password, ofici, image) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Vincular variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_ofici, $param_image);

        // Establecer los parámetros
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Crea un hash de contraseña
        $param_ofici = $ofici;
        $param_image = $image;

        // Intentar ejecutar la declaración preparada
        if (mysqli_stmt_execute($stmt)) {
            // Redireccionar a la página de inicio de sesión
            header("location: login.php");
        } else {
            echo "Algo salió mal, por favor inténtalo de nuevo.";
        }
    }

    // Cerrar la declaración
    mysqli_stmt_close($stmt);
}

// Cerrar la conexión
mysqli_close($link);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
   <div class="container">
    <div class="row">
    <div class="col-sm-12 col-lg-6">
    <p style="margin-top:50px;">&nbsp;</p>
        <h2>Registro</h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario:</label>
<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
<span class="help-block"><?php echo $username_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
<label>Contraseña:</label>
<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
<span class="help-block"><?php echo $password_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
<label>Confirmar Contraseña:</label>
<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
<span class="help-block"><?php echo $confirm_password_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($ofici_err)) ? 'has-error' : ''; ?>">
<label>Oficio:</label>
<input type="text" name="ofici" class="form-control" value="<?php echo $ofici; ?>">
<span class="help-block"><?php echo $ofici_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
<label>Imagen:</label>
<input type="file" name="image" class="form-control">
<span class="help-block"><?php echo $image_err; ?></span>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Registrar">
<input type="reset" class="btn btn-default" value="Resetear">
</div>
<p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
</form>
</div>
</div>
</div>

</body>
</html>