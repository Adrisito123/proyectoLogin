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
    $stmt = $conn->prepare("SELECT * FROM login WHERE user = ? AND pass = ?");
    $stmt->bind_param("ss", $uname, $psw);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario encontrado, iniciar sesión
        header("Location: ../Home/welcome.html");
        exit();
    } else {
        // Usuario no encontrado
        header("Location: ../inicioSesion/index.html?error=notfound");
        exit();
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    echo "Se requieren nombre de usuario y contraseña.";
}

// Cerrar la conexión
$conn->close();
?>