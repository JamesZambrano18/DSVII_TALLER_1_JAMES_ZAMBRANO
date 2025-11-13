<?php
require_once "config_mysqli.php";

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<form action="cambiar_informacion_mysqli.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id'];?>">
    <div><label>Nombre</label><input type="text" name="nombre" value="<?= $row['nombre'];?>" required></div>
    <div><label>Email</label><input type="email" name="email" value="<?= $row['email'];?>"required></div>
    <input type="submit" value="Guardar Cambios">
</form>