<?php
include "funciones_gimnasio.php";

$tipo_membresia = [
    "basica" => 80,
    "premium" => 120,
    "vip" => 180,
    "familiar" => 250,
    "corporativa" => 300
];

$miembros = [
    'Juan Perez' => ['tipo' => 'premium', 'antiguedad' => '15'],
    'Ana Garcia' => ['tipo' => 'basica', 'antiguedad' => '2'],
    'Carlos Lopez' => ['tipo' => 'vip', 'antiguedad' => '30'],
    'Maria Rodriguez' => ['tipo' => 'familiar', 'antiguedad' => '8'],
    'Luis Martinez' => ['tipo' => 'corporativa', 'antiguedad' => '18']
];

foreach ($miembros as $clave => $miembro) {
    $cuota_inicial = 0;
    $cuota_pagar = 0;
    $descuento_valor = 0;
    $seguro = 0;
    foreach ($tipo_membresia as $tipo => $valor) {
        if ($miembro['tipo'] == $tipo) {
            $cuota_inicial = $valor;
            $descuento_valor = calcular_promocion($miembro['antiguedad'], $valor);
            $seguro = calcular_seguro_medico($valor);
            $cuota_pagar = calcular_cuota_final($valor, $descuento_valor, $seguro);
        }
    }
    echo "Nombre: $clave Membresia: " . $miembro['tipo'] . " Antiguedad: " . $miembro['antiguedad'] . "\n";
    echo "Cuota Base: $cuota_inicial\n";
    echo "Descuento Aplicado: $descuento_valor\n";
    echo "Seguro medico: $seguro\n";
    echo "Total a pagar: $cuota_pagar\n";
    echo "----------------------------------------------------------------------------------------------\n";
}
