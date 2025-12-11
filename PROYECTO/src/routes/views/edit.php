<?php
// Iniciamos el buffer de salida
ob_start();
?>
<div class="task-form">
    <h2>Editar informacion del usuario</h2>
    <form action="<?= BASE_URL ?>routes/update/<?= $route['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $route['id'] ?>">
        <div>Bus code</div>
        <div>
            <select name="bus_id" class="form-select" required>
                <option value="" disabled selected>Seleccione un bus</option>
                <?php foreach ($busList as $bus): ?>
                    <option value="<?= $bus['id'] ?>" <?= $bus['id'] == $route['bus_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($bus['bus_code']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>Salida</div>
        <div>
            <select name="departure_location" class="form-select" required>
                <option value="" disabled>Select departure</option>
                <?php foreach ($locationList as $location): ?>
                    <?php if ($location['location_type_id'] == 1): ?>
                        <option value="<?= $location['id'] ?>" <?= $location['id'] == $route['departure_location'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($location['district'] . " - " . $location['street']) ?>
                        </option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <div>Llegada</div>
        <div>
            <select name="arrival_location" class="form-select" required>
                <option value="" disabled>Select arrival</option>
                <?php foreach ($locationList as $location): ?>
                    <?php if ($location['location_type_id'] == 2): ?>
                        <option value="<?= $location['id'] ?>" <?= $location['id'] == $route['arrival_location'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($location['district'] . " - " . $location['street']) ?>
                        </option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
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