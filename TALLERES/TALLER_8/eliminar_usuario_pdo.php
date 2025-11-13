<?php
require_once "config_pdo.php";

$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id=:id";

if (($stmt = $pdo->prepare($sql))) {
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Usuario Eliminado con éxito.";
        unset($stmt);
        unset($pdo);
        header("Location: leer_usuarios_mysqli.php");
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($conn);
    }
}
unset($stmt);
unset($pdo);
?>