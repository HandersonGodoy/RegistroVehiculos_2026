<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once(__DIR__ . "/../controllers/vehiculo_controller.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vehículos</title>
    <link rel="stylesheet" href="../Styles.css">
</head>
<body>

<div class="section-bg">
<div class="container">

<h2 class="title">Gestión de Vehículos</h2>

<div class="cards-grid">

<div class="feature-card">
    <h3>Registrar Vehículo</h3>

    <form method="POST">
        <input name="marca" placeholder="Marca" required>
        <input name="modelo" placeholder="Modelo" required>
        <input name="año" type="number" placeholder="Año" required>
        <input name="categoria" placeholder="Categoría">

        <button class="form-btn" name="guardar">Guardar</button>
    </form>
</div>

<div class="feature-card" style="grid-column: span 2;">
    <h3>Lista de Vehículos</h3>

    <?php
    if($lista){
        while($v = $lista->fetch_assoc()){
            echo "<div class='result'>
            ".$v['marca']." ".$v['modelo']." | Año: ".$v['año']." | Estado: ".$v['estado']."
            </div>";
        }
    }
    ?>
</div>

<div class="feature-card" style="grid-column: span 3;">
    <h3>Vehículos Disponibles</h3>

    <?php
    $disp = $obj->disponibles();
    while($d = $disp->fetch_assoc()){
        echo "<div class='result'>".$d['marca']." ".$d['modelo']."</div>";
    }
    ?>
</div>

</div>

<a href="../index.php" class="back-link">Volver</a>

</div>
</div>

</body>
</html>