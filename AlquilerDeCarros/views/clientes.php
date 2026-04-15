<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once(__DIR__ . "/../controllers/cliente_controller.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<div class="container">

<h2>Registrar Cliente</h2>

<form method="POST">
    <input name="nombre" placeholder="Nombre" required>
    <input name="telefono" placeholder="Teléfono">
    <input name="correo" placeholder="Correo">
    <input name="licencia" placeholder="Licencia">
    <button name="guardar">Guardar</button>
</form>

<h3>Lista de Clientes</h3>

<?php
if($lista){
    while($c = $lista->fetch_assoc()){
        echo "<div class='result'>".$c['id']." - ".$c['nombre']."</div>";
    }
}else{
    echo "Error en la consulta";
}
?>

<br><a href="/RegistroVehiculos_2026/AlquilerDeCarros/index.php">Volver</a>

</div>

</body>
</html>