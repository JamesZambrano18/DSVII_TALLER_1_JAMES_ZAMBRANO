<?php
require_once "database.php";

$id = $_GET['id'];
$sql = "DELETE FROM productos WHERE id=?";

if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Producto eliminado exitosamente.";
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: index.php");
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($conn);
    }
}

mysqli_stmt_close($stmt);


mysqli_close($conn);
?>