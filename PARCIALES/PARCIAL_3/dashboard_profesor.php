<?php
session_start();
require "users.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} else {
    $username = $_SESSION['username'];

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcial 3</title>
</head>

<body>
    <h1>Este es el dashboard de estudiante</h1>
    <p>Bienvenido/a: <?php echo $username ?></p>
    <h3>Sus calificaciones son: </h3><br>
    <table>
        <thead>
            <th>
            <td>Estudiantes</td>
            <td>Notas</td>
            </th>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <?php if($usuario['rol'] == "estudiante"):?>
                <tr>
                    <td><?php echo $usuario['nombre'] ?></td>
                    <?php foreach ($usuario['calificaciones'] as $nota): ?>
                        <td><?php echo $nota ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endif ?>
            <?php endforeach ?>
        </tbody>
    </table>
    <button><a href="logout.php">Cerrar Sesion</a></button>
</body>

</html>