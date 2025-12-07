<?php
ob_start();
?>
<div class="task-list">
    <h2>Lista de usuarios</h2>
    <a href="users/create" class="btn">Nuevo usuario</a>
    <table class="user-table">
        <thead>
            <tr>
                <th>Mail</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Bus</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['mail']) ?></td>
                    <td><?= htmlspecialchars($user['first_name'] ?? '' )?></td>
                    <td><?= htmlspecialchars($user['last_name'] ?? '' )?></td>
                    <td><?= htmlspecialchars($user['role_id'] ?? '' )?></td>
                    <td><?= htmlspecialchars($user['bus_id'] ?? '' )?></td>
                    <td><a href="<?= BASE_URL ?>users/update/<?= $user['id'] ?>" class="btn">✎</a></td>
                    <td><a href="<?= BASE_URL ?>users/delete/<?= $user['id'] ?>" class="btn" onclick="return confirm('¿Eliminar este usuario?')">🗑</a></td>
                </tr>
            <?php endforeach; ?>
    </table>
</div>
<?php
$content = ob_get_clean();
require '../../views/layout.php'; 
?>