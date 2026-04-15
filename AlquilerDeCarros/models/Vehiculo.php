<?php
require_once(__DIR__ . "/../config/db.php");

class Vehiculo{

    public function guardar($marca,$modelo,$año,$categoria){
        $db = DB::conectar();

        $sql = "INSERT INTO vehiculos(marca,modelo,anio,categoria,estado)
                VALUES('$marca','$modelo','$año','$categoria','disponible')";

        if(!$db->query($sql)){
            die("Error SQL Vehiculo: " . $db->error);
        }
    }

    public function listar(){
        return DB::conectar()->query("SELECT * FROM vehiculos");
    }

    public function cambiarEstado($id,$estado){
        DB::conectar()->query("UPDATE vehiculos SET estado='$estado' WHERE id=$id");
    }

    public function disponibles(){
        return DB::conectar()->query("SELECT * FROM vehiculos WHERE estado='disponible'");
    }
}
?>