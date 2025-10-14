<?php
session_start();

if(isset($_SESSION['usuario'])) {
    echo "hola ". htmlspecialchars($_SESSION['usuario']).", así se ve tu carrito";
} else {
    echo "No has iniciado sesión.";
}
?>