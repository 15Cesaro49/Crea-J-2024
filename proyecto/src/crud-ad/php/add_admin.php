<!DOCTYPE html>
<html lang="es">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambiar si es necesario
$username = "root";        // Cambiar si es necesario
$password = "";            // Cambiar si es necesario
$dbname = "parknowdb";       // Nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];

// Hashear la contraseña para mayor seguridad
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Insertar datos en la base de datos
$sql = "INSERT INTO administradores (correo, nombre, contra) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $email, $nombre, $hashed_password);

if ($stmt->execute()) {
    echo "<script>
    swal.fire({
        icon: 'success',
        title: '¡Registro exitoso!',
        text: '¡Registro de administrador!',
        showConfirmButton: false,
        timer: 2000
    }).then(function() {
        window.location = '../agreagr_ad.php'; // URL para usuarios comunes
    });
</script>";
exit();;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

</body>
</html>