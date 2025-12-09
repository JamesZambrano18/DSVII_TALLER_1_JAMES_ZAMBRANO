<?php 
// Iniciamos el buffer de salida
ob_start(); 
?>
<div class="task-form">
    <h2>Agregar una nueva ruta</h2>
    <form action="../routes/create" method="post">
        <div>Código de bus</div>
        <div><input type="text" name="bus_id" placeholder="código del bus" required></div>
        <div>Salida</div>
        <div><input type="text" name="departure_location" placeholder="sitio de partida" required></div>
        <div>Llegada</div>
        <div><input type="text" name="arrival_location" placeholder="sitio de llegada" required></div>
        <button type="submit" class="btn">Agregar</button>
    </form>
    <br>
    <a href="<?= BASE_URL ?>routes" class="btn">Volver</a>
</div>
<?php
// Guardamos el contenido del buffer en la variable $content
$content = ob_get_clean();
// Incluimos el layout
require '../../views/layout.php';
?>