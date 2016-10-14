<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
	$IDEMPRESA = $_POST["id"];
	$NOMBRE = strtoupper($_POST["nombreImp"]);
    $PORC= ($_POST["impPor"])/100;

    
    	$INSERT_USER = "INSERT INTO impuesto(idImpuesto,nombre,Ice)
					VALUES('','$NOMBRE','$PORC')";
       
    
	
	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR MARCA";
	} else {
		header("Location: ../Vista/impuesto.php");
	}


	mysql_close($con);

?>
