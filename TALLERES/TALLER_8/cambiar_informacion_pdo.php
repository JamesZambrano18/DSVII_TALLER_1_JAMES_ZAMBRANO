<?php
require_once "config_pdo.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    
    //$sql = "UPDATE usuarios SET nombre = '$nombre', email = '$email' WHERE id = '$id'";
    $sql = "UPDATE usuarios SET nombre = :nombre, email = :email WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        if($stmt->execute()){
            $row = $stmt->fetch();
            unset($stmt);
            unset($pdo);
            header("Location: leer_usuarios_pdo.php");
        } else{
            echo "ERROR: No se pudo ejecutar $sql. " . $stmt->errorInfo()[2];
        }
    }
    
    unset($stmt);
}
unset($pdo);
?>