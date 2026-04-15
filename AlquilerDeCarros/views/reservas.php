<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once(__DIR__ . "/../controllers/reserva_controller.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservas</title>
    <link rel="stylesheet" href="../Styles.css">
</head>
<body>

<div class="section-bg">
<div class="container">

<h2 class="title">Gestión de Reservas</h2>

<div class="cards-grid">

<div class="feature-card">
    <h3>Crear Reserva</h3>

    <form method="POST">
        <input name="cliente" placeholder="ID Cliente" required>
        <input name="vehiculo" placeholder="ID Vehículo" required>
        <input type="date" name="inicio" required>
        <input type="date" name="fin" required>

        <button class="form-btn" name="guardar">Reservar</button>
    </form>
</div>

<div class="feature-card">
    <h3>Devolver Vehículo</h3>

    <form method="POST">
        <input name="vehiculo" placeholder="ID Vehículo" required>
        <button class="form-btn" name="devolver">Devolver</button>
    </form>
</div>

<div class="feature-card" style="grid-column: span 3;">
    <h3>Historial</h3>

    <?php
    if($lista){
        while($r = $lista->fetch_assoc()){
            echo "<div class='result'>
            ".$r['nombre']." | ".$r['marca']." ".$r['modelo']." 
            | ".$r['fecha_inicio']." a ".$r['fecha_fin']." 
            | ".$r['estado']."
            </div>";
        }
    }
    ?>
</div>

<div class="feature-card" style="grid-column: span 3;">
    <h3>Consultar Disponibles</h3>

    <form method="POST">
        <input type="date" name="inicio">
        <input type="date" name="fin">
        <button class="form-btn" name="consultar">Consultar</button>
    </form>

    <?php
    if(isset($_POST['consultar'])){
        $disp = $obj->disponiblesPorFecha($_POST['inicio'],$_POST['fin']);

        while($d = $disp->fetch_assoc()){
            echo "<div class='result'>".$d['marca']." ".$d['modelo']."</div>";
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