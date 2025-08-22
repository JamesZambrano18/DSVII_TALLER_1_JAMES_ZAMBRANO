<?php
$nombre_completo = "James Zambrano";
$edad = 22;
$correo = "james.zambrano1@utp.ac.pa";
$telefono = "6161-0258";

define( "OCUPACION", "Estudiante");

echo "Hola,  mi nombre es $nombre_completo <br> Tengo $edad años de edad <br>";
print("Se me puede contactar por medio de mi correo ".$correo. " <br> O por mi telefeno ".$telefono." <br>");
printf( "Actualmente soy un %s de la UTP", OCUPACION);

echo "<br><br>Debugging<br>";
var_dump($nombre_completo);
echo "<br>";
var_dump($edad);
echo "<br>";
var_dump($correo);
echo "<br>";
var_dump($telefono);
echo "<br>";
var_dump(OCUPACION);
?>