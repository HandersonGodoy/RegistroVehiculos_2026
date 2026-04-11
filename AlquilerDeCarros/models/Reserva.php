<?php
require_once(__DIR__ . "/../config/db.php");

class Reserva{

    public function guardar($cliente,$vehiculo,$inicio,$fin){
        $db = DB::conectar();

        $sql1 = "INSERT INTO reservas(cliente_id,vehiculo_id,fecha_inicio,fecha_fin)
                 VALUES('$cliente','$vehiculo','$inicio','$fin')";

        if(!$db->query($sql1)){
            die("Error SQL Reserva: " . $db->error);
        }

        $sql2 = "UPDATE vehiculos SET estado='alquilado' WHERE id=$vehiculo";

        if(!$db->query($sql2)){
            die("Error SQL Update Vehiculo: " . $db->error);
        }
    }

    public function listar(){
        $db = DB::conectar();

        $sql = "SELECT r.*, c.nombre, v.marca, v.modelo
                FROM reservas r
                JOIN clientes c ON r.cliente_id = c.id
                JOIN vehiculos v ON r.vehiculo_id = v.id";

        $res = $db->query($sql);

        if(!$res){
            die("Error SQL Listar Reservas: " . $db->error);
        }

        return $res;
    }
}
?>