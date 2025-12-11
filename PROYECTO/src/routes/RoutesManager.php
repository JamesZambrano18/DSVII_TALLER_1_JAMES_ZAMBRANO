<?php
class RoutesManager {
    private $db;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllRoutes() {
        $stmt = $this->db->query("SELECT r.*, b.bus_code, l.district, l.street, l2.district AS arrival_district, l2.street As arrival_street
        FROM routes AS r
        JOIN busses AS b ON r.bus_id = b.id
        JOIN locations AS l ON r.departure_location = l.id 
        JOIN locations AS l2 ON r.arrival_location = l2.id")
        ;
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para crear una nueva tarea
    public function createRoutes($route) {
        $stmt = $this->db->prepare("INSERT INTO routes (bus_id, departure_location, arrival_location) VALUES (?,?,?)");
        $payload = [
            $route->bus_id,
            $route->departure_location,
            $route->arrival_location
        ];
        return $stmt->execute($payload);
    }

    // Método para eliminar una tarea
    public function deleteRoutes($id) {
        $stmt = $this->db->prepare("DELETE FROM routes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getRouteById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM routes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllBusses()
    {
        $stmt = $this->db->query("SELECT id, bus_code FROM busses");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllLocations()
    {
        $stmt = $this->db->query("SELECT * FROM locations");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metodo para modificar una localizacion
    public function updateRoute($route) {
        $stmt = $this->db->prepare("UPDATE routes SET bus_id=?, departure_location=?, arrival_location=? WHERE id =?");
        $payload = [
            $route->bus_id,
            $route->departure_location,
            $route->arrival_location,
            $route->id
        ];
        return $stmt->execute($payload);
    }
}