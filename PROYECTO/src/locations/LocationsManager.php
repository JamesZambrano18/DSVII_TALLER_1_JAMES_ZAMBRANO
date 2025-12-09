<?php
class LocationsManager {
    private $db;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllLocations() {
        $stmt = $this->db->query("SELECT l.*, t.location_type
        FROM locations As l
        JOIN location_type AS t ON l.location_type_id = t.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para crear una nueva tarea
    public function createLocation($locations) {
        $stmt = $this->db->prepare("INSERT INTO locations (district, street, location_type_id) VALUES (?,?,?)");
        $payload = [
            $locations->district,
            $locations->street,
            $locations->location_type_id
        ];
        return $stmt->execute($payload);
    }

    // Método para eliminar una tarea
    public function deleteLocation($id) {
        $stmt = $this->db->prepare("DELETE FROM locations WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getLocationById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM locations WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Metodo para modificar una localizacion
    public function updateLocation($location) {
        $stmt = $this->db->prepare("UPDATE locations SET district=?, street=?, location_type_id=? WHERE id =?");
        $payload = [
            $location->district,
            $location->street,
            $location->location_type_id,
            $location->id
        ];
        return $stmt->execute($payload);
    }

}