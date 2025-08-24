<?php
require 'includes/funciones.php';
include 'includes/header.php';
?>

<h2>Libros disponibles</h2>
<?php
$libros = obtenerLibros();
    foreach ($libros as $libro) {
        //echo $libro["titulo"] . "<br>";
        echo mostrarDetallesLibros($libro);
        echo "<br><br>";
        
    }
?>
<?php
include 'includes/footer.php';
?>