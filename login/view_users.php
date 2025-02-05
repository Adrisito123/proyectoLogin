<?php
// filepath: /c:/Users/manue/Desktop/OTROS/login/view_users.php
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

// Obtener datos de la tabla
$sql = "SELECT id, user, pass FROM login";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar datos en una tabla HTML
    echo "<table border='1'><tr><th>ID</th><th>Usuario</th><th>Contraseña</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["user"]. "</td><td>" . $row["pass"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>