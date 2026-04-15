<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once(__DIR__ . "/../controllers/reserva_controller.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservas</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<div class="container">

<h2>Crear Reserva</h2>

<form method="POST">
    <input name="cliente" placeholder="ID Cliente" required>
    <input name="vehiculo" placeholder="ID Vehículo" required>
    <input type="date" name="inicio" required>
    <input type="date" name="fin" required>
    <button name="guardar">Reservar</button>
</form>

<h3>Devolver Vehículo</h3>

<form method="POST">
    <input name="vehiculo" placeholder="ID Vehículo" required>
    <button name="devolver">Devolver</button>
</form>

<h3>Buscar Historial por Cliente</h3>

<form method="POST">
    <input name="cliente" placeholder="ID Cliente">
    <button name="buscar_cliente">Buscar</button>
</form>

<h3>Buscar Historial por Vehículo</h3>

<form method="POST">
    <input name="vehiculo" placeholder="ID Vehículo">
    <button name="buscar_vehiculo">Buscar</button>
</form>

<h3>Historial</h3>

<?php
if($lista){
    while($r = $lista->fetch_assoc()){
        echo "<div class='result'>
        Cliente: ".$r['nombre']." | Vehículo: ".$r['marca']." ".$r['modelo']." 
        | ".$r['fecha_inicio']." a ".$r['fecha_fin']." 
        | Estado: ".$r['estado']."
        </div>";
    }
}
?>

<h3>Consultar Vehículos Disponibles por Fecha</h3>

<form method="POST">
    <input type="date" name="inicio">
    <input type="date" name="fin">
    <button name="consultar">Consultar</button>
</form>

<?php
if(isset($_POST['consultar'])){
    $disp = $obj->disponiblesPorFecha($_POST['inicio'],$_POST['fin']);

    while($d = $disp->fetch_assoc()){
        echo "<div class='result'>".$d['marca']." ".$d['modelo']."</div>";
    }
}
?>

<br><a href="/RegistroVehiculos_2026/AlquilerDeCarros/index.php">Volver</a>

</div>

</body>
</html>