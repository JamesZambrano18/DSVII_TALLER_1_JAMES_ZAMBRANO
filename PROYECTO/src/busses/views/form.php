<?php 
// Iniciamos el buffer de salida
ob_start(); 
?>
<div class="task-form">
    <h2>Agregar un nuevo bus</h2>
    <form action="../busses/create" method="post">
        <div>Código de bus</div>
        <div><input type="text" name="bus_code" placeholder="código del nuevo bus" required></div>
        <div>Código de horario</div>
        <div>
            <select name="schedule_id" class="form-select" required>
                <option value="" disabled>Seleccione un horario</option>
                <?php foreach ($scheduleList as $schedule): ?>
                    <option value="<?= $schedule['id'] ?>"><?= htmlspecialchars($schedule['schedule_code']) ?></option>   
                <?php endforeach; ?>
            </select>
        </div>
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