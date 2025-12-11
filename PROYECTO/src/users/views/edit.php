<?php
// Iniciamos el buffer de salida
ob_start();
?>
<div class="task-form">
    <h2>Editar informacion del usuario</h2>
    <form action="<?= BASE_URL ?>users/update/<?= $user['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <div>Correo</div>
        <div><input type="email" name="mail" value="<?= htmlspecialchars($user['mail']) ?>" required></div>
        <div><input type="hidden" name="pass" value="<?= htmlspecialchars($user['pass']) ?>" required></div>
        <div>Nombre</div>
        <div><input type="text" name="first_name" value="<?= htmlspecialchars($user['first_name']) ?>" required></div>
        <div>Apellido</div>
        <div><input type="text" name="last_name" value="<?= htmlspecialchars($user['last_name']) ?>" required></div>
        <div>Telefono</div>
        <div><input type="text" name="phone_number" value="<?= htmlspecialchars($user['phone_number']) ?>" required>
        </div>
        <div>Rol</div>
        <div>
            <select name="role_id" class="form-select" required>
                <option value="" disabled>Seleccione un bus</option>
                <?php foreach ($rolesList as $role): ?>
                    <option value="<?= $role['id'] ?>" <?= $role['id'] == $user['role_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($role['rol']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>Código de bus</div>
        <div>
            <select name="bus_id" class="form-select" required>
                <option value="" disabled>Seleccione un bus</option>
                <?php foreach ($busList as $bus): ?>
                    <option value="<?= $bus['id'] ?>" <?= $bus['id'] == $user['bus_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($bus['bus_code']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn">Guardar cambios</button>
    </form>
    <br>
    <a href="<?= BASE_URL ?>users" class="btn">Volver</a>
</div>
<?php
// Guardamos el contenido del buffer en la variable $content
$content = ob_get_clean();
// Incluimos el layout
require '../../views/layout.php';
?>