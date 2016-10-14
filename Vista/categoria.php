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
    <link rel="shortcut icon" href="img/favicon.ico">

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
     <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.min.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.scss">

    <script src="../Vista/js/jquery.min.js"></script>

    <script src="../Vista/js/bootstrap.min.js"></script>
    <link href="../Vista/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../Vista/css/dataTables.css">

    <script type="text/javascript" charset="utf8" src="../Vista/js/dataTables.js"></script>

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

             <button class="btn btn-default pull-right" > <span class="glyphicon glyphicon-user" class="navbar-link"></span> Bienvenid@: <a href="perfil.php" class="navbar-link"><?php echo $_SESSION['usuario']; ?></a></button>

           <a href="logout.php"> <button class="btn btn-danger pull-right" > <span class="glyphicon glyphicon-log-out" class="navbar-link"></span>Cerrar sesión</button></a>


      		<div class="menu">

            <div class="right_col" role="main">
              <div class="">
                <div class="page-title">

                </div>

                <div class="clearfix"></div>

                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_content">

                           <!-- Insert Table User -->


                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="x_panel">
                                      <div class="x_title">
                                        <h2>Lista de Categorías<small></small></h2>
                                        <br>

                                        <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">

                                        <table id="tbCategoria" class="table table-striped table-bordered dt-responsive nowrap">
                                          <thead>
                                            <tr>

                                              <th>Categoria</th>
                                              <th>Impuesto</th>
                                              <th>Editar</th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                                   <?php
                                                   include_once("../Controlador/conexion.php");

                                                 	 $cnn = new connexion();
                                                 	 $con = $cnn -> conectar();
                                                 	 $database = mysqli_select_db($con,"inventario") or die("Error al conectar la base de datos");
                                                   $queryCategoria="SELECT * FROM categoria c INNER JOIN impuesto i ON c.idImpuesto=i.idImpuesto";
                                                   $getAll = mysqli_query($con,$queryCategoria);
                                                   while ($row = mysqli_fetch_array($getAll)):
                                                   ?>
                                                   <tr>
                                                     <td><?php echo $row ['descripcion'];?></td>
                                                     <td><?php echo $row ['Ice'];?> </td>


                                                       <td class="center">
                                                                <a class="btn btn-info btn-xs" href="modificarCategoria.php?id=<?php echo $row ['idCategoria'];?>">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

                                                                </a>
                                                            </td>



                                                    </tr>
                                                   <?php endwhile; ?>
                                          </tbody>
                                        </table>

                                      </div>
                                    </div>
                                  </div>
                          </div>
                               <!-- Insert Form New Register -->
                                 <!-- form input mask -->
                  <div class="col-md-6 col-sm-12 col-xs-12 ">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Nueva Categoría</h2>

                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />

                        <form class="form-horizontal form-label-left" action="../Controlador/CategoriaControlador.php" method="POST" id="formCategoria">

                            <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="nombreCategoria"  class="form-control col-md-7 col-xs-12"  data-validate-length-range="6" data-validate-words="2" name="nombreCategoria"   type="text" >
                                      </div>
                                    </div>


                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Impuesto <span class="required">*</span>
                                      </label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select id="nombreImpuesto" name="nombreImpuesto" class="form-control">

                                                      <?php
                                                       $queryRoles="SELECT * FROM impuesto";
                                                       $getAll = mysqli_query($con,$queryRoles);
                                                      while($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)){ ?>
                                                        <option value="<?php echo $row['idImpuesto']; ?>"><?php echo $row['nombre']; ?></option>
                                                      <?php }?>
                                                </select>

                                             </div>

                                             <div>
                                                </img><a href="../Vista/impuesto.php"><img src="../Vista/images/agregar.png"></a>

                                            </div>


                                   </div>
                          <div class="ln_solid"></div>

                          <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">

                              <button type="submit" class="btn btn-success">Registrar</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- /form input mask -->





                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>











		   </div>


	    </div>


<script>
    $(document).ready(function () {
    $('#tbCategoria').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se econtraron registros",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No se encontraron registros",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Buscar",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },

            }
        } );
});
</script>


    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/npm.js"></script>
	<script src="../Vista/js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrapValidator.js"></script>
  <script type="text/javascript" src="js/bootstrapValidator.min.js"></script>
  <script src="../Vista/js/jquery.dataTables.min.js"></script>
  <script src="../Vista/sjs/dataTables.bootstrap.min.js"></script>
	<script>

		$(function () {

			var links = $('.sidebar-links > div');

			links.on('click', function () {

				links.removeClass('selected');
				$(this).addClass('selected');

			});
		});

	</script>
    <script type="text/javascript">

      $(document).ready(function() {
      $('#formCategoria').bootstrapValidator({
        message: 'Este valor no es válido',

      fields: {

      nombreCategoria: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre  de categoría no puede estar vacío'
                    },
                    stringLength: {
                        min: 5,
                        max: 30,
                        message: 'EL campo debe estar entre 5-30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZñÑ_\.]+$/,
                        message: 'El nombre consiste en letras'
                    }
                }
            },




      }

      });
      });

    </script>


</body>

</html>
