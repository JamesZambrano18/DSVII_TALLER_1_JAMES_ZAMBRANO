<?php
echo "Triangulo rectangulo<br>";
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

echo "<br>";
echo "Mostrando secuencia de numeros impares del 1 al 20<br>";
$numero = 1;

while ($numero <= 20) {
    if ($numero % 2 != 0) {
        echo "$numero ";
    }
    $numero++;
}

echo "<br>";
echo "<br>";
echo "Cuenta regresiva del 10 al 1 saltandose el 5<br>";
$numero = 10;
do {  
    if ($numero != 5) {
        echo "$numero ";
    }
    $numero--;
} while ($numero > 0);  
?>