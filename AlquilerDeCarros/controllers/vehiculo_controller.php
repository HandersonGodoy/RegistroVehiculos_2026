<?php
require_once(__DIR__ . "/../models/Vehiculo.php");

$obj = new Vehiculo();

if(isset($_POST['guardar'])){
    $obj->guardar($_POST['marca'],$_POST['modelo'],$_POST['anio'],$_POST['categoria']);
}

$lista = $obj->listar();
?>
