<?php
  
  session_start();
  require '../Controlador/conexion.php';
  include_once "../Controlador/conexion.php";
  $cnn = new connexion();
  $con = $cnn -> conectar(); 
  $database = mysqli_select_db($con,"inventario");
  if(!isset($_SESSION["id_usuario"])){
    header("Location: index.php");
  }
  
  $idUsuari = $_SESSION['id_usuario'];
  
  $sql = "SELECT u.idRolUsuario, p.nombre FROM rolusuario AS u INNER JOIN usuario AS p ON u.idUsuario=p.idUsuario WHERE u.idUsuario = '$idUsuari'";
  $result=mysqli_query($con,$sql);
  
  $row = $result->fetch_assoc();
  mysqli_close($con);
?>

<!DOCTYPE html>
<html>

<head>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="shortcut icon" href="images/favicon.ico">

	<title>Supersol</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/sidebar-collapse.css">

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>


    <!-- start estilo -->
     <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css.map">
     <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css.map">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css.map">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css.map">

<style type="text/css">
  .navbar{
    margin-left: 0px;
    .img{
    	width: 10px;
    	height: 10px;
    }
  }
</style>
    <!-- End estilo -->

</head>

<body>


	<aside class="sidebar-left-collapse">
     <a href="" class="company-logo">Supersol</a>
		
		<div class="sidebar-links">
			
			

			<div class="link-red">

				<a href="#">
					<i ></i>Inventarios
				</a>

				<ul class="sub-links">
					<li><a href="categoria.php">Categorías</a></li>
					<li><a href="producto.php">Productos</a></li>
					<li><a href="proveedor.php">Proveedores</a></li>
					<li><a href="#">Link 4</a></li>
				</ul>

			</div>


			
			
        
		</div>

    </aside>



      	<div class="main-content">
      		
	         <button class="btn btn-default pull-right " > <span class="glyphicon glyphicon-user" class="navbar-link"></span> Bienvenid@: <a href="perfil.php" class="navbar-link"><?php echo ''.utf8_decode($row['nombre']); ?></a></button>
	            
      		 <a href="logout.php"><button class="btn btn-danger pull-right" > <span class="glyphicon glyphicon-log-out" class="navbar-link"></span>Cerrar sesión</button></a>
                
	        

      		<div class="menu">

          <h1>MINI MARKET</h1>
          <H2>SUPERSOL</H2>


                       
		   </div>


	    </div>

	



    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/npm.js"></script>
	<script src="../Vista/js/jquery.min.js"></script>
	<script>

		$(function () {

			var links = $('.sidebar-links > div');

			links.on('click', function () {

				links.removeClass('selected');
				$(this).addClass('selected');

			});
		});

	</script>

</body>

</html>
