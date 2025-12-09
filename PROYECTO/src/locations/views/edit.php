<?php 
// Iniciamos el buffer de salida
ob_start(); 
?>
<div class="task-form">
    <h2>Editar localización</h2>
    <form action="<?= BASE_URL ?>locations/update/<?= $location['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $location['id'] ?>">
        <div>Distrito</div>
        <div><input type="text" name="district" value="<?= htmlspecialchars($location['district']) ?>" required></div>
        <div>Calle</div>
        <div><input type="text" name="street" value="<?= htmlspecialchars($location['street']) ?>" required></div>
        <div>Tipo de localización</div>
        <div>
            <select class="form-select" name="location_type_id" required>
                <option value="" disabled>Seleccione el tipo de localizacion</option>
                <option value="1" <?= $location['location_type_id'] == 1 ? 'selected' : '' ?>>Salida</option>
                <option value="2" <?= $location['location_type_id'] == 2 ? 'selected' : '' ?>>Llegada</option>
            </select>
        </div>
        <button type="submit" class="btn">Guardar cambios</button>
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