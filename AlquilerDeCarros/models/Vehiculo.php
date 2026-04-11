<?php
require_once(__DIR__ . "/../config/db.php");

class Vehiculo{

    public function guardar($marca,$modelo,$anio,$categoria){
        $db = DB::conectar();

        $sql = "INSERT INTO vehiculos(marca,modelo,anio,categoria)
                VALUES('$marca','$modelo','$anio','$categoria')";

        if(!$db->query($sql)){
            die("Error SQL Vehiculo: " . $db->error);
        }
    }

    public function listar(){
        $db = DB::conectar();
        $res = $db->query("SELECT * FROM vehiculos");

        if(!$res){
            die("Error SQL Listar Vehiculos: " . $db->error);
        }

        return $res;
    }
}
?>