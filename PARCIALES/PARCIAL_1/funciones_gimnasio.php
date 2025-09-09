<?php
function calcular_promocion($antiguedad_meses, $cuota_base){
    if($antiguedad_meses < 3){
        $descuento = $cuota_base * 0;

    } elseif($antiguedad_meses >= 3 && $antiguedad_meses <= 12){
        $descuento = $cuota_base * 0.08;
        
    }elseif($antiguedad_meses >= 13 && $antiguedad_meses <= 24){
        $descuento = $cuota_base * 0.12;

    }elseif($antiguedad_meses > 24){
        $descuento = $cuota_base * 0.20;

    }
    return $descuento;
}

function calcular_seguro_medico($cuota_base){
    $costo_seguro = $cuota_base * 0.05;

    return $costo_seguro;
}

function calcular_cuota_final($cuota_base, $descuento, $seguro_medico){
    $costo_total = $cuota_base - $descuento + $seguro_medico;
    return $costo_total;
}
?>