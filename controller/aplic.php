<?php
include('../model/vuelo.php');

//$id = isset($_POST['id']) ? $_POST['id'] : null;

$vuelo = new Vuelo($_POST['id'], $_POST['nombre_aerolinea'], $_POST['nvuelo'], $_POST['destino']);


if (isset($_POST['guardar'])){
    $vuelo->guardarVuelo();

}
if (isset($_POST['actualizar'])){
    $vuelo->actualizarVuelo();
}
if (isset($_POST['eliminar'])){
    $vuelo->eliminarVuelo();
}


?>
