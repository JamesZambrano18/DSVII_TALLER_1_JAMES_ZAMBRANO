<?php
class UsersManager {
    private $db;

    public function __construct() {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para crear una nueva tarea
    public function createUser($project) {
        $stmt = $this->db->prepare("INSERT INTO users (mail, pass, first_name, last_name, phone_number, role_id, bus_id) VALUES (?,?,?,?,?,?,?)");
        return $stmt->execute([
            'mail' => $project->mail,
            'pass' => $project->password,
            'first_name' => $project->fname,
            'last_name' => $project->lname,
            'phone_number' => $project->phoneNumber,
            'role_id' => $project->role,
            'bus_id' => $project->bus,

        ]);
    }

    // Método para eliminar una tarea
    public function deleteuser($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Metodo para modificar una localizacion
    public function updateUser($mail, $pass, $first_name, $last_name, $phone_number, $role_id, $bus_id, $id) {
        $stmt = $this->db->prepare("UPDATE routes SET (mail, pass, first_name, last_name, phone_number, role_id, bus_id) VALUES (?,?,?,?,?,?,?) WHERE id =?");
        return $stmt->execute([$mail, $pass, $first_name, $last_name, $phone_number, $role_id, $bus_id, $id]);
    }
}