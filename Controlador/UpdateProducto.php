 <?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysql_select_db("inventario") or die ("Error al Conectar con BD");

	$IDPRODUCTO = $_POST["id"];
	
	$NOMBRE = $_POST["nombreProducto"];
	$DESCRIPCION = $_POST["desProducto"];
	$FECHA = $_POST["fecha"];
	$CODIGO = $_POST["codigoProducto"];
	$IMAGEN= $_FILES['imagen']['name'];
    $CATEGORIA=$_POST['nombreCat']; 
    $STOCK=$_POST['stockProd'];
    $PRECIOV=$_POST['precioVenta'];
    if($NOMBRE=="" ||$DESCRIPCION=="" || $CODIGO==0 || $STOCK==0 || $PRECIOV==0)
    {
        header("Location: ../Vista/producto.php");
	   echo"<script>alert('El campo producto no admite campos vacios')</script>";
	 
    }else{

    if (empty($IMAGEN)) {
    	# code...
    	$INSERT_USER = "UPDATE producto
					SET nombre='$NOMBRE',descripcion='$DESCRIPCION',fechaExpiracion='$FECHA',codigo='$CODIGO',cantidadStock='$STOCK',precioVenta='$PRECIOV'
					WHERE idProducto='$IDPRODUCTO'";
		if (!mysql_query($INSERT_USER)) {
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
			$ROOT_IMAGE = "http://localhost:3030/Supersol/Vista/images/".$IMAGEN;
		  	$INSERT_USER = "UPDATE producto
					SET nombre='$NOMBRE',descripcion='$DESCRIPCION',fechaExpiracion='$FECHA',codigo='$CODIGO',foto='$ROOT_IMAGE',cantidadStock='$STOCK',precioVenta='$PRECIOV' 
					WHERE idProducto='$IDPRODUCTO'";
			if (!mysql_query($INSERT_USER)) {
				# code...
				echo "ERROR AL ACTUALIZAR PRODUCTO";
			} else {
				header("Location: ../Vista/producto.php");
			}
		}
    	
    }

    }
	mysql_close($con);

?>
