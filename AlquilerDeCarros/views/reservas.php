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

<h3>Historial de Alquileres</h3>

<?php
$hist = $obj->historial();

while($h = $hist->fetch_assoc()){
    echo "<div class='result'>
    Cliente: ".$h['nombre']." | Vehículo: ".$h['marca']." ".$h['modelo']." 
    | Desde: ".$h['fecha_inicio']." hasta ".$h['fecha_fin']."
    | Estado: ".$h['estado']."
    </div>";
}
?>

<br><a href="/RegistroVehiculos_2026/AlquilerDeCarros/index.php">Volver</a>

</div>

</body>
</html>