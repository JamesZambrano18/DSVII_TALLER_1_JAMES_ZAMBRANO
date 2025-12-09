<?php 
// Iniciamos el buffer de salida
ob_start(); 
?>
<div class="task-form">
    <h2>Editar informacion del usuario</h2>
    <form action="<?= BASE_URL ?>routes/update/<?= $route['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $route['id'] ?>">
        <div>Bus code</div>
        <div><input type="text" name="bus_id" value="<?= htmlspecialchars($route['bus_id']) ?>" required></div>
        <div>Departure Location</div>
        <div><input type="text" name="departure_location" value="<?= htmlspecialchars($route['departure_location']) ?>" required></div>
        <div>Arrival Location</div>
        <div><input type="text" name="arrival_location" value="<?= htmlspecialchars($route['arrival_location']) ?>" required></div>
        <button type="submit" class="btn">Guardar cambios</button>
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