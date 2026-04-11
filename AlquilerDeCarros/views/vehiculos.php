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
    <input name="año" type="number" required>
    <input name="categoria" placeholder="Categoría">
    <button name="guardar">Guardar</button>
</form>

<h3>Lista de Vehículos</h3>

<?php
if($lista){
    while($v = $lista->fetch_assoc()){
        echo "<div class='result'>".$v['id']." - ".$v['marca']." ".$v['modelo']." (".$v['estado'].")</div>";
    }
}else{
    echo "Error en la consulta";
}
?>

<br><a href="/RegistroVehiculos_2026/AlquilerDeCarros/index.php">⬅ Volver</a>

</div>

</body>
</html>