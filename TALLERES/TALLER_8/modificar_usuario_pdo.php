<?php
require_once "config_pdo.php";

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id=:id";
if($stmt = $pdo->prepare($sql)){
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        if($stmt->execute()){
            $row = $stmt->fetch();
        } else{
            echo "ERROR: No se pudo ejecutar $sql. " . $stmt->errorInfo()[2];
        }
    }
?>

<form action="cambiar_informacion_pdo.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id'];?>">
    <div><label>Nombre</label><input type="text" name="nombre" value="<?= $row['nombre'];?>" required></div>
    <div><label>Email</label><input type="email" name="email" value="<?= $row['email'];?>"required></div>
    <input type="submit" value="Guardar Cambios">
</form>