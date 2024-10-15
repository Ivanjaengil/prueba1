<?php 
include('inc_comunes.php');
include('inc_usuarios.php');

$tituloPagina = 'Formulario de registro de usuario';


if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $conexion = conectarse($bdserver,$serveruser,$serverpwd,$bd,$port);
    $sql = "SELECT * FROM users WHERE id=$user_id;";
    $consulta = mysqli_query($conexion, $sql);
    $reg = mysqli_fetch_array($consulta);

    $reg = array('id' => 1, 'user' => 'elmenda', 'password' => 'patata', 'avatar' => 'elmenda.jpg');

    $tituloPagina = 'Formulario de edicion de datos de ' .$reg['user']. '('.$reg['id'].')' ;


}else{
    $reg = array('id' => 0, 'user' => 'elmenda', 'password' => 'patata', 'avatar' => 'elmenda.jpg');

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <title><?=$tituloPagina ?></title>
</head>
<body>
    <?php include('inc_header.php') ?>
    <main>
        <h1><?php echo $tituloPagina ?></h1>


        <form name="formu" id="formu" action="usuarios_formu.php" method="POSRT" >
        <input type="hidden" name="id" id="id" value="<?=$reg['id'] ?>">
        <div>Usuario: <input type="text" name="user" id="user" value="<?=$reg['user'] ?>"></div>
        <div>Contreseña: <input type="password" name="password" id="password" value="<?=$reg['password'] ?>"></div>
        <div>Avatar: <input type="text" name="avatar" id="avatar" value="<?=$reg['avatar'] ?>">  </div>
        <div> <input type="submit" value="enviar"> </div>    
    </form>
    </main>


    <?php include('inc_footer.php') ?>

    
    
</body>
</html>