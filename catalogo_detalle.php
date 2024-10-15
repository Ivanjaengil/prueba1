<?php
include('inc_comunes.php');  
$tituloPagina = 'Buscar usuario';



$conexion = conectarse($bdserver, $serveruser, $serverpwd, $bd, $port);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $username = mysqli_real_escape_string($conexion, $_POST['usuario']);
   $sql = "SELECT * FROM users WHERE user = '$username'";  
   $resultado = mysqli_query($conexion, $sql);

   if (mysqli_num_rows($resultado) > 0) {
       $usuario = mysqli_fetch_assoc($resultado);
       echo "<h1>Detalles del Usuario</h1>";
       echo "Nombre de usuario: " . ($usuario['user']) . "<br>";
       echo "Contraseña: " . ($usuario['password']) . "<br>";
       echo "Avatar: " . ($usuario['avatar']) . "<br>";
   } else {
       echo "No se encontró ningún usuario con ese nombre.";
   }
}
mysqli_close($conexion);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="usuarios.php">Usuarios</a></li>
        <li><a href="catalogo.php">Catálogo</a></li>
        <li><a href="catalogo_formu.php">Creacion de usuario</a></li>
        <li><a href="catalogo_detalle.php">Detellas del usuario</a></li>
    </ul>

    <h1>Buscar usuario </h1>

    

    <form action="catalogo_detalle.php" method="post">
        <label for="uusario">Nombre de usuario: </label>
        <input type="text" name="usuario" id="usuario" required>
        <input type="submit" value="Buscar usuario">

    </form>
</body>
</html>