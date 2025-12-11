<?php 
// Iniciamos el buffer de salida
ob_start(); 
?>
<div class="task-form">
    <h2>Crear Nuevo usuario</h2>
    <form action="../users/create" method="post">
        <div>Correo</div>
        <div><input type="email" name="mail" placeholder="correo electronico" required></div>
        <div>Contraseña</div>
        <div><input type="password" name="pass" required></div>
        <div>Nombre</div>
        <div><input type="text" name="first_name" placeholder="Su nombre" required></div>
        <div>Apellido</div>
        <div><input type="text" name="last_name" placeholder="Su apellido" required></div>
        <div>Telefono</div>
        <div><input type="text" name="phone_number" placeholder="9999-9999" required></div>
        <div>Rol</div>
        <div>
            <select class="form-select" name="role_id" required>
                <option value="" disabled selected>Seleccione un rol</option>
                <option value="1">Estudiante</option>
                <option value="2">Conductor</option>
                <option value="3">Administrador</option>
            </select>
        </div>
        <div>Código de bus</div>
        <div>
            <select name="bus_id" class="form-select" required>
                <option value="" disabled>Seleccione un bus</option>
                <?php foreach ($busList as $bus): ?>
                    <option value="<?= $bus['id'] ?>"><?= htmlspecialchars($bus['bus_code']) ?></option>   
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn">Crear usuario</button>
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