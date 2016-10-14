<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
	$IDCAT = $_POST["id"];
	$NOMBRE = $_POST["nombreCat"];
    $IMP= $_POST["nombreImpuesto"];

  
	$INSERT_USER = "UPDATE categoria
					SET descripcion='$NOMBRE',idImpuesto='$IMP'
					WHERE idCategoria='$IDCAT'";

	
	if (!mysql_query($INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR Categoria";
		echo"nombre:".$NOMBRE;
		echo"id:".$IDCAT;
		echo"impuesto:".$IMP;

	} else {
		header("Location: ../Vista/categoria.php");
	}


	mysql_close($con);

?>
