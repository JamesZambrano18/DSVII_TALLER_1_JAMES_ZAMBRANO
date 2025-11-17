<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
} else {
    $usuario = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcial 2</title>
</head>
<body>
    <h1>Esta es la pagina de panel</h1>
    <p>Bienvenido: <?php echo $usuario?></p>
    <button><a href="logout.php">Cerrar Sesion</a></button>
</body>
</html>