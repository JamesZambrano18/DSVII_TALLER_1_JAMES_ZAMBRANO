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
        <div><input type="text" name="phone_number" value="<?= htmlspecialchars($user['phone_number']) ?>" required></div>
        <div>Rol</div>
        <div><input type="text" name="role_id"  value="<?= htmlspecialchars($user['role_id']) ?>" required disabled></div>
        <div><input type="hidden" name="role_id" value="<?= htmlspecialchars($user['role_id']) ?>" required></div>
        <div>Código de bus</div>
        <div><input type="text" name="bus_id" value="<?= htmlspecialchars($user['bus_id']) ?>" required></div>
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