<?php
ob_start();
?>
<div class="task-list">
    <h2>Lista de buses</h2>
    <a href="busses/create" class="btn">Agregar nuevo bus</a>
    <table class="user-table">
        <thead>
            <tr>
                <th>Codigo de bus</th>
                <th>Código de horario</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($busses as $bus): ?>
                <tr>
                    <td><?= htmlspecialchars($bus['bus_code']) ?></td>
                    <td><?= htmlspecialchars($bus['schedule_code'] ?? '' )?></td>
                    <td><a href="<?= BASE_URL ?>busses/update/<?= $bus['id'] ?>" class="btn">✎</a></td>
                    <td><a href="<?= BASE_URL ?>busses/delete/<?= $bus['id'] ?>" class="btn" onclick="return confirm('¿Eliminar este bus?')">🗑</a></td>
                </tr>
            <?php endforeach; ?>
    </table>
</div>
<?php
$content = ob_get_clean();
require '../../views/layout.php'; 
?>