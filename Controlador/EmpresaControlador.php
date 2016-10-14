<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario");

	$IDEMPRESA = $_POST["idEmpresa"];
	$NOMBRE = strtoupper($_POST["nombreEmpresa"]);
	$NIT = $_POST["nitEmpresa"];

	
  $VERIFY_USER = "SELECT * FROM empresa WHERE nombreEmpresa='$NOMBRE'|| nit='$NIT'";
  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
  $TAM = mysqli_num_rows($QUERY_VERIFY);
  if ($TAM > 0) {
    header('location:../vista/empresa.php?error=201');
  } else {
				$INSERT_USER = "INSERT INTO empresa(idEmpresa,nombreEmpresa,nit)
								VALUES('','$NOMBRE','$NIT')";
			       
			     
				if (!mysqli_query($con,$INSERT_USER)) {
					# code...
					echo "ERROR AL CREAR NUEVA EMPRESA";
				} else {
					header("Location: ../Vista/empresa.php");
				}

			
		}
	mysql_close($con);

?>
