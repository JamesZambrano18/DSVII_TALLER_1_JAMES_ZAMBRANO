<?php
class LocationType {
    public $id;
    public $location_type;

    // Constructor para crear un objeto Task a partir de un array de datos
    public function __construct($data) {
        $this->id = $data['id'];
        $this->location_type = $data['location_type'];
    }

    // Aquí podrían añadirse métodos adicionales relacionados con una tarea individual
}