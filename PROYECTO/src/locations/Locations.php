<?php
class Locations {
    public $id;
    public $district;
    public $street;
    public $location_type_id;

    // Constructor para crear un objeto Task a partir de un array de datos
    public function __construct($data) {
        $this->id = $data['id'];
        $this->district = $data['district'];
        $this->street = $data['street'];
        $this->location_type_id = $data['location_type_id'];
    }

    // Aquí podrían añadirse métodos adicionales relacionados con una tarea individual
}