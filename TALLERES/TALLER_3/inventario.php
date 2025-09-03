<?php

function obtenerInventario()
{
    $inventario = file_get_contents("inventario.json");

    $inventario = json_decode($inventario, true);
    return $inventario;
}

function ordenarInventario($arrayInv)
{
    usort($arrayInv, function ($a, $b) {
        return $a['nombre'] <=> $b['nombre'];
    });
    return $arrayInv;
}

function mmostrarInventario($arrayInv)
{
    foreach ($arrayInv as $objeto) {
        echo "Producto: {$objeto['nombre']} Precio: {$objeto['precio']} Cantidad: {$objeto['cantidad']}\n";
    }
}

function sumarInventario($arrayInv) {
    $totalInventario = array_sum(array_map(function($objeto){
        return $objeto['precio'] * $objeto['cantidad'];
    }, $arrayInv));
    return $totalInventario;
}

function bajoStock($arrayInv){
    $pocoProducto = array_filter($arrayInv, function($objeto){
        return $objeto['cantidad'] < 5;
    });
    return $pocoProducto;
}

//area de prints
echo "--------------------------Inventario--------------------------\n";
$arrayInventario = obtenerInventario();
$arrayInventario = ordenarInventario($arrayInventario);
$valorTotal = sumarInventario($arrayInventario);
$productosBajoStock = bajoStock($arrayInventario);
$arrayInventario = mmostrarInventario($arrayInventario);
echo "--------------------------------------------------------------\n";
echo "Valor total del inventario = $valorTotal\n";
echo "\n-------------------Productos bajo en stock--------------------\n";
foreach ($productosBajoStock as $producto) {
    echo "Producto: {$producto['nombre']} Precio: {$producto['precio']} Cantidad: {$producto['cantidad']}\n";
}
?>