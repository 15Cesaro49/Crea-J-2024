<?php
session_start(); // Inicia o reanuda una sesión existente. 

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_email'])) {
    // Si no hay una variable de sesión 'user_email', el usuario no está autenticado.
    // Redirige al usuario a la página de inicio de sesión.
    header("Location: ../login.html");
    exit(); // Detiene la ejecución del script después de la redirección.
}

echo "Bienvenido, " . htmlspecialchars($_SESSION['user_email']) . "!";
// Muestra un mensaje de bienvenida al usuario autenticado
// htmlspecialchars() se usa para evitar la inyección de código HTML o JavaScript.

?>

<a href="PHP/logout.php">Cerrar Sesión</a>
<!-- Enlace para cerrar sesión, que lleva al usuario a 'logout.php' para terminar la sesión y redirigirlo -->
