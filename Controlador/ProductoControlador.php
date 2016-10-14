<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario") ;

	$NOMBRE = strtoupper($_POST["nomProducto"]);
	$DESCRIPCION = $_POST["desProducto"];
	$FECHA = $_POST["fecha"];
	$CODIGO = $_POST["codigoProducto"];
	$IMAGEN= $_FILES['imagen']['name'];
    $CATEGORIA=$_POST['nombreCat']; 
    $STOCK=$_POST['stockProd'];
    $PRECIOV=$_POST['precioVenta']; 
	

	
	$permitidos= array("image/jpg","image/jpeg","image/png");
	    
    $limite=100;
    if(in_array($_FILES['imagen']['type'],$permitidos)&& $_FILES['imagen']['size']<=$limite*1024)
		{
			
		  	$ruta="../Vista/images/" .$_FILES['imagen']['name'];
		  	move_uploaded_file($_FILES["imagen"]["tmp_name"],$ruta);

		  	$ROOT_IMAGE = "http://localhost:3030/Supersol/Vista/images/".$IMAGEN;

		  	$INSERT_USER = "INSERT INTO producto(idProducto,nombre,descripcion,fechaExpiracion,codigo,foto,cantidadStock,precioVenta,idCategoria)
							VALUES('','$NOMBRE','$DESCRIPCION','$FECHA','$CODIGO','$ROOT_IMAGE','$STOCK','$PRECIOV','$CATEGORIA')";

			if (!mysql_query($INSERT_USER)) {
				# code...
				echo "ERROR AL INSERTAR PRODUCTO";
				echo "nombre" .$NOMBRE;
				echo "des".$DESCRIPCION;
				echo "fecha".$FECHA;
				echo "cod".$CODIGO;
				echo "ima".$IMAGEN;
			   	echo "cate" .$CATEGORIA; 
			    echo "stock".$STOCK;
			    echo "precio".$PRECIOV; 
	
			} else {

		
				$query= mysql_query("SELECT * FROM producto WHERE nombre='$NOMBRE' ");
				$array = mysql_fetch_array($query);
				$result = mysql_num_rows($query);
				if ($result > 0) {

					$GET_ID = $array['idProducto'];
					# code...
				
					header("Location: ../Vista/producto.php");

				} else {
					echo "id: ".$result;
				}
		
			}
		}
?>