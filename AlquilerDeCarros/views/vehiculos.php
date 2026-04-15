<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once(__DIR__ . "/../controllers/vehiculo_controller.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vehículos</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<div class="container">

<h2>Registrar Vehículo</h2>

<form method="POST">
    <input name="marca" placeholder="Marca" required>
    <input name="modelo" placeholder="Modelo" required>
    <input name="año" type="number" placeholder="Año" required>
    <input name="categoria" placeholder="Categoría">
    <button name="guardar">Guardar</button>
</form>

<h3>Lista de Vehículos</h3>

<?php
if($lista){
    while($v = $lista->fetch_assoc()){
        echo "<div class='result'>
        ID: ".$v['id']." - ".$v['marca']." ".$v['modelo']." 
        | Año: ".$v['año']." | Estado: ".$v['estado']."
        </div>";
    }
}
?>

<h3>Vehículos Disponibles</h3>

<?php
$disp = $obj->disponibles();
while($d = $disp->fetch_assoc()){
    echo "<div class='result'>".$d['marca']." ".$d['modelo']."</div>";
}
?>

<br><a href="/RegistroVehiculos_2026/AlquilerDeCarros/index.php">Volver</a>

</div>

</body>
</html>