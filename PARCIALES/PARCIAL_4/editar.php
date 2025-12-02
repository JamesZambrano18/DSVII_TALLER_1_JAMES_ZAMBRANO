<?php
try {
    require_once "database.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<form action="modificar.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <div><label>Nombre: </label><input type="text" name="nombre" value="<?= $row['nombre']; ?>" required></div>
    <div><label>Categoria: </label><input type="text" name="categoria" value="<?= $row['categoria']; ?>" required></div>
    <!-- cambiar a decimal -->
    <div><label>Precio: </label><input type="text" name="precio" value="<?= $row['precio']; ?>" required></div>
    <div><label>Cantidad: </label><input type="number" name="cantidad" value="<?= $row['cantidad']; ?>" required min="0"></div>
    <input type="submit" value="Actualizar Producto">
</form>
<a href="index.php">Cancelar</a>