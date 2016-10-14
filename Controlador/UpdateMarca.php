<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
	$IDEMPRESA = $_POST["id"];
	$NOMBRE = $_POST["nombreMarca"];
    $ESTADO= $_POST["estadoMarca"]

	$INSERT_USER = "UPDATE marca
					SET nombre='$NOMBRE',estado='$NIT'
					WHERE idMarca='$IDEMPRESA'";

	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR MARCA";
	} else {
		header("Location: ../Vistas/marca.php");
	}


	mysql_close($con);

?>
