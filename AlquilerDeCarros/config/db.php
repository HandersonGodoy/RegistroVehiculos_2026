<?php
class DB{
    public static function conectar(){
        $conexion = new mysqli("localhost","root","","alquiler_vehiculos_db", 3307);

        if($conexion->connect_error){
            die("Error de conexión: " . $conexion->connect_error);
        }

        return $conexion;
    }
}