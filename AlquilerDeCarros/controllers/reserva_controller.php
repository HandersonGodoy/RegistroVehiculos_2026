<?php
require_once(__DIR__ . "/../models/Reserva.php");

$obj = new Reserva();

if(isset($_POST['guardar'])){
    $obj->guardar($_POST['cliente'],$_POST['vehiculo'],$_POST['inicio'],$_POST['fin']);
}

$lista = $obj->listar();
?>
