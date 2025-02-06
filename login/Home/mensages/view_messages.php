<?php
// filepath: /c:/Users/manue/Desktop/OTROS/login/Home/mensages/view_messages.php
$messages = file_get_contents("messages.txt");
?>

<!DOCTYPE html>
<html lang="es-Es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes Recibidos</title>
    <link rel="stylesheet" type="text/css" href="../welcome_styles.css">
    <style>
        .messages-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .message {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .message:last-child {
            border-bottom: none;
        }
        .message strong {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <header class="cabecera">
        <div class="left-section">
            <button id="menuInicio" class="menuInicio">
                <img src="../img/hogar.png" alt="Inicio" class="iconoHogar">
            </button>
            <button id="menuTienda" class="menuTienda">
                <img src="../img/carrito-de-compras.png" alt="Carrito" class="iconoCarrito">
            </button>
            <button id="menuContacto" class="menuContacto">
                <img src="../img/usuario.png" alt="Usuario" class="iconoUsuario">
            </button>
            <button id="menuBusqueda" class="menuBusqueda">
                <img src="../img/busqueda.png" alt="Ajustes" class="iconoBusqueda">
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
        <div class="messages-container">
            <h2>Mensajes Recibidos</h2>
            <?php
            $messagesArray = explode("\n\n", trim($messages));
            foreach ($messagesArray as $message) {
                if (!empty(trim($message))) {
                    $messageLines = explode("\n", $message);
                    echo '<div class="message">';
                    foreach ($messageLines as $line) {
                        echo '<strong>' . htmlspecialchars($line) . '</strong>';
                    }
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    <script src="../welcome_script.js"></script>
</body>
</html>