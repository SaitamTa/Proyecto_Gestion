<?php
// Establecer la conexión con la base de datos
$servername = "127.0.0.1:5500";
$username = "root";
$password = "";
$dbname = "proyecto_gestion";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los valores del formulario de inicio de sesión
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consultar la base de datos para verificar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // El inicio de sesión es exitoso
    echo "Inicio de sesión exitoso";
} else {
    // El inicio de sesión ha fallado
    echo "Correo o contraseña incorrectos";
}

$conn->close();
?>
