<?php
include('inc_comunes.php');  
$tituloPagina = 'Crear nuevo usuario';
 
$conexion = conectarse($bdserver,$serveruser,$serverpwd,$bd,$port);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $password = mysqli_real_escape_string($conexion, $_POST['clave']);
    $avatar = mysqli_real_escape_string($conexion, $_POST['avatar']);  
 
    
    $sql = "INSERT INTO users (user, password, avatar) VALUES ('$username', '$password', '$avatar')";
 
    if (mysqli_query($conexion, $sql)) {
        echo "Usuario creado correctamente.";
    } else {
        echo "Error al crear el usuario: " . mysqli_error($conexion);
    }
}
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $tituloPagina; ?></title>
</head>
<body>
<h1><?php echo $tituloPagina; ?></h1>

<a href="usuarios.php">Usuarios</a> <a href="catalogo.php">Catálogo</a> <a href="catalogo_formu.php">Creacion de usuario</a>  <a href="catalogo_detalle.php">Detellas del usuario</a>
<br> <br>
    <form action="catalogo_formu.php" method="post">
<label for="usuario">Nombre de usuario:</label>
<input type="text" name="usuario" required><br>
 
        <label for="clave">Contraseña:</label>
<input type="password" name="clave" required><br>
 
        <label for="avatar">Avatar (nombre del archivo):</label>
<input type="text" name="avatar" required><br>
 
        <input type="submit" value="Crear Usuario">
</form>
</body>
</html>