<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
	$IDUSUARIO = $_GET["id"];

	$INSERT_USER = "DELETE FROM usuario
                        WHERE idUsuario = '$IDUSUARIO'";

	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL ELIMINAR USUARIO";
	} else {
		header("Location: ../Vista/usuario.php");
	}


	mysql_close($con);

?>
