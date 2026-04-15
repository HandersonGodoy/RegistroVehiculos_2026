<?php
require_once(__DIR__ . "/../models/Reserva.php");

$obj = new Reserva();

if(isset($_POST['guardar'])){
    $obj->guardar($_POST['cliente'],$_POST['vehiculo'],$_POST['inicio'],$_POST['fin']);
}

if(isset($_POST['devolver'])){
    $obj->devolver($_POST['vehiculo']);
}

if(isset($_POST['buscar_cliente'])){
    $lista = $obj->historialCliente($_POST['cliente']);
}
elseif(isset($_POST['buscar_vehiculo'])){
    $lista = $obj->historialVehiculo($_POST['vehiculo']);
}
else{
    $lista = $obj->listar();
}
?>
