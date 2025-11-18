<?php
session_start();
require_once "users.php";

foreach($usuarios as $usuario){
    echo "nombre: " .$usuario['nombre']." contraseña: ".$usuario['password']." rol: " .$usuario['rol']. "</br>";
}

if(isset($_SESSION['username'])) {
    verificarRol($_SESSION['rol']);
}


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usernameTrim = trim($username, " ");
    $passwordTrim = trim($password, " ");

    if(strlen($usernameTrim) >= 3 && strlen($passwordTrim) >= 5) {
        foreach($usuarios as $usuario) {
        if($usernameTrim == $usuario['nombre'] && $passwordTrim = $usuario['password']){
            $_SESSION['username'] = $usernameTrim;
            $_SESSION['rol'] = $usuario['rol'];
            verificarRol($_SESSION['rol']);
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    }
    } else {
        echo "usuario o contraseña no cumplen con los requisitos establecidos";
    }
}

function verificarRol($rol){
    switch ($rol) {
    case "estudiante":
        header("Location: dashboard_estudiante.php");
        break;
    case "profesor":
        header("Location: dashboard_profesor.php");
        break;
    default:
        echo "Rol no válido.<br>";
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
    <p>El usuario debe de tener 3 o más caracteres</p>
    <p>La contraseña debe de tener 5 o más caracteres</p>
</body>
</html>
