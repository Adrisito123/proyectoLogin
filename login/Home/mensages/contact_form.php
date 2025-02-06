<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $comentario = htmlspecialchars($_POST['comentario']);
    
    // Almacenar el mensaje en un archivo de texto
    $file = fopen("messages.txt", "a");
    fwrite($file, "Correo Electrónico: $email\nComentario: $comentario\n\n");
    fclose($file);
    
    // Devolver una respuesta JSON
    echo json_encode(["status" => "success", "message" => "Mensaje enviado correctamente."]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="es-Es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto Recibido</title>
    <link rel="stylesheet" type="text/css" href="../welcome_styles.css">
</head>
<body>
    <header class="cabecera">
        <div class="left-section">
            <button id="menuInicio" class="menuInicio">
                <img src="img/hogar.png" alt="Inicio" class="iconoHogar">
            </button>
            <button id="menuTienda" class="menuTienda">
                <img src="img/carrito-de-compras.png" alt="Carrito" class="iconoCarrito">
            </button>
            <button id="menuContacto" class="menuContacto">
                <img src="img/usuario.png" alt="Usuario" class="iconoUsuario">
            </button>
            <button id="menuBusqueda" class="menuBusqueda">
                <img src="img/busqueda.png" alt="Ajustes" class="iconoBusqueda">
            </button>
        </div>
        <div class="center-section">
            <h1>Tienda Sito</h1>
        </div>
        <div class="right-section">
            <div class="contenido">
                <button id="cerrarSesionBtn" class="cerrarSesion">Cerrar Sesión</button>
            </div>
        </div>
    </header>
    <div class="fondo">
        <div class="contenido">
            <h2>Gracias por contactarnos</h2>
            <p><strong>Correo Electrónico:</strong> <?php echo $email; ?></p>
            <p><strong>Comentario:</strong> <?php echo nl2br($comentario); ?></p>
        </div>
    </div>
    <footer class="cabeceraFinal">
        <div class="contactaNosotros">
            <h2>Contacta con Nosotros</h2>
            <form action="contact_form.php" method="post">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
                <label for="comentario">Comentario:</label>
                <textarea id="comentario" name="comentario" rows="4" required></textarea>
                <div class="botones">
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Borrar">
                </div>
            </form>
        </div>
    </footer>
    <div id="searchPanel" class="searchPanel">
        <input type="text" id="searchInput" placeholder="Buscar productos...">
        <button id="closeSearchPanel" class="closeSearchPanel">Cerrar</button>
    </div>
    <script src="../welcome_script.js"></script>
</body>
</html>