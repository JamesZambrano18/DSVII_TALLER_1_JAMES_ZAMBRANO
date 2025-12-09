<?php 
// Iniciamos el buffer de salida
ob_start(); 
?>
<div class="task-form">
    <h2>Agregar un nuevo horario</h2>
    <form action="../schedules/create" method="post">
        <div>Código de horario</div>
        <div><input type="text" name="schedule_code" placeholder="código de horario" required></div>
        <div>Tipo de turno</div>
        <div>
            <select class="form-select" name="shift_id" required>
                <option value="" disabled selected>Seleccione el turno en el que transcurre el horario</option>
                <option value="1">Matutino</option>
                <option value="2">Vespertino</option>
                <option value="3">Nocturno</option>
            </select>
        </div>
        <button type="submit" class="btn">Agregar</button>
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