<!DOCTYPE html>
<html lang="es">
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'crea';
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Error de la conexión a la base de datos: " . mysqli_connect_error());
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = mysqli_real_escape_string($conn, $_POST['email']);
    $contra = mysqli_real_escape_string($conn, $_POST['contra']);

    // Verificar en la tabla registro (usuarios comunes)
    $stmt = $conn->prepare("SELECT id, email, contra FROM registro WHERE email = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($contra, $row['contra'])) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];

            // Redirigir a la página de usuarios
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Inicio de sesión exitoso!',
                    text: '¡Bienvenido!',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location = '../index.php'; // URL para usuarios comunes
                });
            </script>";
            exit();
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Contraseña incorrecta',
                    text: '¡Vuelva a ingresar sus datos!',
                }).then(function() {
                    window.location = '../login.html'; // URL del formulario de inicio de sesión
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Usuario no encontrado',
                text: '¡Vuelva a ingresar sus datos!',
            }).then(function() {
                window.location = '../login.html'; // URL del formulario de inicio de sesión
            });
        </script>";
    }
}

mysqli_close($conn);
?>
</body>
</html>

