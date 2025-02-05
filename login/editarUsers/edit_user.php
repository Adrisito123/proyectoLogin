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
$id = $_GET['id'] ?? '';
$newUser = $_GET['user'] ?? '';

if ($id && $newUser) {
    // Actualizar el usuario
    $stmt = $conn->prepare("UPDATE login SET user = ? WHERE id = ?");
    $stmt->bind_param("si", $newUser, $id);

    if ($stmt->execute()) {
        echo "Usuario actualizado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    echo "Se requieren ID y nuevo nombre de usuario.";
}

// Cerrar la conexión
$conn->close();
?>