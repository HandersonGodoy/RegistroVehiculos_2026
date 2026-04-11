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

<h3>Lista de Reservas</h3>

<?php
if($lista){
    while($r = $lista->fetch_assoc()){
        echo "<div class='result'>".$r['id']." - Cliente: ".$r['nombre']." - Vehículo: ".$r['marca']." ".$r['modelo']."</div>";
    }
}else{
    echo "Error en la consulta";
}
?>

<br><a href="/RegistroVehiculos_2026/AlquilerDeCarros/index.php">⬅ Volver</a>

</div>

</body>
</html>