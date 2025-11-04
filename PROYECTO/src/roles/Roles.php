<?php
class Roles {
    public $id;
    public $rol;

    // Constructor para crear un objeto Task a partir de un array de datos
    public function __construct($data) {
        $this->id = $data['id'];
        $this->rol = $data['rol'];
    }

    // Aquí podrían añadirse métodos adicionales relacionados con una tarea individual
}