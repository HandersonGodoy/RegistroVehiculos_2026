<?php require_once("../controllers/cliente_controller.php"); ?>

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
while($c = $lista->fetch_assoc()){
    echo $c['id']." - ".$c['nombre']."<br>";
}
?>

<br><a href="../index.php">Volver</a>