<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario");

	$IDIMP = $_POST["id"];
	$NOMBRE = strtoupper($_POST["nombreImp"]);
	$PORCE= $_POST["impPor"];
	if($PORCE<=0){

		$INSERT_USER = "UPDATE impuesto
					SET nombre='$NOMBRE',Ice='$PORCE'
					WHERE idImpuesto='$IDIMP'";
	}
	else{
		 $PORCE= ($_POST["impPor"])/100;
		 $INSERT_USER = "UPDATE impuesto
					SET nombre='$NOMBRE',Ice='$PORCE'
					WHERE idImpuesto='$IDIMP'";
		}




	if (!mysqli_query($con,$INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR IMPUESTO";
		echo "id".$IDIMP;
		echo "nombre".$NOMBRE;
		echo "porcentaje".$PORCE;
	} else {
		header("Location: ../Vista/impuesto.php");
	}


	mysql_close($con);

?>
