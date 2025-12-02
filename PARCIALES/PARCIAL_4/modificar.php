<?php
try {
    require_once "database.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
        $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
        $precio = mysqli_real_escape_string($conn, $_POST['precio']);
        $cantidad = mysqli_real_escape_string($conn, $_POST['cantidad']);

        if ($precio <= 0 || $cantidad < 0) {
            echo "ERROR: Ingreso datos invalidos";
        } else {
            $sql = "UPDATE productos SET nombre = ?, categoria = ?, precio = ?, cantidad = ? WHERE id = ?";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param(
                    $stmt,
                    "ssdii",
                    $nombre,
                    $categoria,
                    $precio,
                    $cantidad,
                    $id
                );

                if (mysqli_stmt_execute($stmt)) {
                    echo "Usuario Modificado con éxito.";
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    header("Location: index.php");
                } else {
                    echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($conn);
                }
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($conn);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
