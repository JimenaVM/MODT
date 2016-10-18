<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario");


	$NOMBRE = strtoupper($_POST["nombreCliente"]);
	$CEDULA = $_POST["cedCliente"];


  $VERIFY_USER = "SELECT * FROM cliente WHERE nombre='$NOMBRE'";
  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
  $TAM = mysqli_num_rows($QUERY_VERIFY);
  if ($TAM > 0) {
    header('location:../vista/cliente.php?error=201');
  } else {
				    $INSERT_USER = "INSERT INTO cliente(idCliente,nombre,cedulaNit)
									VALUES('','$NOMBRE','$CEDULA')";


					if (!mysqli_query($con,$INSERT_USER)) {
						# code...
						echo "ERROR AL CREAR NUEVO CLIENTE";
					} else {
						header("Location: ../Vista/cliente.php");
					}





	mysqli_close($con);
	}
?>
