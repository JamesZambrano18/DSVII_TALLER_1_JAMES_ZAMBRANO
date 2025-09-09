<?php
include "operaciones_cadenas.php";

$frases = [
    'Frase 1' => 'Dos por Uno es Dos',
    'Frase 2' => 'Ocho por Ocho no es Ocho',
    'Frase 3' => 'Las rosas no son rosas',
    'Frase 4' => 'El vino tinto es un buen vino',
];

foreach ($frases as $clave => $valor) {
    //contar_palabras_repetidas($valor);
    $frases_capitalizadas = capitalizar_palabras($valor);
    print_r($frases_capitalizadas);
}