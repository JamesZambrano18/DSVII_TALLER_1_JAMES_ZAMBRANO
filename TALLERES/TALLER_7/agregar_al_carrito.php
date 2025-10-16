<?php
session_start();

function DatosProducto()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $producto = $_POST['nombreProducto'];
        $cantidad = $_POST['cantidadProducto'];
        $precio = $_POST['precioProducto'];

        return [
            'nombre' => $producto,
            'cantidad' => $cantidad,
            'precio' => $precio
        ];
    }


}

function agregarProductoCarrito()
{
    if (file_exists('carrito.json')) {
        $producto[] = DatosProducto();
        $data = file_get_contents('carrito.json');
        $tempArray = json_decode($data);
        array_push($tempArray, $producto);
        $productoJson = json_encode($producto);
        file_put_contents('carrito.json', $productoJson);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_SESSION['usuario'])): ?>
        <h2>Produco añadido correctamente!</h2>
        <br>
        <table>
            <thead>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
            </thead>
            <tbody>
                <tr>
                    <?php $producto[] = DatosProducto(); ?>
                    <?php foreach ($producto as $dato): ?>
                        <td><?php echo $dato['nombre']; ?></td>
                        <td><?php echo $dato['cantidad']; ?></td>
                        <td><?php echo $dato['precio']; ?></td>
                    <?php endforeach; ?>
                    <?php agregarProductoCarrito(); ?>
                </tr>
            </tbody>
        </table>
        <br>
        <a href="productos.php">Seguir comprando</a>
        <a href="checkout.php">Realizar pago</a>
    <?php else: ?>
        <h2>"No has iniciado sesión."</h2>
        <a href="productos.php">Regresar</a>
    <?php endif; ?>
</body>

</html>