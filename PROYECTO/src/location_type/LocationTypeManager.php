<?php
class LocationTypeManager {
    private $db;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllLocationTypes() {
        $stmt = $this->db->query("SELECT * FROM location_type");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}