<?php 
// Iniciamos el buffer de salida
ob_start(); 
?>
<div class="task-form">
    <h2>Agregar una nueva localización</h2>
    <form action="../locations/create" method="post">
        <div>Distrito</div>
        <div><input type="text" name="district" placeholder="código del bus" required></div>
        <div>Calle</div>
        <div><input type="text" name="street" placeholder="sitio de partida" required></div>
        <div>Tipo de localizacion</div>
        <div>
            <select class="form-select" name="location_type_id" required>
                <option value="" disabled selected>Seleccione el tipo de localizacion</option>
                <option value="1">Salida</option>
                <option value="2">Llegada</option>
            </select>
        </div>
        <button type="submit" class="btn">Agregar</button>
    </form>
    <br>
    <a href="<?= BASE_URL ?>locations" class="btn">Volver</a>
</div>
<?php
// Guardamos el contenido del buffer en la variable $content
$content = ob_get_clean();
// Incluimos el layout
require '../../views/layout.php';
?>