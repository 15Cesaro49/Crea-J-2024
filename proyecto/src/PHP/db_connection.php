<?php
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "root"; // Nombre de usuario para acceder a la base de datos, "root" 
$password = ""; // Contraseña del usuario
$dbname = "parknowdb"; // Nombre de la base de datos 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname); 
// Se crea un nuevo objeto de la clase mysqli para establecer la conexión con la base de datos

// Verificar conexión
if ($conn->connect_error) {
    // Si hay un error en la conexión, se ejecuta este bloque
    die("Connection failed: " . $conn->connect_error);
    // Si la conexión falla, se muestra un mensaje de error y se termina la ejecución del script
}
?>

