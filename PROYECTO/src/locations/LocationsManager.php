<?php
class LocationsManager {
    private $db;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllLocations() {
        $stmt = $this->db->query("SELECT * FROM locations");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para crear una nueva tarea
    public function createLocation($district, $street, $location_type) {
        $stmt = $this->db->prepare("INSERT INTO locations (district, street, location_type) VALUES (?,?,?)");
        return $stmt->execute([$district, $street, $location_type]);
    }

    // Método para eliminar una tarea
    public function deleteLocation($id) {
        $stmt = $this->db->prepare("DELETE FROM locations WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Metodo para modificar una localizacion
    public function updateLocation($district, $street, $location_type, $id) {
        $stmt = $this->db->prepare("UPDATE locations SET (district, street, location_type) VALUES (?,?,?) WHERE id =?");
        return $stmt->execute([$district, $street, $location_type, $id]);
    }

}