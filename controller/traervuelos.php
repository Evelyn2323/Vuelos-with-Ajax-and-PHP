<?php
include ('../model/vuelo.php');

$viaje = new vuelo(null, 'nombre_aerolinea', 'nvuelo', 'destino');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $vuelodetalle = $viaje->traervuelo($id); // Pasa el ID a la función traervuelo()
    echo json_encode($vuelodetalle);
} else {
    $traerdatos = $viaje->traervuelos();
    echo json_encode($traerdatos);
}
?>