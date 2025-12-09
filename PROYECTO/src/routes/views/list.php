<?php
ob_start();
?>
<div class="task-list">
    <h2>Lista de rutas</h2>
    <a href="routes/create" class="btn">Agregar nueva ruta</a>
    <table class="user-table">
        <thead>
            <tr>
                <th>Bus</th>
                <th>Salida</th>
                <th>Llegada</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($routes as $route): ?>
                <tr>
                    <td><?= htmlspecialchars($route['bus_code']) ?></td>
                    <td><?= htmlspecialchars($route['district'] ?? '' ).", ". htmlspecialchars($route['street'] ?? '' )?></td>
                    <td><?= htmlspecialchars($route['arrival_district'] ?? '' ).", ". htmlspecialchars($route['arrival_street'] ?? '' )?></td>
                    <td><a href="<?= BASE_URL ?>routes/update/<?= $route['id'] ?>" class="btn">✎</a></td>
                    <td><a href="<?= BASE_URL ?>routes/delete/<?= $route['id'] ?>" class="btn" onclick="return confirm('¿Eliminar esta ruta?')">🗑</a></td>
                </tr>
            <?php endforeach; ?>
    </table>
</div>
<?php
$content = ob_get_clean();
require '../../views/layout.php'; 
?>