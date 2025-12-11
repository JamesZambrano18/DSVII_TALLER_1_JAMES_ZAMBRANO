<?php 
// Iniciamos el buffer de salida
ob_start(); 
?>
<div class="task-form">
    <h2>Editar Informacion del bus</h2>
    <form action="<?= BASE_URL ?>busses/update/<?= $bus['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $bus['id'] ?>">
        <div>Codigo de bus</div>
        <div><input type="text" name="bus_code" value="<?= htmlspecialchars($bus['bus_code']) ?>" required></div>
        <div>Codigo de horario</div>
        <div>
            <select name="schedule_id" class="form-select" required>
                <option value="" disabled>Seleccione un bus</option>
                <?php foreach ($scheduleList as $schedule): ?>
                    <option value="<?= $schedule['id'] ?>" <?= $schedule['id'] == $bus['schedule_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($schedule['schedule_code']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn">Guardar cambios</button>
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