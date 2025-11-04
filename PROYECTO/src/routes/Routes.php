<?php
class Routes {
    public $id;
    public $bus_id;
    public $departure_location;
    public $arrival_location;

    // Constructor para crear un objeto Task a partir de un array de datos
    public function __construct($data) {
        $this->id = $data['id'];
        $this->bus_id = $data['bus_id'];
        $this->departure_location = $data['departure_location'];
        $this->arrival_location = $data['arrival_location'];
    }

    // Aquí podrían añadirse métodos adicionales relacionados con una tarea individual
}