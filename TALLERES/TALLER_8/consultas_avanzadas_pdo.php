<?php
require_once "config_pdo.php";

try {
    // 1. Mostrar todos los usuarios junto con el número de publicaciones que han hecho
    $sql = "SELECT u.id, u.nombre, COUNT(p.id) as num_publicaciones 
            FROM usuarios u 
            LEFT JOIN publicaciones p ON u.id = p.usuario_id 
            GROUP BY u.id";

    $stmt = $pdo->query($sql);

    echo "<h3>Usuarios y número de publicaciones:</h3>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Usuario: " . $row['nombre'] . ", Publicaciones: " . $row['num_publicaciones'] . "<br>";
    }


    // 2. Listar todas las publicaciones con el nombre del autor
    $sql = "SELECT p.titulo, u.nombre as autor, p.fecha_publicacion 
            FROM publicaciones p 
            INNER JOIN usuarios u ON p.usuario_id = u.id 
            ORDER BY p.fecha_publicacion DESC";

    $stmt = $pdo->query($sql);

    echo "<h3>Publicaciones con nombre del autor:</h3>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Título: " . $row['titulo'] . ", Autor: " . $row['autor'] . ", Fecha: " . $row['fecha_publicacion'] . "<br>";
    }


    // 3. Encontrar el usuario con más publicaciones
    $sql = "SELECT u.nombre, COUNT(p.id) as num_publicaciones 
            FROM usuarios u 
            LEFT JOIN publicaciones p ON u.id = p.usuario_id 
            GROUP BY u.id 
            ORDER BY num_publicaciones DESC 
            LIMIT 1";

    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<h3>Usuario con más publicaciones:</h3>";
    echo "Nombre: " . $row['nombre'] . ", Número de publicaciones: " . $row['num_publicaciones'];


    //4. Ultimas 5 publicaiciones
    $sql = "SELECT p.titulo, u.nombre as autor, p.fecha_publicacion 
        FROM publicaciones p 
        INNER JOIN usuarios u ON p.usuario_id = u.id 
        ORDER BY p.fecha_publicacion DESC";

$stmt = $pdo->query($sql);

if ($stmt->execute()) {
    echo "<h3>Ultimas 5 publicaciones:</h3>";
    for ($i = 0; $i < 5; $i++) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "Título: " . $row['titulo'] . ", Autor: " . $row['autor'] . ", Fecha: " . $row['fecha_publicacion'] . "<br>";
    }
    unset($stmt);
} else {
    echo "ERROR: No se pudo ejecutar $sql. " . $stmt->errorInfo()[2];
}


//5. Usuarios sin publiacciones
$sql = "SELECT u.id, u.nombre, COUNT(p.id) as num_publicaciones 
        FROM usuarios u 
        LEFT JOIN publicaciones p ON u.id = p.usuario_id
        GROUP BY u.id
        HAVING COUNT(p.id) = 0";

$stmt = $pdo->query($sql);

if ($stmt->execute()) {
    echo "<h3>Usuarios sin publicaciones:</h3>";
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "Usuario: " . $row['nombre'] . "<br>";
        }
        unset($stmt);
    } else {
       echo "ERROR: No se pudo ejecutar $sql. " . $stmt->errorInfo()[2];
    }
} else {
    echo "No se encontraron usuarios sin publicaciones.";
}


//6. Promedio de publicaciones por usuario
$sql = "SELECT u.id, u.nombre, COUNT(p.id) as num_publicaciones
        FROM usuarios u 
        LEFT JOIN publicaciones p ON u.id = p.usuario_id
        GROUP BY u.id";

$stmt = $pdo->query($sql);
if ($stmt->execute()) {
    echo "<h3>Promedio de publicaciones por usuario:</h3>";
    if ($stmt->rowCount() > 0) {
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $total_publicaciones = 0;
        foreach ($rows as $row) {
            $total_publicaciones += $row['num_publicaciones'];
        }
        echo "Total publicaciones: ".$total_publicaciones."<br>";

        foreach ($rows as $row) {
            $promedio = $row['num_publicaciones'] / $total_publicaciones;
            echo "Usuario: " . $row['nombre'] ." Publicaciones: ".$row['num_publicaciones']. " Promedio de publicaciones: ".$promedio."<br>";
        }
        unset($stmt);
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . $stmt->errorInfo()[2];
    }
} else {
    echo "No se encontraron usuarios.";
}


//7. Publicacion mas recientes por usuario
$sql = "SELECT u.id, u.nombre, p.titulo, p.fecha_publicacion
        FROM usuarios u
        LEFT JOIN publicaciones p ON u.id = p.usuario_id
        WHERE p.fecha_publicacion = (
            SELECT MAX(p2.fecha_publicacion)
            FROM publicaciones p2
            WHERE p2.usuario_id = u.id
        )";
$stmt = $pdo->query($sql);

if ($stmt->execute()) {
    echo "<h3>Publicación más reciente por usuario:</h3>";
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Usuario: " . $row['nombre'] . ", Título: " . $row['titulo'] . ", Fecha: " . $row['fecha_publicacion'] . "<br>";
    }
    } else {
        echo "No se encontraron publicaciones.";
    }
    unset($stmt);
} else {
    echo "ERROR: No se pudo ejecutar $sql. " . $stmt->errorInfo()[2];
}

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>