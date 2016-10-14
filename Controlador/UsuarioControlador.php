<?php

	include_once "conexion.php";

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario");

	$NOMBRE = strtoupper($_POST["name"]);
	$PATERNO =strtoupper( $_POST["apellidoPaterno"]);
	$MATERNO =strtoupper( $_POST["apellidoMaterno"]);
	$EMAIL = $_POST["email"];
	$TELEFONO = $_POST["telefono"];
    $EMPRESA = $_POST["nombreEmpres"];
    $PASSWORD_REAL = getPassword();
	$PASSWORD = MD5($PASSWORD_REAL);
    $CEDULA = $_POST["carnet"];
	$IDROL = $_POST["rol"] ;

	$LOGIN=substr($PATERNO, 0,1).substr($NOMBRE, 0,1).getLogin();

    
  $VERIFY_USER = "SELECT * FROM usuario WHERE nombre='$NOMBRE'|| apellidoPaterno='$PATERNO'||cedula='$CEDULA'||email='$EMAIL'";
  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
  $TAM = mysqli_num_rows($QUERY_VERIFY);
  if ($TAM > 0) {
    header('location:../vista/usuario.php?error=201');
  } else {
  	$INSERT_USER = "INSERT INTO usuario(idUsuario,nombre,apellidoPaterno,apellidoMaterno,email,telefono,estado,cedula,login,password,idEmpresa)
					VALUES('','$NOMBRE','$PATERNO','$MATERNO','$EMAIL','$TELEFONO','0','$CEDULA','$LOGIN','$PASSWORD','$EMPRESA')";
       

	
			if (!mysqli_query($con,$INSERT_USER)) {
				# code...
				echo "ERROR AL INSERTAR USUARIO";
				echo "loginnnnnnnnn:::::".$LOGIN;
				echo "nombre".$NOMBRE;
				echo "nombre".$PATERNO;
				echo "nombre".$MATERNO;
				echo "nombre".$EMAIL;
				echo "nombre".$TELEFONO;
				echo "nombre".$EMPRESA;
				echo "nombre".$PASSWORD;
				echo "nombre".$CEDULA;
			

			} else {
				
				$query= mysqli_query($con,"SELECT * FROM usuario WHERE nombre='$NOMBRE' AND email='$EMAIL' AND cedula='$CEDULA'");
				$array = mysqli_fetch_array($query);
				$result = mysqli_num_rows($query);
				if ($result > 0) {

					$GET_ID = $array['idUsuario'];
					# code...
					foreach ($IDROL as $ID) {
								# code...
						$INSERT_USER_ROL="INSERT INTO rolusuario(idRolUsuario,idUsuario,idRol) VALUES('','$GET_ID','$IDROL')";

						if (!mysqli_query($con,$INSERT_USER_ROL)) {
							# code...
							echo "ERROR AL INSERTAR ROL USUARIO";
						} else {
							//Send Email
							$MENSAJE = "Bievenido al Sistema SUPERSOL, sus credenciales de acceso son: \n usuario: ".$USUARIO." --- password: ".$PASSWORD;
							$to = $EMAIL;
							$subject = 'Credencial de Acceso al Sistema ...';
							$header = 'From: jimenaedith.93@gmail.com'.
							'MIME-Version: 1.0'.'\r\n'.
							'Content-type: text/html; charset=utf-8';
							if (mail($to,$subject,$MENSAJE,$header)) {
							//echo "email enviado!";
							} else {
								echo "error al enviar email!";
							}
						}
								
					}
					header("Location: ../Vista/usuario.php");

				} else {
					echo "id: ".$result;
				}
				
			}
}

	function getPassword($tam=6){
		$ramdon = "abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		return substr(str_shuffle($ramdon), 0, $tam);
	}
	function getLogin($tam=3){
		$ramdon = "1234567890";
		return substr(str_shuffle($ramdon), 0, $tam);
	}
	function getNombre($tam=3){
		$ramdon = "ABCDEFGHAIJK";
		return substr(str_shuffle($ramdon), 0, $tam);
	}

?>