<?php
$servername = "localhost";
$username = "root"; // Cambia esto si tu usuario de MySQL es diferente
$password = ""; // Cambia esto si tu contraseña de MySQL es diferente
$dbname = "loginadr"; // Nombre correcto de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener datos del formulario
$uname = $_POST['uname'] ?? '';
$psw = $_POST['psw'] ?? '';

if ($uname && $psw) {
    // Verificar si el usuario ya existe
    $stmt = $conn->prepare("SELECT * FROM login WHERE user = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario ya existe
        header("Location: /crearCuenta/register.html?error=exists");
        exit();
    } else {
        // Usuario no existe, crear cuenta
        $stmt = $conn->prepare("INSERT INTO login (user, pass) VALUES (?, ?)");
        $stmt->bind_param("ss", $uname, $psw);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir al index.html para iniciar sesión
            header("Location: /inicioSesion/index.html?success=1");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    echo "Se requieren nombre de usuario y contraseña.";
}

// Cerrar la conexión
$conn->close();
?>