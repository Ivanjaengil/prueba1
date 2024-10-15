<?php
include('inc_comunes.php');
 
$tituloPagina = 'Gastronomía sevillana para ti, '.$_SESSION['usuario'];
 
$conexion = conectarse($bdserver, $serveruser, $serverpwd, $bd, $port);
 
 
$sql = "SELECT * FROM proveedores;";
 
$consulta = mysqli_query($conexion, $sql);
 
if (!$consulta) {
    die("Error en la consulta SQL: " . mysqli_error($conexion));
}
 
$listado =' ';
$listado = '<table>';
$listado .= '<tr><th>ID</th><th>PROVEEDOR</th><th>EMAIL</th></tr>';
 
while ($reg = mysqli_fetch_array($consulta)) {
    //  $precioConDescuento = $reg['precio'] - ($reg['precio'] * $reg['descuento']);
   
    $listado .= "<tr>";
    $listado .= "<td>".$reg['id']."</td>";
    $listado .= "<td>".$reg['proveedor']."</td>";
    $listado .= "<td>".$reg['email']." €</td>";
    $listado .= "</tr>";
}
 
$listado .= '</table>';
?>
 
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$tituloPagina ?></title>
    </head>
    <body>  
        <?php include('inc_header.php'); ?>
        <main>
        <h1><?php echo $tituloPagina?></h1>

        <?=$listado?>
        </main>
        <?php include('inc_footer.php') ?>
 
    </body>
</html>
 
 