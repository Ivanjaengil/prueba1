<?php
include('inc_comunes.php');
 
$tituloPagina = 'Gastronomía sevillana para ti, '.$_SESSION['usuario'];

 
$conexion = conectarse($bdserver, $serveruser, $serverpwd, $bd, $port);
 
 
$sql = "SELECT * FROM productos;";
 
$consulta = mysqli_query($conexion, $sql);
 
$listado = '';
$listado.= '<table>';
$listado.= '<tr><th>ID</th><th>PRODUCTO</th><th>PRECIO</th><th>FOTO</th><th>DTO</th><th>PRECIO FINAL</th></tr>';
while($reg = mysqli_fetch_array($consulta)){
    $dto = $reg['descuento']*100;
    $precioFinal = $reg['precio'] - $reg['precio']*$reg['descuento'];

    $listado.="<tr>";
        $listado.="<td>".$reg['id']."</td>"; 
        $listado.="<td>".$reg['producto']."</td>"; 
        $listado.="<td>".$reg['precio']."</td>"; 
        $listado.="<td><img src='fotos/".$reg['foto']."' width='50' alt='Foto de ".$reg['producto']."'></td>"; 
        $listado.="<td>".$dto."%</td>"; 
        $listado.="<td>".$precioFinal."</td>"; 
    $listado.="</tr>";
}
$listado.= '</table>';

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
 
 