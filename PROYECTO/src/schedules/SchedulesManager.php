<?php
class SchedulesManager {
    private $db;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllSchedules() {
        $stmt = $this->db->query("SELECT * FROM schedules");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para crear una nueva tarea
    public function createSchedules($schedule) {
        $stmt = $this->db->prepare("INSERT INTO schedules (schedule_code, shift_id) VALUES (?,?)");
        return $stmt->execute([
            'schedule_code' => $schedule->mail,
            'shift_id' => $schedule->password,

        ]);
    }

    // Método para eliminar una tarea
    public function deleteSchedules($id) {
        $stmt = $this->db->prepare("DELETE FROM schedules WHERE id = ?");
        return $stmt->execute([$id]);
    }
}