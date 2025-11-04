<?php
class ShiftsManager {
    private $db;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllShifts() {
        $stmt = $this->db->query("SELECT * FROM shifts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}