<?php
class Users {
    public $id;
    public $mail;
    public $pass;
    public $first_name;
    public $last_name;
    public $phone_number;
    public $role_id;
    public $bus_id;

    // Constructor para crear un objeto Task a partir de un array de datos
    public function __construct($data) {
        $this->id = $data['id'];
        $this->mail = $data['mail'];
        $this->pass = $data['pass'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->phone_number = $data['phone_number'];
        $this->role_id = $data['role_id'];
        $this->bus_id = $data['bus_id'];
    }

    // Aquí podrían añadirse métodos adicionales relacionados con una tarea individual
}