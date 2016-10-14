<?php
	require('../Controlador/conexion.php');
	
	session_start();
	
	if(isset($_SESSION["id_usuario"])){
		header("Location: welcome.php");
	}
	
	if(!empty($_POST))
	{
		include_once "../Controlador/conexion.php";
  		$cnn = new connexion();
  		$con = $cnn -> conectar(); 
  		$database = mysqli_select_db($con,"inventario");
		
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$error = '';
		
		$pass = md5($password);
		
		$sql = "SELECT r.idRolUsuario, r.idRol FROM rolusuario r INNER JOIN usuario u ON r.idUsuario=u.idUsuario WHERE u.login = '$usuario' AND u.password = '$pass'";

		$result=mysqli_query($con,$sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['idRolUsuario'];
			$_SESSION['tipo_usuario'] = $row['idRol'];
			
			header("location: welcome.php");
			} else {
			$error = "El nombre o contraseña son incorrectos";
		}
	}
?>
<!DOCTYPE html>
<html >
  <head>
  	  <link rel="shortcut icon" href="img/favicon.ico">
    <meta charset="UTF-8">
    <title>SUPERSOL</title>

        <link rel="stylesheet" href="css/style.css">
   
    
  </head>

  <body>

    <div class="wrapper">
	  <div class="container">
		<h1>Bienvenid@</h1>
		
		<form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
			<input type="text" placeholder="Usuario" id="usuario" name="usuario">
			<input type="password" placeholder="Contraseña" id="password" name="password">
			<button type="submit" id="login-button" value="login">Ingresar</button>
		</form>
	</div>
	
	
</div>
  
    
    
  </body>
</html>
