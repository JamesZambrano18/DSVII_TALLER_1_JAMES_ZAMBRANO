<?php
class RoutesManager {
    private $db;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllRoutes() {
        $stmt = $this->db->query("SELECT * FROM routes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para crear una nueva tarea
    public function createRoutes($bus_id, $departure_location, $arrival_location) {
        $stmt = $this->db->prepare("INSERT INTO routes (bus_id, departure_location, arrival_location) VALUES (?,?,?)");
        return $stmt->execute([$bus_id, $departure_location, $arrival_location]);
    }

    // Método para eliminar una tarea
    public function deleteRoutes($id) {
        $stmt = $this->db->prepare("DELETE FROM routes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Metodo para modificar una localizacion
    public function updateRoutes($bus_id, $departure_location, $arrival_location, $id) {
        $stmt = $this->db->prepare("UPDATE routes SET (bus_id, departure_location, arrival_location) VALUES (?,?,?) WHERE id =?");
        return $stmt->execute([$bus_id, $departure_location, $arrival_location, $id]);
    }
}