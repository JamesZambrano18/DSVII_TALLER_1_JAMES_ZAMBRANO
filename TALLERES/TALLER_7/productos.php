<?php
session_start();
$_SESSION['usuario'] = "Consumidor";

$productos = [
    'Lenteja' => '5.99',
    'chuletas ahumadas' => '6.99',
    'Coca Cola 1L' => '1.20',
    'Queso amarillo gourmet' => '4.50',
    'Carne de res' => '3.00'
];

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
            <?php foreach ($productos as $producto => $precio): ?>
                <form action="agregar_al_carrito.php" method="post">
                    <tr>
                        <td><?php echo $producto ?></td>
                        <td><?php echo $precio ?></td>
                        <td><input type="number" min="1" name="cantidadProducto" placeholder="1"></td>
                        <td><button name="btnAñadir">Añadir al carrito</button></td>
                    </tr>
                </form>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="ver_carrito.php">Ver mi carrito</a>
</body>

</html>