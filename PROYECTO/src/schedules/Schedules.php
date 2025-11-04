<?php
class Schedules {
    public $id;
    public $schedule_code;
    public $shift_id;

    // Constructor para crear un objeto Task a partir de un array de datos
    public function __construct($data) {
        $this->id = $data['id'];
        $this->schedule_code = $data['schedule_code'];
        $this->shift_id = $data['shift_id'];
    }

    // Aquí podrían añadirse métodos adicionales relacionados con una tarea individual
}