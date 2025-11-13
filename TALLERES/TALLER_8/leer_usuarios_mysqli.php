<?php
require_once "config_mysqli.php";
$sql = "SELECT id, nombre, email, fecha_registro FROM usuarios";
$result = mysqli_query($conn, $sql); ?>
<?php if ($result): ?>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Registro</th>
            </tr>
                <?php while ($row = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['fecha_registro']; ?></td>
                        <td><a href="modificar_usuario_mysqli.php?id=<?= $row['id'] ?>">Modificar</a></td>
                        <td><a href="eliminar_usuarios_mysqli.php?id=<?= $row['id'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?>
        </table>
        <?php mysqli_free_result($result); ?>
    <?php else: ?>
        <h2>No se encontraron registros.</h2>
    <?php endif ?>
<?php else: ?>
    <?php echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($conn); ?>
<?php endif ?>
<?php mysqli_close($conn); ?>