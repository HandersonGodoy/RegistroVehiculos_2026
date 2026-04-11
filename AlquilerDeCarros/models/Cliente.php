<?php
require_once("../config/db.php");

class Cliente{

    public function guardar($nombre,$tel,$correo,$lic){
        DB::conectar()->query("INSERT INTO clientes(nombre,telefono,correo,numero_licencia)
        VALUES('$nombre','$tel','$correo','$lic')");
    }

    public function listar(){
        return DB::conectar()->query("SELECT * FROM clientes");
    }
}
