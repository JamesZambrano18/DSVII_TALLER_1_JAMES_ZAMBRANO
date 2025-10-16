<?php
session_start();
$usuario = $_SESSION['usuario'];
if(isset($usuario)) {

    echo "hola ". htmlspecialchars($usuario).", así se ve tu carrito";
} else {
    echo "No has iniciado sesión.";
}
?>
