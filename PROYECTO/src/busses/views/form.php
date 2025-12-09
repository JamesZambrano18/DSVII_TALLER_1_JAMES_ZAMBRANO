<?php 
// Iniciamos el buffer de salida
ob_start(); 
?>
<div class="task-form">
    <h2>Agregar un nuevo bus</h2>
    <form action="../busses/create" method="post">
        <div>Código de bus</div>
        <div><input type="text" name="bus_code" placeholder="código del nuevo bus" required></div>
        <div>Codigo de horario</div>
        <div><input type="text" name="schedule_id" placeholder="código del horario del bus" required></div>
        <button type="submit" class="btn">Agregar</button>
    </form>
    <br>
    <a href="<?= BASE_URL ?>busses" class="btn">Volver</a>
</div>
<?php
// Guardamos el contenido del buffer en la variable $content
$content = ob_get_clean();
// Incluimos el layout
require '../../views/layout.php';
?>