 <?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario") or die ("Error al Conectar con BD");

	$IDPRODUCTO = $_POST["id"];

	$NOMBRE = trim(strtoupper($_POST["nombreProducto"]));
	$DESCRIPCION = $_POST["desProducto"];
	$CODIGO = $_POST["codigoProducto"];
	$IMAGEN= $_FILES['imagen']['name'];
    $CATEGORIA=$_POST['nombreCat'];



    if (empty($IMAGEN)) {
    	# code...
    	$INSERT_USER = "UPDATE producto
					SET codigo='$CODIGO',nombre='$NOMBRE',descripcion='$DESCRIPCION'
					WHERE idProducto='$IDPRODUCTO'";
		if (!mysqli_query($con,$INSERT_USER)) {
			# code...
		echo "ERROR AL ACTUALIZAR PRODUCTO";
		} else {
			header("Location: ../Vista/producto.php");
		}
    } else {
    	$permitidos= array("image/jpg","image/jpeg","image/png");
	  	$limite=100;

      		if(in_array($_FILES['imagen']['type'],$permitidos)&& $_FILES['imagen']['size']<=$limite*1024)
      		{
      			$ruta="../Vista/images/" .$_FILES['imagen']['name'];
      		  	move_uploaded_file($_FILES["imagen"]["tmp_name"],$ruta);
      			$ROOT_IMAGE = "http://localhost/Supersol/Vista/images/".$IMAGEN;
      		  	$INSERT_USER = "UPDATE producto
      					SET codigo='$CODIGO',nombre='$NOMBRE',descripcion='$DESCRIPCION',foto='$ROOT_IMAGE'
      					WHERE idProducto='$IDPRODUCTO'";
      			if (!mysqli_query($con,$INSERT_USER)) {
      				# code...
      				echo "ERROR AL ACTUALIZAR PRODUCTO";
      			} else {
      				header("Location: ../Vista/producto.php");
      			}
      		}

    }


	mysql_close($con);

?>
