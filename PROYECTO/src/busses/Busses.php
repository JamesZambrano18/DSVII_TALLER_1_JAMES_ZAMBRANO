<?php
class Busses {
    public $id;
    public $bus_code;
    public $schedule_id;

    // Constructor para crear un objeto Task a partir de un array de datos
    public function __construct($data) {
        $this->id = $data['id'];
        $this->bus_code = $data['bus_code'];
        $this->schedule_id = $data['schedule_id'];
    }

    // Aquí podrían añadirse métodos adicionales relacionados con una tarea individual
}