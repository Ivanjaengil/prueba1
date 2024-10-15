<?php
session_start();

if(!isset($_SESSION['respuestas']) || isset($_GET['reinicia'])){
    $_SESSION['respuestas'] = 0; 
}


if(isset($_GET['cuenta'])) {
    if($_GET['cuenta']==1){
        $_SESSION['respuesta']++; 
        header('location: arrays.php');
    }
}

if(!isset($_SESSION['colores'])){
    $_SESSION['colores'] = array();
    $_SESSION['cuentaColores'] = 0;
    
}

$ultimoColor = '';
if(!empty($_POST['r']) && !empty($_POST['g']) && !empty($_POST['b'])){
    $c = $_SESSION['cuentaColores']; 
    $_SESSION['colores'][$c] = array($_POST['r'],$_POST['g'],$_POST['b']);
    $ultimoColor = implode(",",$_SESSION['colores'][$c]);
    $_SESSION['cuentaColores']++;
}

$liColores = '';
for($i=0;$i<$_SESSION['cuentaColores'];$i++){
    $miColor = implode(",",$_SESSION['colores'][$i]);
    $liColores.= "<li style='background-color:RGB($miColor)'>COLOR $i</li>";
}


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
    <h1>Llevas  <?php echo $_SESSION['respuesta']  ?> intentos</h1>  
    <p>El ultimo color que has introducido es: <span style="background-color:RGB(<?=$ultimoColor?>;">ESTE</span></p> 
    <P>los colores acumulados son: </P>
    <ul>
        <?=$liColores?>
    </ul>
    <a href="arrays.php?cuenta=1">Otro más</a>
    <a href="arrays.php?reinicia=1">Reinicia</a>
    <form name="formu" id="formu" method="POST" action="arrays.php">
       <span>R</span> <input type="number" name="r" id="r" value="">
       <span>G</span><input type="number" name="g" id="g" value="">
       <span>B </span><input type="number" name="b" id="b" value="">
        <input type="submit" value="enviar">
    </form>
</body>
</html>