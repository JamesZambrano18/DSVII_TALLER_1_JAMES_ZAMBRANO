<?php
class BussesManager {
    private $db;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllBusses() {
        $stmt = $this->db->query("SELECT b.*, h.schedule_code
        FROM busses As b
        JOIN schedules AS h ON b.schedule_id = h.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para crear una nueva tarea
    public function createBus($bus) {
        $stmt = $this->db->prepare("INSERT INTO busses (bus_code, schedule_id) VALUES (?,?)");
        $payload = [
            $bus->bus_code,
            $bus->schedule_id,
        ]; 
        return $stmt->execute($payload);
    }

    // Método para eliminar una tarea
    public function deleteBus($id) {
        $stmt = $this->db->prepare("DELETE FROM busses WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getBusById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM busses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Metodo para actualizar info de bus
    public function updateBus($bus) {
        $stmt = $this->db->prepare("UPDATE busses SET bus_code=?, schedule_id=? WHERE id =?");
        $payload = [
            $bus->bus_code,
            $bus->schedule_id,
            $bus->id
        ];
        return $stmt->execute($payload);
    }
}