<?php
require_once("../config/db.php");

class Vehiculo{

    public function guardar($marca,$modelo,$anio,$categoria){
        $db = DB::conectar();
        $db->query("INSERT INTO vehiculos(marca,modelo,anio,categoria)
        VALUES('$marca','$modelo','$anio','$categoria')");
    }

    public function listar(){
        return DB::conectar()->query("SELECT * FROM vehiculos");
    }
}
