<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario") ;


	$CODIGO = $_POST["codigoProducto"];
	$NOMBRE = strtoupper($_POST["nomProducto"]);
	$DESCRIPCION = $_POST["desProducto"];
	$IMAGEN= $_FILES['imagen']['name'];
  $CATEGORIA=$_POST['nombreCat'];
	$UNIDAD=$_POST['unidadMed'];

	$permitidos= array("image/jpg","image/jpeg","image/png");

    $limite=100;
    if(in_array($_FILES['imagen']['type'],$permitidos)&& $_FILES['imagen']['size']<=$limite*1024)
		{

		  	$ruta="../Vista/images/" .$_FILES['imagen']['name'];
		  	move_uploaded_file($_FILES["imagen"]["tmp_name"],$ruta);

		  	$ROOT_IMAGE = "http://localhost/Supersol/Vista/images/".$IMAGEN;

		  	$INSERT_USER = "INSERT INTO producto(idProducto,codigo,nombre,descripcion,foto,idCategoria,idUnidadMedida)
							VALUES('','$CODIGO','$NOMBRE','$DESCRIPCION','$ROOT_IMAGE','$CATEGORIA','$UNIDAD')";

			if (!mysqli_query($con,$INSERT_USER)) {
				# code...
				echo "ERROR AL INSERTAR PRODUCTO";
				echo "nombre" .$NOMBRE;
				echo "des".$DESCRIPCION;

				echo "cod".$CODIGO;
				echo "ima".$ROOT_IMAGE;
			   	echo "cate" .$CATEGORIA;




			} else {


				$query= mysqli_query($con,"SELECT * FROM producto WHERE nombre='$NOMBRE' ");
				$array = mysqli_fetch_array($query);
				$result = mysqli_num_rows($query);
				if ($result == 1) {

					$GET_ID = $array['idProducto'];
					# code...

					header("Location: ../Vista/producto.php");

				} else {
					echo "id: ".$result;
				}

			}

		}
?>
