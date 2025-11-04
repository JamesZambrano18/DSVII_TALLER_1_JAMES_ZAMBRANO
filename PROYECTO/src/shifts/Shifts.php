<?php
class Shifts {
    public $id;
    public $shift;

    // Constructor para crear un objeto Task a partir de un array de datos
    public function __construct($data) {
        $this->id = $data['id'];
        $this->shift = $data['shift'];
    }

    // Aquí podrían añadirse métodos adicionales relacionados con una tarea individual
}