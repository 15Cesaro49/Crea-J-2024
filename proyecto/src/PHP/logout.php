<?php
session_start(); // Inicia o reanuda una sesión existente.

session_unset(); // Elimina todas las variables de sesión

session_destroy(); // Destruye la sesión actual, eliminando todos los datos asociados con la sesión.

header('Location: ../login.html'); // Redirige al usuario a la página de inicio de sesión ('login.html').

exit(); // Termina el script actual para asegurar que no se ejecute ningún código después de la redirección.
?>
