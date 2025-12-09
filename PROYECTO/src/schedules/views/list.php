<?php
ob_start();
?>
<div class="task-list">
    <h2>Lista de horarios</h2>
    <a href="schedules/create" class="btn">Agregar nuevo horario</a>
    <table class="user-table">
        <thead>
            <tr>
                <th>Codigo de horario</th>
                <th>Turno</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
                <tr>
                    <td><?= htmlspecialchars($schedule['schedule_code']) ?></td>
                    <td><?= htmlspecialchars($schedule['shift'] ?? '' )?></td>
                    <td><a href="<?= BASE_URL ?>schedules/update/<?= $schedule['id'] ?>" class="btn">✎</a></td>
                    <td><a href="<?= BASE_URL ?>schedules/delete/<?= $schedule['id'] ?>" class="btn" onclick="return confirm('¿Eliminar este horario?')">🗑</a></td>
                </tr>
            <?php endforeach; ?>
    </table>
</div>
<?php
$content = ob_get_clean();
require '../../views/layout.php'; 
?>