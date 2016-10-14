<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario");
	$IDEMPRESA = $_POST["id"];
	$NOMBRE = strtoupper($_POST["nombreEmpres"]);
	$NIT = $_POST["nitEmpres"];
	$ESTADO = $_POST["estado"];
	
	 $VERIFY_USER = "SELECT * FROM empresa WHERE nombreEmpresa='$NOMBRE'|| nit='$NIT'";
	  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
	  $TAM = mysqli_num_rows($QUERY_VERIFY);
	  if ($TAM > 0) {
	    header('location:../vista/empresa.php?error=201');
	  } else {


	$INSERT_USER = "UPDATE empresa
					SET nombreEmpresa='$NOMBRE',nit='$NIT'
					WHERE idEmpresa='$IDEMPRESA'";

	
	if (!mysqli_query($con,$INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR EMPRESA";
		echo "nombre".$NOMBRE;
		echo "nit".$NIT;
		echo "estado".$ESTADO;
	} else {
		header("Location: ../Vista/empresa.php");
	}

}
	mysqli_close($con);

?>
