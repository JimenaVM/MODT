<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    # code...
    header("location: index.php");
}
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
        <?php if($_SESSION['rol']==1) { ?>
  			<div class="link-blue">
          <a href="#">
  					<i></i>Principal
  				</a>
  				<ul class="sub-links">
  					<li><a href="usuario.php">Usuarios</a></li>
  					<li><a href="#">Auditoria</a></li>
  				</ul>
  			</div>
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
  			<div class="link-yellow">
  				<a href="#">
  					<i ></i>Ventas
  				</a>
  				<ul class="sub-links">
  					<li><a href="#">Generar Venta</a></li>
  					<li><a href="#">Dosificación</a></li>
  					<li><a href="#">Facturación</a></li>
  				</ul>
  			</div>
  			<div class="link-green">
  				<a href="#">
  					<i ></i>Clientes
  				</a>
  				<ul class="sub-links">
  					<li><a href="cliente.php">Administrar Clientes</a></li>
  					<li><a href="empresa.php">Administrar Empresas</a></li>
  				</ul>
  			</div>
  			<div class="link-pink">
  				<a href="#">
  					<i ></i>Créditos
  				</a>
  				<ul class="sub-links">
  					<li><a href="credito.php">Administrar Creditos</a></li>
  				</ul>
  			</div>
  			<div class="link-orange">
  				<a href="#">
  					<i ></i>Promociones
  				</a>
  				<ul class="sub-links">
  					<li><a href="promocion.php">Administrar Promoción</a></li>
  				</ul>
  			</div>
  			<div class="link-orange">
  				<a href="#">
  					<i ></i>Reportes y Dashboards
  				</a>
  				<ul class="sub-links">
  					<li><a href="#">Administrar Promoción</a></li>
  				</ul>
  			</div>
  			<?php } ?>
  			<?php if($_SESSION['rol']==2) { ?>
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
  			<?php } ?>

  			<?php if($_SESSION['rol']==3) { ?>
          <div class="link-yellow">
    				<a href="#">
    					<i ></i>Ventas
    				</a>
    				<ul class="sub-links">
    					<li><a href="#">Generar Venta</a></li>
    					<li><a href="#">Dosificación</a></li>
    					<li><a href="#">Facturación</a></li>
    				</ul>
  			  </div>
  			<?php } ?>
  		</div>
    </aside>
    <div class="main-content">
      <button class="btn btn-default pull-right " > <span class="glyphicon glyphicon-user" class="navbar-link"></span> Bienvenid@: <a href="perfil.php" class="navbar-link"><?php echo $_SESSION['usuario']; ?></a></button>
      <!-- <a href="logout.php"><button class="btn btn-danger pull-right" > <span class="glyphicon glyphicon-log-out" class="navbar-link"></span>Cerrar sesión</button></a> -->
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
