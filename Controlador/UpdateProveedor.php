<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario");
	$IDUSUARIO = $_POST["id"];
	$NOMBRE = strtoupper($_POST["NombreProv"]);
	$NIT = $_POST["NitProv"];
	$NUMERO = $_POST["NumProv"];
	$ESTADO = $_POST["estado"];

	

  $VERIFY_USER = "SELECT * FROM categoria WHERE descripcion='$nombre'";
  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
  $TAM = mysqli_num_rows($QUERY_VERIFY);
  if ($TAM > 0) {
    header('location:../vista/categoria.php?error=201');
  } else {

	$INSERT_USER = "UPDATE proveedor
					SET nombre='$NOMBRE',nit='$NIT',estado='$ESTADO',numeroAutorizacion='$NUMERO'
					WHERE idProveedor='$IDUSUARIO'";

	
	if (!mysqli_query($con,$INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR PROVEEDOR";
		echo "string".$NOMBRE;
		echo "sss".$NIT;
		echo "string".$NUMERO;
		echo "string".$ESTADO;
	} else {
		header("Location: ../Vista/proveedor.php");
	}

	mysqli_close($con);
}

?>
