<?php
include('inc_comunes.php');
include('inc_usuarios.php');
$tituloPagina = 'Formulario de registro de proveedor';

if(isset($_GET['id'])){
    $proveedor_id = $_GET['id'];
    $conexion = conectarse($bdserver,$serveruser,$serverpwd,$bd,$port);
    $sql = "SELECT * FROM proveedores WHERE id=$proveedor_id;";
    $consulta = mysqli_query($conexion,$sql);
    $reg = mysqli_fetch_array($consulta);


    $tituloPagina = 'Formulario de edición datos de '.$reg['proveedor'].'('.$reg['id'].')';
}else{
    $reg = array('id'=>0,'proveedor'=>'','email'=>'');
}


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

    <form name="formu" id="formu" action="proveedores_formu.php" method="POST">
        <input type="hidden" name="id" id="id" value="<?= $reg['id'] ?>">
        <div>Proveedor: <input type="text" name="proveedor" id="proveedor" value="<?= $reg['proveedor'] ?>"></div>
        <div>E-Mail: <input type="email" name="email" id="email" value="<?= $reg['email'] ?>"></div>
        <div><input type="submit" value="ENVIAR"></div>
    </form>

    </main>
    <?php include('inc_footer.php') ?>

</body>

</html>