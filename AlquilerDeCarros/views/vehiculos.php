<?php require_once("../controllers/vehiculo_controller.php"); ?>

<h2>Registrar Vehículo</h2>

<form method="POST">
    <input name="marca" placeholder="Marca" required>
    <input name="modelo" placeholder="Modelo" required>
    <input name="anio" type="number" required>
    <input name="categoria" placeholder="Categoría">
    <button name="guardar">Guardar</button>
</form>

<h3>Lista de Vehículos</h3>

<?php
while($v = $lista->fetch_assoc()){
    echo $v['id']." - ".$v['marca']." ".$v['modelo']." (".$v['estado'].")<br>";
}
?>

<br><a href="../index.php">Volver</a>