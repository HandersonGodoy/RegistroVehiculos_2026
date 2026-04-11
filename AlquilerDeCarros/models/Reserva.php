<?php
require_once("../config/db.php");

class Reserva{

    public function guardar($cliente,$vehiculo,$inicio,$fin){
        $db = DB::conectar();

        $db->query("INSERT INTO reservas(cliente_id,vehiculo_id,fecha_inicio,fecha_fin)
        VALUES('$cliente','$vehiculo','$inicio','$fin')");

        $db->query("UPDATE vehiculos SET estado='alquilado' WHERE id=$vehiculo");
    }

    public function listar(){
        return DB::conectar()->query("
        SELECT r.*, c.nombre, v.marca, v.modelo
        FROM reservas r
        JOIN clientes c ON r.cliente_id = c.id
        JOIN vehiculos v ON r.vehiculo_id = v.id
        ");
    }
}
