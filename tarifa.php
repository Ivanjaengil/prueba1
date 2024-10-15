<?php
session_start();
include('config.php');

function conectarse($bdserver, $serveruser, $serverpwd, $bd, $port) {
    $conexion = new mysqli($bdserver, $serveruser, $serverpwd, $bd, $port);
    if ($conexion->connect_error) {
        ("Error de conexión: " . $conexion->connect_error);
    }
    return $conexion;
}


$conexion = new mysqli($bdserver, $serveruser, $serverpwd, $bd, $port);
if ($conexion->connect_error) {
}
$conexion = conectarse($bdserver, $serveruser, $serverpwd, $bd, $port);

$sql = "SELECT * FROM productos";
$consulta =  mysqli_query($conexion, $sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Tarifas</title>
</head>
<body>
    <?php include('inc_header.php'); ?>

    <h1>Lista de Productos</h1>
    <table id="tabla-productos">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio Base</th>
                <th>IVA</th>
                <th>Precio Final</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($reg = mysqli_fetch_array($consulta)) { ?>
                <?php
                $precioBase = $reg['precio'];
                $precioConIVA = $precioBase * (1 + 0.21);
                ?>
                <tr>
                    <td><?php echo $reg['producto']; ?></td>
                    <td><?php echo number_format($precioBase, 2) . ' €'; ?></td>
                    <td>21%</td>
                    <td><?php echo number_format($precioConIVA, 2) . ' €'; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>