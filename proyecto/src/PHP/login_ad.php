<!DOCTYPE html>
<html lang="es">
    <body>
    <!-- Incluye la biblioteca SweetAlert2 desde un CDN para mostrar alertas estilizadas -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <?php
    // Incluye el archivo de conexión a la base de datos
    include('db_connection.php'); 

    // Inicia una nueva sesión o reanuda la sesión actual
    session_start();

    // Verifica si el formulario fue enviado
    if (!isset($_POST['email'])) {
        // Redirige al usuario a la página de inicio de sesión si no se envió el email
        header('location:../login-ad.html');
        exit(); // Asegura que el script se detiene después de la redirección
    }

    // Obtiene los datos del formulario
    $correo = $_POST['email'];          // Email enviado desde el formulario
    $contra = $_POST['password'];       // Contraseña enviada desde el formulario

    // Consulta SQL para verificar si existe un administrador con el email y contraseña proporcionados
    $sql_admin = "SELECT * FROM administradores WHERE correo = '$correo' AND contra = '$contra'";
    $result_admin = mysqli_query($conn, $sql_admin); // Ejecuta la consulta
    $existe1 = mysqli_num_rows($result_admin); // Cuenta el número de filas devueltas

    // Verifica si hay algún resultado (es decir, si el administrador existe)
    if ($existe1 > 0) {
        // Itera sobre los resultados (en este caso, debería haber solo un resultado)
        while ($row = mysqli_fetch_array($result_admin)) {
            // Verifica si el email y la contraseña coinciden (aunque esto es redundante aquí)
            if ($correo == $row['correo'] && $contra == $row['contra']) {
                // Guarda los datos del administrador en la sesión
                $_SESSION['email'] = $row['correo'];
                $_SESSION['id'] = $row['id'];

                // Muestra una alerta de éxito y redirige al usuario a la página principal del administrador
                echo "
                <script language='JavaScript'>
                    swal.fire({
                        icon: 'success',
                        title: '¡Bienvenid@ a ParkNow Administrador!',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location = '../crud-ad/index.php';
                    });
                </script>";
            }
        }
    } else {
        // Muestra una alerta de error y redirige al usuario a la página de inicio de sesión si el usuario no existe
        echo "
        <script language='JavaScript'>
            swal.fire({
                icon: 'error',
                title: 'Su usuario o contraseña pueden estar incorrecto',
                text: '¡Vuelva a ingresar sus datos!',
            }).then(function() {
                window.location = '../login-ad.html';
            });
        </script>
        ";
    }

    // Cierra la conexión a la base de datos (aunque esto no se muestra explícitamente aquí)
    ?>
    </body>
</html>
