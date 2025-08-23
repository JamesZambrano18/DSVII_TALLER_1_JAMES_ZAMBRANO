<?php
$calificacion = 100;
$mensaje;

if ($calificacion >= 0 && $calificacion <= 100) {

    if ($calificacion >= 90) {
        $calificacion = "A";
    } else if ($calificacion >= 80) {
        $calificacion = "B";
    } else if ($calificacion >= 70) {
        $calificacion = "C";
    } else if ($calificacion >= 60) {
        $calificacion = "D";
    } else if ($calificacion >= 0) { 
        $calificacion = "F";
    } 
    
    $estado = ($calificacion != "F") ? "Aprobado":"Reprobado";
    
    switch ($calificacion) {
        case "A":
            $mensaje = "Excelente trabajo";
            break;
        case "B":
            $mensaje = "Buen trabajo";
            break;
        case "C":
            $mensaje = "Trabajo aceptable";
            break;
        case "D":
            $mensaje = "Necesitas mejorar";
            break;
        case "F":
            $mensaje = "Debes esforzarte mas";
            break;
        default:
            $mensaje = "Calificacion invalida";
    }
    
    echo "Tu calificaion es: $calificacion <br>";
    echo "$estado <br>";
    echo "$mensaje";

} else {
    echo "ERROR: La calificacion ingresada no es valida";
}
?>