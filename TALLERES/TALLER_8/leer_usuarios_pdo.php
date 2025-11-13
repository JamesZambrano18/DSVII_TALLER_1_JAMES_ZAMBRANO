<?php
require_once "config_pdo.php";
$sql = "SELECT id, nombre, email, fecha_registro FROM usuarios";
?>
<?php if($stmt = $pdo->prepare($sql)): ?> 
<?php if($stmt->execute()): ?>
    <?php if($stmt->rowCount() > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Registro</th>
            </tr>
                <?php  while($row = $stmt->fetch()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['fecha_registro']; ?></td>
                        <td><a href="modificar_usuario_pdo.php?id=<?= $row['id'] ?>">Modificar</a></td>
                        <td><a href="eliminar_usuario_pdo.php?id=<?= $row['id'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?>
        </table>
    <?php else: ?>
        <h2>No se encontraron registros.</h2>
    <?php endif ?>
<?php else: ?>
    <?php echo "ERROR: No se pudo ejecutar $sql. " . $stmt->errorInfo()[2]; ?>
<?php endif ?>
<?php endif ?>
<?php 
unset($stmt);
unset($pdo); 
?>