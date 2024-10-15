<?php
include('inc_comunes.php');

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

$conexion = conectarse($bdserver, $serveruser, $serverpwd, $bd, $port);
if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}


$usuario = $_SESSION['usuario'];

$tituloPagina = 'Gastronomía sevillana para ti, '.$_SESSION['usuario'];

 $sql = "SELECT user, avatar FROM users WHERE user = '$usuario'";
 $resultado = mysqli_query($conexion, $sql);


 if (!$resultado) {
    die("Error en la consulta SQL: " . mysqli_error($conexion));
}

if (mysqli_num_rows($resultado) > 0) {
    $userData = mysqli_fetch_assoc($resultado);
    $nombreUsuario = $userData['user'];
    $avatar = $userData['avatar'];
} else {
    die("No se encontraron datos para el usuario.");
}

// echo('Usuario identificado como ' .$_SESSION['usuario']);

 //     $rutaImagen = "fotos/elmenda.jpg"; 
 // echo '<img src="' . $rutaImagen . '" alt="Mi imagen" width="100">';

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$tituloPagina ?></title>
    </head>
    <body>
    <?php include('inc_header.php'); ?>
        <main>
        <h1><?php echo $tituloPagina ?></h1>
        <?php include('inc_footer.php')
        ?>

    

    </body>

</html>