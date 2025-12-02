<?php
require_once "database.php";
$sql = "SELECT id, nombre, categoria, precio, cantidad, fecha_registro FROM productos";
$result = mysqli_query($conn, $sql); ?>
<?php if ($result): ?>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Fecha de Registro</th>
            </tr>
                <?php while ($row = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['categoria']; ?></td>
                        <td>B/.<?php echo $row['precio']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['fecha_registro']; ?></td>
                        <td><a href="editar.php?id=<?= $row['id'] ?>">Modificar</a></td>
                        <td><a href="eliminar.php?id=<?= $row['id'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?>
        </table>
        <br><a href="crear.php">Añadir un producto</a>
        <?php mysqli_free_result($result); ?>
    <?php else: ?>
        <h2>No se encontraron registros.</h2>
    <?php endif ?>
<?php else: ?>
    <?php echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($conn); ?>
<?php endif ?>
<?php mysqli_close($conn); ?>