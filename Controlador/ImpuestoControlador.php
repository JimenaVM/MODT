<?php

  include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario");



	$NOMBRE = strtoupper($_POST["nombreImp"]);
  $PORC= ($_POST["impPor"])/100;


		$VERIFY_USER = "SELECT * FROM impuesto WHERE  nombre='$NOMBRE'";
		$QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
		$TAM = mysqli_num_rows($QUERY_VERIFY);
		if ($TAM > 0) {
			header('location:../vista/impuesto.php?error=201');
		} else {

  	$INSERT_USER = "INSERT INTO impuesto(idImpuesto,nombre,Ice)
					VALUES('','$NOMBRE','$PORC')";




					if (!mysqli_query($con,$INSERT_USER)) {
						# code...
						echo "ERROR AL ACTUALIZAR MARCA";
					} else {
						header("Location: ../Vista/impuesto.php");
					}


	mysql_close($con);
}
?>
