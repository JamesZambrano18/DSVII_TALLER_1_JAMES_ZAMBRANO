<?php
function obtenerLibros() { 
    $libros = [
        ['titulo' => 'El Quijote','autor' => 'Miguel de Cervantes',
        'anio_publicacion' => 1605,'genero' => 'Novela',
        'descripcion' => 'La historia del ingenioso hidalgo Don Quijote de la Mancha.'],
        
        ['titulo' => 'El Despertar De la Humanidad','autor' => 'Miguel Mestal',
        'anio_publicacion' => 2024,'genero' => 'Relatos',
        'descripcion' => 'Recupera un pasado en el que el desarrollo y la implantación de nuevas inteligencias artificiales desplazó el control que los seres humanos tenían sobre sí mismos.'],
        
        ['titulo' => 'Katya','autor' => 'Adolfo Hernandez Sanchez',
        'anio_publicacion' => 2024,'genero' => 'Novela corta',
        'descripcion' => 'Aventuras y desventuras de Alberto, un pintor empleado en una galería de arte, en medio de la pandemia.'],
        
        ['titulo' => 'La Condesa Judia','autor' => 'Bernardo Martin Sagrado',
        'anio_publicacion' => 2023,'genero' => 'Narrativa actual',
        'descripcion' => 'El exégeta y comerciante Isaac Abravanel, judío, debe abandonar los reinos cristianos de Castilla y Aragón.'],
       
        ['titulo' => 'La Torre Hundida','autor' => 'Lorena Falcon',
        'anio_publicacion' => 2013,'genero' => 'Novela fantastica',
        'descripcion' => 'La historia de una joven, en la búsqueda de su familia perdida.'],
    ];
    return $libros;

    //mostrarDetallesLibros($libros); 
}

function mostrarDetallesLibros($libro) {
    $mensaje = printf("Titulo del libro: %s, escrito por: %s <br>
    la fecha de publicacion fue en %d
    <br> su genero  es: %s<br>
    una descripcion breve del mismo es: %s", $libro["titulo"], $libro["autor"], $libro["anio_publicacion"], $libro["genero"], $libro["descripcion"]);
    
    return $mensaje;
}
?>