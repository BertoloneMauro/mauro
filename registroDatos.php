<?php
var_dump($_POST);
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "usuarioinfo");

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Recopila los datos del formulario
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$documento = $_POST['nDocumento'];
$nombre = $_POST['nombre'];

// Realiza una consulta SQL para insertar los datos en la tabla "datos"
$query = "INSERT INTO datos (contraseña, documento, email, nombre) 
          VALUES ('$contrasena', '$documento', '$email', '$nombre')";

if (mysqli_query($conexion, $query)) {
    header("Location: menu.html"); // Utiliza "Location" y la URL completa
    exit;
} else {
    echo "Error al registrar el usuario: " . mysqli_error($conexion);
}


// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
