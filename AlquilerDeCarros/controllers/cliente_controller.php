<?php
require_once("../models/Cliente.php");

$obj = new Cliente();

if(isset($_POST['guardar'])){
    $obj->guardar($_POST['nombre'],$_POST['telefono'],$_POST['correo'],$_POST['licencia']);
}

$lista = $obj->listar();
