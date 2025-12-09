<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de Gestión de Transporte Escolar</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <ul class="navlinks">
                <li><a href="<?php echo BASE_URL; ?>users">Gestionar usuarios</a></li>
                <li><a href="<?php echo BASE_URL; ?>routes">Gestionar rutas</a></li>
                <li><a href="<?php echo BASE_URL; ?>locations">Gestionar localizaciones</a></li>
                <li><a href="<?php echo BASE_URL; ?>schedules">Gestionar horarios</a></li>
                <li><a href="<?php echo BASE_URL; ?>busses">Gestionar buses</a></li>
                <li><a href="#">Seguimiento de pagos</a></li>
                <li><a href="#">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php echo $content;?>
    </main>
    <footer>
        <p>&copy; 2025 Gestion de autobuses escolares</p>
    </footer>
    <script src="<?php echo BASE_URL; ?>/public/assets/js/main.js"></script>
</body>
</html>