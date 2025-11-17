<?php
session_start();

if(isset($_SESSION['username'])) {
    header("Location: panel.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $usuario = $_POST['username'];
    $password = $_POST['password'];

    if($usuario == "admin" && $password = "1234"){
        $_SESSION['username'] = $usuario;
        header("Location: panel.php");
        exit();
     } else {
        echo "El usuario o la contraseña son incorrectos.";
     }
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
    <form action="" method="post">
        <h1>Iniciar sesion</h1>
        <label for = "username">Nombre de Usuario: </label><input type ="text" id = "username" name = "username" placeholder="nombre de usuario" required>
        <br>
        <label for = "password">Contraseña: </label><input type ="password" id = "password" name = "password" placeholder="contraseña" required>
        <br>
        <input type="submit" value="Iniciar Sesion">
    </form>
</body>
</html>