<?php
// Configuración de parámetros para la conexión a la base de datos
$db_host = 'localhost';       // El servidor donde se encuentra la base de datos
$db_username = 'root';        // Nombre de usuario para conectarse a la base de datos
$db_password = '';            // Contraseña del usuario para conectarse a la base de datos
$db_name = 'crea-j 2024';     // Nombre de la base de datos a la que se va a conectar

// Establece la conexión a la base de datos usando las credenciales proporcionadas
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Verifica si la conexión fue exitosa. Si no, muestra un mensaje de error y detiene la ejecución del script.
if (!$conn) {
    die("Error de la conexion a la base de datos: " . mysqli_connect_error());
}

// Obtiene los datos enviados por el formulario a través del método POST
$descripcion = $_POST['descripcion'];  // Descripción proporcionada por el usuario
$categoria_id = $_POST['categoria'];    // ID de la categoría seleccionada por el usuario

// Inicia la sesión para acceder a las variables de sesión
session_start();

// Obtiene el ID del usuario desde la variable de sesión
$usuario_id = $_SESSION['ID_Usuario']; 

// Prepara la consulta SQL para insertar los datos en la tabla 'datos'
$insert_query = "INSERT INTO datos (id, descripcion, categoria_id, usuario_id) VALUES (NULL, '$descripcion', '$categoria_id', $usuario_id)";

// Ejecuta la consulta SQL. Si tiene éxito, redirige al usuario a la página principal. Si no, muestra un mensaje de error.
if (mysqli_query($conn, $insert_query)) {
    // Redirige al usuario a la página de índice (index.php) en el directorio padre
    header('Location: ../html/index.php');

    // Mensaje opcional (no se mostrará debido a la redirección antes)
    echo "Reporte guardado con éxito.";
} else {
    // Muestra el mensaje de error si la consulta falla
    echo "Error: " . mysqli_error($conn);
}

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>
