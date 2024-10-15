<?php
$noControlesAcceso = true;
include('inc_comunes.php');


$contenido = "Identificación incorrecta. Lleva ".$_SESSION['intentos']." intentos";
 
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Acceso Denegado</title>
</head>
<body>
    <h1>Acceso Denegado</h1>
    <p>No se ha identificado correctamente. Intentos fallidos: <?php echo $_SESSION['intentos']; ?></p>
    <p><a href="index.php">Volver a intentarlo</a></p>
</body>
</html>