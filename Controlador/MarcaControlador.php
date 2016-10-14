<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");

    
	$NOMBRE = $_POST["nombreMarc"];
	$ESTADO = $_POST["estadoMarc"];


	$INSERT_USER = "INSERT INTO marca(idMarca,nombre,estado)
					VALUES('','$NOMBRE','0')";
       
     
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL CREAR NUEVA MARCA";
	} else {
		header("Location: ../Vista/producto.php");
	}


	mysql_close($con);

?>
