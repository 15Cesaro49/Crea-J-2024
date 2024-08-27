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
    
    try {
        // Crear una nueva conexión PDO utilizando las credenciales de la base de datos
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Configurar PDO para que lance excepciones en caso de error
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verifica si el formulario fue enviado usando el método POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Recibe los datos del formulario
            $email = $_POST['email'];
            $contra = $_POST['contra'];

            // Prepara una consulta SQL para buscar el usuario con el email proporcionado
            $stmt = $conn->prepare("SELECT * FROM registro WHERE email = :email");
            // Enlaza el parámetro :email con el valor de $email
            $stmt->bindParam(':email', $email);
            // Ejecuta la consulta SQL
            $stmt->execute();

            // Verifica si se encontró un usuario con el email proporcionado
            if ($stmt->rowCount() > 0) {
                // Obtiene los datos del usuario como un array asociativo
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verifica si la contraseña proporcionada coincide con la contraseña almacenada en la base de datos
                if (password_verify($contra, $user['contra'])) {
                    // Guarda el email del usuario en la sesión
                    $_SESSION['user_email'] = $user['email'];

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
                } else {
                    // Muestra una alerta de error si la contraseña es incorrecta y redirige a la página de inicio de sesión
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
            } else {
                // Muestra una alerta de error si el usuario no existe y redirige a la página de inicio de sesión
                echo "
                <script language='JavaScript'>
                    swal.fire({
                        icon: 'error',
                        title: 'Usuario No Existente',
                        text: 'Registrese por favor',
                    }).then(function() {
                        window.location = '../login.html';
                    });
                </script>
                ";
            }
        }
    } catch (PDOException $e) {
        // Muestra un mensaje de error si ocurre un problema con la conexión a la base de datos
        echo "Error de conexión: " . $e->getMessage();
    }
    ?>
</body>

</html>
