<?php
require_once(__DIR__ . "/../config/db.php");

class Cliente{

    public function guardar($nombre,$tel,$correo,$lic){
        $db = DB::conectar();

        $sql = "INSERT INTO clientes(nombre,telefono,correo,numero_licencia)
                VALUES('$nombre','$tel','$correo','$lic')";

        if(!$db->query($sql)){
            die("Error SQL Cliente: " . $db->error);
        }
    }

    public function listar(){
        $db = DB::conectar();
        $res = $db->query("SELECT * FROM clientes");

        if(!$res){
            die("Error SQL Listar Clientes: " . $db->error);
        }

        return $res;
    }
}
?>
