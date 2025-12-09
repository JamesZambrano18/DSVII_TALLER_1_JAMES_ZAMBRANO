<?php
ob_start();
?>
<div class="task-list">
    <h2>Lista de localizaciones</h2>
    <a href="locations/create" class="btn">Agregar nueva localizacion</a>
    <table class="user-table">
        <thead>
            <tr>
                <th>Distrito</th>
                <th>Calle</th>
                <th>Tipo de localizacion</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
                <tr>
                    <td><?= htmlspecialchars($location['district']) ?></td>
                    <td><?= htmlspecialchars($location['street'] ?? '' )?></td>
                    <td><?= htmlspecialchars($location['location_type'] ?? '' )?></td>
                    <td><a href="<?= BASE_URL ?>locations/update/<?= $location['id'] ?>" class="btn">✎</a></td>
                    <td><a href="<?= BASE_URL ?>locations/delete/<?= $location['id'] ?>" class="btn" onclick="return confirm('¿Eliminar esta localización?')">🗑</a></td>
                </tr>
            <?php endforeach; ?>
    </table>
</div>
<?php
$content = ob_get_clean();
require '../../views/layout.php'; 
?>