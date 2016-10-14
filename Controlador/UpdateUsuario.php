<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario");
	$IDUSUARIO = $_POST["id"];
	$NOMBRE = strtoupper($_POST["Nombre"]);
	$PATERNO = strtoupper($_POST["apellidoPaterno"]);
	$MATERNO = strtoupper($_POST["apellidoMaterno"]);
	$EMAIL = $_POST["email"];
	$TELEFONO = $_POST["telefono"];
	$ESTADO = $_POST["estado"];


  $VERIFY_USER = "SELECT * FROM categoria WHERE descripcion='$nombre'";
  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
  $TAM = mysqli_num_rows($QUERY_VERIFY);
  if ($TAM > 0) {
    header('location:../vista/categoria.php?error=201');
  } else {

	$INSERT_USER = "UPDATE usuario
					SET nombre='$NOMBRE',apellidoPaterno='$PATERNO',apellidoMaterno='$MATERNO',email='$EMAIL',telefono='$TELEFONO',estado='$ESTADO'
					WHERE idUsuario='$IDUSUARIO'";

	
	if (!mysqli_query($con,$INSERT_USER)) {
		# code...
		echo "ERROR AL ACTUALIZAR USUARIO";
	} else {
		header("Location: ../Vista/usuario.php");
	}

}
	mysql_close($con);

?>
