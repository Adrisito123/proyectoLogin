<?php
// filepath: /c:/Users/manue/Desktop/OTROS/login/login.php
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
$uname = $_POST['uname'];
$psw = $_POST['psw'];

// Insertar datos en la tabla
$sql = "INSERT INTO login (user, pass) VALUES ('$uname', '$psw')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registro exitoso');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>