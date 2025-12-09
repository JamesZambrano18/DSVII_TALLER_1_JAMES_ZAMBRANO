<?php
class SchedulesManager {
    private $db;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllSchedules() {
        $stmt = $this->db->query("SELECT h.*, s.shift
        FROM schedules As h
        JOIN shifts AS s ON h.shift_id = s.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para crear una nueva tarea
    public function createSchedules($schedule) {
        $stmt = $this->db->prepare("INSERT INTO schedules (schedule_code, shift_id) VALUES (?,?)");
        $paylaod = [
            $schedule->schedule_code,
            $schedule->shift_id
        ];
        return $stmt->execute($paylaod);
    }

    // Método para eliminar una tarea
    public function deleteSchedules($id) {
        $stmt = $this->db->prepare("DELETE FROM schedules WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getScheduleById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM schedules WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Metodo para modificar un horario
    public function updateSchedule($schedule) {
        $stmt = $this->db->prepare("UPDATE schedules SET schedule_code=?, shift_id=? WHERE id =?");
        $payload = [
            $schedule->schedule_code,
            $schedule->shift_id,
            $schedule->id
        ];
        return $stmt->execute($payload);
    }
}