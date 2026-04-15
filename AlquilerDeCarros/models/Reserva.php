<?php
require_once(__DIR__ . "/../config/db.php");

class Reserva{

    public function guardar($cliente,$vehiculo,$inicio,$fin){
        $db = DB::conectar();

        if(!$this->disponible($vehiculo)){
            die("Error: Vehículo no disponible");
        }

        if($inicio > $fin){
            die("Error: Fecha inicio mayor que fecha fin");
        }

        if($this->tieneCruce($vehiculo,$inicio,$fin)){
            die("Error: El vehículo ya está reservado en esas fechas");
        }

        $sql = "INSERT INTO reservas(cliente_id,vehiculo_id,fecha_inicio,fecha_fin,estado)
                VALUES('$cliente','$vehiculo','$inicio','$fin','activa')";

        if(!$db->query($sql)){
            die("Error SQL Reserva: " . $db->error);
        }

        // Cambiar estado del vehículo
        $db->query("UPDATE vehiculos SET estado='alquilado' WHERE id=$vehiculo");
    }

    public function disponible($vehiculo){
        $db = DB::conectar();
        $res = $db->query("SELECT estado FROM vehiculos WHERE id=$vehiculo");

        if(!$res){
            die("Error SQL Disponibilidad: " . $db->error);
        }

        $v = $res->fetch_assoc();

        return $v && $v['estado'] == 'disponible';
    }

    public function tieneCruce($vehiculo,$inicio,$fin){
        $db = DB::conectar();

        $sql = "SELECT * FROM reservas 
                WHERE vehiculo_id = $vehiculo 
                AND estado = 'activa'
                AND (
                    ('$inicio' BETWEEN fecha_inicio AND fecha_fin)
                    OR ('$fin' BETWEEN fecha_inicio AND fecha_fin)
                    OR (fecha_inicio BETWEEN '$inicio' AND '$fin')
                )";

        $res = $db->query($sql);

        if(!$res){
            die("Error SQL Cruce: " . $db->error);
        }

        return $res->num_rows > 0;
    }

    public function devolver($vehiculo){
        $db = DB::conectar();

        $db->query("UPDATE reservas 
                    SET estado='completada' 
                    WHERE vehiculo_id=$vehiculo AND estado='activa'");

        $db->query("UPDATE vehiculos SET estado='disponible' WHERE id=$vehiculo");
    }

    public function listar(){
        $db = DB::conectar();

        $res = $db->query("
        SELECT r.*, c.nombre, v.marca, v.modelo
        FROM reservas r
        JOIN clientes c ON r.cliente_id = c.id
        JOIN vehiculos v ON r.vehiculo_id = v.id
        ");

        if(!$res){
            die("Error SQL Listar: " . $db->error);
        }

        return $res;
    }

    public function historial(){
        $db = DB::conectar();

        $res = $db->query("
        SELECT r.*, c.nombre, v.marca, v.modelo
        FROM reservas r
        JOIN clientes c ON r.cliente_id = c.id
        JOIN vehiculos v ON r.vehiculo_id = v.id
        ORDER BY r.created_at DESC
        ");

        if(!$res){
            die("Error SQL Historial: " . $db->error);
        }

        return $res;
    }
}
?>