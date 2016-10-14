<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");


	$IDROL = $_POST["usuario"];
	$Pa=$_POST['contras']

	echo .$IDROL;
	echo "passsssssssssssss".$Pa;
header("Location: ../Vistas/usuario.php");	


	

?>