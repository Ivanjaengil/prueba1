<?php
session_start(); //Usamos la sesión
include('config.php');

if(!isset($noControlesAcceso) && empty($_SESSION['usuario'])){
    header("Location: index.php");
}

function conectarse($bdserver,$serveruser,$serverpwd,$bd,$port){

	if(!$conectado = mysqli_connect($bdserver,$serveruser,$serverpwd,$bd,$port)){
		echo "Algo no va bien con la base de datos";	
		exit;
	}
	else{
		//echo "conectado";
	}
	return $conectado;
}


function esColorRGB($coloresPOST) {
	$devuelve = true;
	for($i=0;$i<count($coloresPOST)) {
		if($coloresPOST[$i]<0 && $coloresPOST[$0i]>255){
			$devuelve = false;
		}
	}

	return $devuelve;
}