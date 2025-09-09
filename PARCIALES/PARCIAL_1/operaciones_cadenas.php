<?php
function contar_palabras_repetidas($texto)
{
    strtolower($texto);
    $palabras = explode(" ", $texto);
    foreach ($palabras as $palabra) {
        $contador = 1;

    }
}

function capitalizar_palabras($texto)
{
    strtolower($texto);
    $palabras = explode(" ", $texto);
    for ($i = 0; $i < count($palabras); $i++) {
        strtoupper(substr($palabras[$i],0,1));
    }
    return implode(" ", $palabras);
}
