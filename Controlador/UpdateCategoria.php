<?php

	include_once ("conexion.php");

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario") or die ("Error al Conectar con BD");
	$IDCAT = $_POST["id"];
	$NOMBRE = strtoupper($_POST["nombreCat"]);
	$IMP = $_POST["nombreImpuesto"];


	  $VERIFY_USER = "SELECT * FROM categoria WHERE  descripcion='$NOMBRE";
	  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
	  $TAM = mysqli_num_rows($QUERY_VERIFY);
	  if ($TAM > 0) {
	    header('location:../vista/categoria.php?error=201');
	  } else {

	        $INSERT_USER = "UPDATE Categoria
					SET descripcion='$NOMBRE', idImpuesto='$IMP'
					WHERE idCategoria='$IDCAT'";


					if (!mysqli_query($con,$INSERT_USER)) {
						# code...
						echo "ERROR AL ACTUALIZAR Categoria";
						echo "nombre:".$NOMBRE;
						echo "id:".$IDCAT;
						echo "impuesto:".$IMP;

					} else {
						header("Location: ../Vista/categoria.php");
					}


		mysqli_close($con);
	}

?>
