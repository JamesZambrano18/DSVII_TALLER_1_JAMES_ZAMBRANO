<?php
session_start();
require "users.php";
try {
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    } else {
        $username = $_SESSION['username'];
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
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
            <td>Notas</td>
            </th>
        </thead>
        <tbody>
            <?php try { ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <?php if ($username == $usuario['nombre']): ?>
                        <?php foreach ($usuario['calificaciones'] as $nota): ?>
                            <tr>
                                <td><?php echo $nota ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                <?php endforeach ?>
            <?php } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            } ?>

        </tbody>
    </table>
    <button><a href="logout.php">Cerrar Sesion</a></button>
</body>

</html>