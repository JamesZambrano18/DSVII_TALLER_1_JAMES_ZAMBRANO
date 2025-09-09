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
    foreach ($palabras as $palabra) {
        strtoupper(substr($palabra,0,1) . substr($palabra,1));
    }
    return implode(" ", $palabras);
}
