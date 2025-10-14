<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto = $_POST['$producto'];
    $cantidad = $_POST['cantidadProducto'];
    $precio = $_POST['$precio'];
}

echo "producto: " .$producto. " ; Cantidad: " .$cantidad. " ; Precio: B/." .$precio;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="https://i.pinimg.com/originals/5e/66/34/5e66349c7bcd491906ba23f2650dc3e7.jpg" alt="bola">
    <h1>Produco añadido correctamente!</h1>
    <p></p>
</body>
</html>