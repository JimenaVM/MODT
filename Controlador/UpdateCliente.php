<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario");
	$IDEMPRESA = $_POST["id"];
	$NOMBRE = $_POST["nombreCliente"];
	$CEDULA = $_POST["cedulaCliente"];


	
  $VERIFY_USER = "SELECT * FROM cliente WHERE nombre='$NOMBRE' || cedulaNit='$CEDULA'";
  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
  $TAM = mysqli_num_rows($QUERY_VERIFY);
  if ($TAM > 0) {
    header('location:../vista/cliente.php?error=201');
  } else {


	$INSERT_USER = "UPDATE cliente
					SET nombre='$NOMBRE',cedulaNit='$CEDULA'
					WHERE idCliente='$IDEMPRESA'";

	
	if (!mysqli_query($con,$INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR CLIENTE";
	} else {
		header("Location: ../Vista/cliente.php");
	}
}


	mysql_close($con);

?>
