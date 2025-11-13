<?php
require_once "config_mysqli.php";

$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id=?";

if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Usuario Eliminado con éxito.";
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: leer_usuarios_mysqli.php");
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($conn);
    }
}

mysqli_stmt_close($stmt);


mysqli_close($conn);
?>