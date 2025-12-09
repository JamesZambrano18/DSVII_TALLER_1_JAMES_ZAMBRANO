<?php 
// Iniciamos el buffer de salida
ob_start(); 
?>
<div class="task-form">
    <h2>Editar horario</h2>
    <form action="<?= BASE_URL ?>schedules/update/<?= $schedules['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $schedules['id'] ?>">
        <div>Codigo de horarios</div>
        <div><input type="text" name="schedule_code" value="<?= htmlspecialchars($schedules['schedule_code']) ?>" required></div>
        <div></div>
        <div>
            <select class="form-select" name="shift_id" required>
                <option value="" disabled>Seleccione el turno en el que transcurre el horario</option>
                <option value="1" <?= $schedules['shift_id'] == 1 ? 'selected' : '' ?>>Matutino</option>
                <option value="2" <?= $schedules['shift_id'] == 2 ? 'selected' : '' ?>>Vespertino</option>
                <option value="3" <?= $schedules['shift_id'] == 3 ? 'selected' : '' ?>>Nocturno</option>
            </select>
        </div>
        <button type="submit" class="btn">Guardar cambios</button>
    </form>
    <br>
    <a href="<?= BASE_URL ?>schedules" class="btn">Volver</a>
</div>
<?php
// Guardamos el contenido del buffer en la variable $content
$content = ob_get_clean();
// Incluimos el layout
require '../../views/layout.php';
?>