<?php
	include_once("conexion.php");

	$cnn = new connexion();
	$con = $cnn -> conectar();
	$database = mysqli_select_db($con,"inventario") or die("Error al conectar la base de datos");

	$USER_NAME = $_POST['usuario'];
	$PASSWORD = $_POST['password'];

	$sql = "SELECT RolUsuario.idRol, RolUsuario.idUsuario, Usuario.idUsuario, Usuario.nombre, Usuario.apellidoPaterno FROM Usuario INNER JOIN RolUsuario ON RolUsuario.idUsuario = Usuario.idUsuario WHERE login='$USER_NAME' AND password = md5('$PASSWORD') AND estado = '1'";

//SELECT RolUsuario.idRol, RolUsuario.idUsuario, Usuario.idUsuario, Usuario.nombre, Usuario.apellidoPaterno FROM Usuario INNER JOIN RolUsuario ON RolUsuario.idUsuario = Usuario.idUsuario WHERE login='vime8993211' AND password = '8607d17b90e02ae2039051011bc3b7b7' AND estado = '1'

	$result = mysqli_query($con,$sql);
	$count = mysqli_num_rows($result);
  if ($count == 1) {
		# code...
		session_start();
		$row = mysqli_fetch_assoc($result);
		$_SESSION['rol'] = $row['idRol'];
    $_SESSION['usuario'] = $row['nombre']." ".$row['apellidoPaterno'];
    $_SESSION['nickname'] = $row['login'];
    $_SESSION['loggedin'] = true;

		switch ($row['idRol']) {
			case '1':
				# code...
				header("location: ../Vista/welcome.php");
				break;

			case '2':
				# code...
				header("location: ../Vista/welcome.php");
				break;

			case '3':
				# code...
				header("location: ../Vista/welcome.php");
				break;

			default:
				# code...
				header("location: ../Vista/index.php?code=00");
				break;
		}


	} else {
    # code...
    header("location: ../Vista/index.php?code=00");
	}

?>
