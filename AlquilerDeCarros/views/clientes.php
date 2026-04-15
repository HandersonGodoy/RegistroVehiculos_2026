<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once(__DIR__ . "/../controllers/cliente_controller.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
    <link rel="stylesheet" href="../Styles.css">
</head>
<body>

<div class="section-bg">
<div class="container">

<h2 class="title">Gestión de Clientes</h2>

<div class="cards-grid">

<div class="feature-card">
    <h3>Registrar Cliente</h3>

    <form method="POST">
        <input name="nombre" placeholder="Nombre" required>
        <input name="telefono" placeholder="Teléfono">
        <input name="correo" placeholder="Correo">
        <input name="licencia" placeholder="Licencia">

        <button class="form-btn" name="guardar">Guardar</button>
    </form>
</div>

<div class="feature-card" style="grid-column: span 2;">
    <h3>Lista de Clientes</h3>

    <?php
    if($lista){
        while($c = $lista->fetch_assoc()){
            echo "<div class='result'>
            ID: ".$c['id']." - ".$c['nombre']."
            </div>";
        }
    }
    ?>
</div>

</div>

<a href="../index.php" class="back-link">Volver</a>

</div>
</div>

</body>
</html>