<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario");

	$NOMBRE = strtoupper($_POST["nombreProveedor"]);
	$NIT = $_POST["nitProveedor"];
	$ESTADO = $_POST["estado"];
    $AUTORIZACION = $_POST["numAutorizacion"];


  $VERIFY_USER = "SELECT * FROM proveedor WHERE nombre='$nombre' || nit='$NIT'|| numeroAutorizacion='$AUTORIZACION'";
  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
  $TAM = mysqli_num_rows($QUERY_VERIFY);
  if ($TAM > 0) {
    header('location:../vista/proveedor.php?error=201');
  } else {
	
	$INSERT_USER = "INSERT INTO proveedor(idProveedor,nombre,nit,estado,numeroAutorizacion)
					VALUES('','$NOMBRE','$NIT','$ESTADO','$AUTORIZACION')";
       
      
	
	if (!mysqli_query($con,$INSERT_USER)) {
		# code...
		echo "ERROR AL INSERTAR PROVEEDOR";
	} else {
		$query= mysqli_query($con,"SELECT * FROM proveedor WHERE nombre='$NOMBRE' AND nit='$NIT'");
		$array = mysqli_fetch_array($query);
		$result = mysqli_num_rows($query);
		if ($result > 0) {

			$GET_ID = $array['idProveedor'];
			# code...
			
			header("Location: ../Vista/proveedor.php");

		} else {
			echo "id: ".$result;
		}
		
	}
}

	function getPassword($tam=6){
		$ramdon = "abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		return substr(str_shuffle($ramdon), 0, $tam);
	}


?>