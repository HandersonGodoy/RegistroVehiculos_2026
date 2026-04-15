<?php
require_once(__DIR__ . "/../config/db.php");

class Reserva{

    public function guardar($cliente,$vehiculo,$inicio,$fin){
        $db = DB::conectar();

        if(!$this->disponible($vehiculo)){
            die("Vehículo no disponible");
        }

        if($inicio > $fin){
            die("Fechas inválidas");
        }

        if($this->tieneCruce($vehiculo,$inicio,$fin)){
            die("Vehículo ocupado en esas fechas");
        }

        $db->query("INSERT INTO reservas(cliente_id,vehiculo_id,fecha_inicio,fecha_fin,estado)
        VALUES('$cliente','$vehiculo','$inicio','$fin','activa')");

        $db->query("UPDATE vehiculos SET estado='alquilado' WHERE id=$vehiculo");
    }

    public function disponible($vehiculo){
        $db = DB::conectar();
        $res = $db->query("SELECT estado FROM vehiculos WHERE id=$vehiculo");
        $v = $res->fetch_assoc();
        return $v['estado'] == 'disponible';
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
        return $res->num_rows > 0;
    }

    public function devolver($vehiculo){
        $db = DB::conectar();

        $db->query("UPDATE reservas 
                    SET estado='completada' 
                    WHERE vehiculo_id=$vehiculo AND estado='activa'");

        $db->query("UPDATE vehiculos SET estado='disponible' WHERE id=$vehiculo");
    }

    public function historial(){
        return $this->listar();
    }

    public function historialCliente($cliente){
        $db = DB::conectar();

        return $db->query("
        SELECT r.*, c.nombre, v.marca, v.modelo
        FROM reservas r
        JOIN clientes c ON r.cliente_id = c.id
        JOIN vehiculos v ON r.vehiculo_id = v.id
        WHERE cliente_id = $cliente
        ");
    }

    public function historialVehiculo($vehiculo){
        $db = DB::conectar();

        return $db->query("
        SELECT r.*, c.nombre, v.marca, v.modelo
        FROM reservas r
        JOIN clientes c ON r.cliente_id = c.id
        JOIN vehiculos v ON r.vehiculo_id = v.id
        WHERE vehiculo_id = $vehiculo
        ");
    }

    public function disponiblesPorFecha($inicio,$fin){
        $db = DB::conectar();

        return $db->query("
        SELECT * FROM vehiculos v
        WHERE v.id NOT IN (
            SELECT vehiculo_id FROM reservas
            WHERE estado = 'activa'
            AND (
                ('$inicio' BETWEEN fecha_inicio AND fecha_fin)
                OR ('$fin' BETWEEN fecha_inicio AND fecha_fin)
                OR (fecha_inicio BETWEEN '$inicio' AND '$fin')
            )
        )
        ");
    }

    public function listar(){
        $db = DB::conectar();

        return $db->query("
        SELECT r.*, c.nombre, v.marca, v.modelo
        FROM reservas r
        JOIN clientes c ON r.cliente_id = c.id
        JOIN vehiculos v ON r.vehiculo_id = v.id
        ");
    }
}
?>