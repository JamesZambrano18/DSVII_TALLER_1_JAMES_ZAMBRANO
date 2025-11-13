<?php
require_once "config_mysqli.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    //$sql = "UPDATE usuarios SET nombre = '$nombre', email = '$email' WHERE id = '$id'";
    $sql = "UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "ssi", $nombre, $email,$id);
        
        if(mysqli_stmt_execute($stmt)){
            echo "Usuario Modificad0 con éxito.";
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: leer_usuarios_mysqli.php");
        } else{
            echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($conn);
        }
    }
    
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>