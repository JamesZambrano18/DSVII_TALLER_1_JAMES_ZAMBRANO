<?php
class BussesManager {
    private $db;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllBusses() {
        $stmt = $this->db->query("SELECT * FROM busses");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para crear una nueva tarea
    public function createBus($bus_code, $schedule_id) {
        $stmt = $this->db->prepare("INSERT INTO busses (bus_code, schedule_id) VALUES (?,?)");
        return $stmt->execute([$bus_code, $schedule_id]);
    }

    // Método para eliminar una tarea
    public function deleteBus($id) {
        $stmt = $this->db->prepare("DELETE FROM schedule WHERE id = ?");
        return $stmt->execute([$id]);
    }

    //Metodo para actualizar info de bus
    public function updateBus($bus_code, $schedule_id, $id) {
        $stmt = $this->db->prepare("UPDATE busses SET (bus_code, schedule_id) VALUES (?,?) WHERE id =?");
        return $stmt->execute([$bus_code, $schedule_id, $id]);
    }
}