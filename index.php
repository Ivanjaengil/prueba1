<?php
$noControlesAcceso = true;


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="control.php" method="post">
    Usuario: <input type="text" name="usuario">
    Contraseña: <input type="password" name="clave">
    <input type="submit" value="Enviar">
</form>
</body>
</html>