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

  <title>Supersol</title>

  <link rel="stylesheet" href="assets/demo.css">
  <link rel="stylesheet" href="assets/sidebar-collapse.css">

  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

  <link rel="shortcut icon" href="img/favicon.ico">
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
  }
</style>
    <!-- End estilo -->

</head>

<body>
  <?php
  include_once("../Controlador/conexion.php");

  $cnn = new connexion();
  $con = $cnn -> conectar();
  $database = mysqli_select_db($con,"inventario") or die("Error al conectar la base de datos");
  ?>

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

          <a href="logout.php"><button class="btn btn-danger pull-right" > <span class="glyphicon glyphicon-log-out" class="navbar-link"></span>Cerrar sesión</button></a>

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


                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                      <div class="x_title">
                                        <h1>Lista de Productos<small></small></h>
                                        <div class="clearfix"></div>
                                       <a href="../Vista/nuevoProducto.php"> <button class="btn btn-success" > <span class="glyphicon glyphicon-plus"></span>Nuevo Producto</button></a>
                                      </div>
                                      <div class="x_content">

                                        <table class="table table-striped table-bordered">
                                           <thead>
                                      <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Fecha de expiración</th>
                                        <th>Código</th>
                                        <th>Opciones</th>
                                      </tr>
                                    </thead>


                                    <tbody>
                                      <?php
                               $queryProducto="SELECT * FROM producto ";
                               $getAll = mysqli_query($con,$queryProducto);
                               while ($row = mysqli_fetch_array($getAll)):
                               ?>
                               <tr>
                                  <th scope="row"><?php echo '<img width="56" height="56" src='.$row ['foto'].'>';?></th>
                                  <th scope="row"><?php echo $row ['nombre'];?></th>
                                  <td><?php echo $row ['descripcion'];?> </td>
                                  <td><?php echo $row ['fechaExpiracion'];?> </td>
                                  <td><?php echo $row ['codigo'];?> </td>

                                 <td>
                                  <a class="btn btn-info btn-xs" href="modificarProducto.php?id=<?php echo $row ['idProducto'];?>">Editar
                                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

                                  </a>

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






                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

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
      <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>

</body>

</html>
