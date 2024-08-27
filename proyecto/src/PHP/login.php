<!DOCTYPE html>
<html lang="es">
    <body>
    <!-- Incluye la biblioteca SweetAlert2 desde un CDN para mostrar alertas estilizadas -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    // Inicia una nueva sesión o reanuda la sesión actual
    session_start();

    // Incluye el archivo de conexión a la base de datos
    include('db_connection.php'); 

    // Verifica si el formulario fue enviado y si se recibió un email en la solicitud POST
    if (!isset($_POST['email'])) {
        // Redirige al usuario a la página de inicio de sesión si no se recibió el email
        header('location:../login.html');
        exit(); // Asegura que el script se detiene después de la redirección
    }

    // Obtiene los datos enviados desde el formulario
    $correo = $_POST['email'];  // Email enviado desde el formulario
    $contra = $_POST['contra']; // Contraseña enviada desde el formulario

    // Prepara la consulta SQL para buscar el usuario con el email y la contraseña proporcionados
    $sql_admin = "SELECT * FROM registro WHERE email = '$correo' AND contra = '$contra'";
    // Ejecuta la consulta SQL
    $result_admin = mysqli_query($conn, $sql_admin);
    // Cuenta el número de filas devueltas por la consulta
    $existe1 = mysqli_num_rows($result_admin);

    // Verifica si se encontró algún usuario que coincida con el email y la contraseña
    if ($existe1 > 0) {
        // Itera sobre los resultados (en este caso, debería haber solo un resultado)
        while ($row = mysqli_fetch_array($result_admin)) {
            // Verifica si el email y la contraseña coinciden con los datos del usuario
            if ($correo == $row['email'] && $contra == $row['contra']) {
                // Guarda el email y el ID del usuario en la sesión
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];

                // Muestra una alerta de éxito y redirige al usuario a la página principal
                echo "
                <script language='JavaScript'>
                    swal.fire({
                        icon: 'success',
                        title: '¡Bienvenid@ a ParkNow !',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location = '../index.php';
                    });
                </script>";
                // Termina la ejecución del script después de la redirección
                exit();
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
                window.location = '../login.html';
            });
        </script>
        ";
    }

    // Cierra la conexión a la base de datos (no se muestra explícitamente aquí, pero es una buena práctica)
    ?>
    </body>
</html>

