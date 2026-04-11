<?php require_once("../controllers/reserva_controller.php"); ?>

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
while($r = $lista->fetch_assoc()){
    echo $r['id']." - Cliente: ".$r['nombre']." - Vehículo: ".$r['marca']." ".$r['modelo']."<br>";
}
?>

<br><a href="../index.php">Volver</a>