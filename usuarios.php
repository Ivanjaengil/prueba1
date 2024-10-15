<?php
include('inc_comunes.php');
include('inc_usuarios.php');



$tituloPagina = 'Gastronomía sevillana para ti, '.$_SESSION['usuario'];


$conexion = conectarse($bdserver,$serveruser,$serverpwd,$bd,$port);

$sql = "SELECT * FROM users;";

$consulta = mysqli_query($conexion,$sql);

$listado = '';
$listado.= '<table>';
$listado.= '<tr><th>ID</th><th>user</th><th>avatar</th><th>-</th></tr>';
while($reg = mysqli_fetch_array($consulta)){
    $listado.="<tr>";
        $listado.="<td>".$reg['id']."</td>"; 
        $listado.="<td>".$reg['user']."</td>"; 
        $listado.="<td><img src='fotos/".$reg['avatar']."' width='50' alt='Foto de ".$reg['user']."'></td>";  
        $listado.="<td><a href='usuarios_formu.php?id=".$reg['id']."'>Editar</a></td>"; 
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
    <?php include('inc_header.php') ?>
    <main>
        <h1><?php echo $tituloPagina ?></h1>
        <?=$listado?>
        
    </main>
    <?php include('inc_footer.php') ?>
</body>

</html>