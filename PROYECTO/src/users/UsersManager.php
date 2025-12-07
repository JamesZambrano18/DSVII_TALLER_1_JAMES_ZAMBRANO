<?php
class UsersManager
{
    private $db;

    public function __construct()
    {
        // Obtenemos la conexión a la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    // Método para obtener todas las tareas
    public function getAllUsers()
    {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para crear una nueva tarea
    public function createUser($user)
    {
        $stmt = $this->db->prepare("INSERT INTO users (mail, pass, first_name, last_name, phone_number, role_id, bus_id) VALUES (?,?,?,?,?,?,?)");
        $payload = [
            $user->mail,
            $user->pass,
            $user->first_name,
            $user->last_name,
            $user->phone_number,
            $user->role_id,
            $user->bus_id
        ];
        return $stmt->execute($payload);
    }

    // Método para eliminar una tarea
    public function deleteUser($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Metodo para modificar una localizacion
    public function updateUser($user)
    {
        $stmt = $this->db->prepare("UPDATE users SET mail = ?, pass = ?, first_name = ?, last_name = ?, phone_number = ?, role_id = ?, bus_id = ? WHERE id = ?");
        $payload = [
            $user->mail,
            $user->pass,
            $user->first_name,
            $user->last_name,
            $user->phone_number,
            $user->role_id,
            $user->bus_id,
            $user->id
        ];
        return $stmt->execute($payload);
    }

    public function getUserById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}