<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:../html/login.html');
    exit();
}

// Aquí obtienes el nombre del usuario desde la sesión o la base de datos
$nombre_usuario = $_SESSION['email']; // Asumiendo que guardaste el nombre del usuario en la sesión
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi App de Estacionamiento</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="crud_css/agg_admin.css">
</head>

<body>

    <header>
        <div class="logo-container">
            <a href="pagina_casa.html"><img class="logo" src="../img/estrella (1).png" alt="Logo de la App"></a>
        </div>
        <h1>Busca tu estacionamiento</h1>
        <div class="icons-container">
            <!--<a href="pagina_casa.html"><img class="header-icon" src="../img/carros.png" alt="Icono de Carros"></a>-->
            <a href="../html/login.html"><img class="header-icon" src="../img/perfil.png" alt="Icono de Usuario"></a>
        </div>
    </header>
    <div class="container">
        <div class="card">
            <form action="agregar_ad.php" method="post">
                <a class="signup">Agregar Admin</a>
                <div class="inputBox1">
                    <input type="email" name="email" required="required">
                    <span class="user">email</span>
                </div>
    
                <div class="inputBox">
                    <input type="text" name="username" required="required">
                    <span>Usuario</span>
                </div>
    
                <div class="inputBox">
                    <input type="password" name="password" required="required">
                    <span>Contraseña</span>
                </div>
    
                <button type="submit" class="enter">Enter</button>
            </form>
        </div>
    </div>    

    </div>

    <footer class="purple-footer invert-images">
        <div class="footer-icons">
            <a href="../html/index.html"><img class="icon invert-img" src="../img/casa.png" alt="Icono Casa"></a>
            <a href="pagina_mensaje.html"><img class="icon invert-img" src="../img/chat.png" alt="Icono Chat"></a>
            <a href="pagina_ajustes.html"><img class="icon invert-img" src="../img/ajustes.png" alt="Icono Ajustes"></a>
        </div>
    </footer>

    <script src="script.js"></script>

</body>

</html>