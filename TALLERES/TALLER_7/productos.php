<?php
session_start();
$_SESSION['usuario'] = "Consumidor";
$productos = file_get_contents('productos.json');
$productos = json_decode($productos,true)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Productos en venta</h1>
    <table>
        <thead>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad a añadir</th>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <form action="agregar_al_carrito.php" method="post">
                    <tr>
                        <td><?php echo $producto['nombre'] ?></td>
                        <input type="hidden" name="nombreProducto" value="<?php echo $producto['nombre'] ?>">
                        <td><?php echo $producto['precio'] ?></td>
                        <input type="hidden" name="precioProducto" value="<?php echo $producto['precio'] ?>">
                        <td><input type="number" min="1" name="cantidadProducto" required></td>
                        <td><button name="btnAñadir">Añadir al carrito</button></td>
                    </tr>
                </form>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br/>
    <a href="ver_carrito.php">Ver mi carrito</a>
</body>

</html>