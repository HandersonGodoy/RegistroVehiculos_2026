<?php
class DB{
    public static function conectar(){
        return new mysqli("localhost","root","","alquiler_vehiculos_db");
    }
}