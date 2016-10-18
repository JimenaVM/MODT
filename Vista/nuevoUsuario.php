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
      <div class="menu ">
        <h1>Nuevo Usuario<small></small></h1>
        <div class="clearfix"></div>
         <div class="x_content">
             <form id="formUsuario" class="form-horizontal form-label-left" action="../Controlador/UsuarioControlador.php" method="POST">
               <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <input id="name"  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"   type="text">
                 </div>
               </div>
               <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido Paterno <span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <input id="apellidoPaterno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellidoPaterno"  type="text">
                 </div>
               </div>
               <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido Materno <span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <input id="apellidoMaterno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellidoMaterno"   type="text">
                 </div>
               </div>
               <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <input type="email" id="email" name="email" placeholder="ejemplo@dominio.com"  class="form-control col-md-7 col-xs-12">
                 </div>
               </div>
               <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Teléfono <span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <input type="tel" id="telefono" name="telefono"  data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                 </div>
               </div>
               <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Cédula <span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <input type="tel" id="carnet" name="carnet" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                 </div>
               </div>
               <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Empresa <span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <select id="nombreEmpres" name="nombreEmpres" class="form-control">
                     <option value="0">Seleccione Empresa...</option>
                     <?php
                      include_once("../Controlador/conexion.php");

                      $cnn = new connexion();
                      $con = $cnn -> conectar();
                      $database = mysqli_select_db($con,"inventario") or die("Error al conectar la base de datos");
                      $queryCat="SELECT * FROM empresa";
                      $getAll = mysqli_query($con,$queryCat);
                      while($row = mysqli_fetch_array($getAll)){ ?>
                      <option value="<?php echo $row['idEmpresa']; ?>"><?php echo $row['nombreEmpresa']; ?></option>
                     <?php }?>
                   </select>
                  </div>
               </div>
               <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Roles <span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <?php
                    $queryRoles="SELECT * FROM rol";
                    $getAll = mysqli_query($con,$queryRoles);
                    while ($row = mysqli_fetch_array($getAll)):
                    ?>
                     <div class="col-md-12 col-sm-12 col-xs-6">
                         <label class="checkbox-inline">
                         <input type="checkbox" id="rol" value="<?php echo $row ['idRol'];?>" name="rol[]"> <?php echo $row ['tipo'];?>
                         </label>
                     </div>
                   <?php endwhile; mysqli_close($con);?>
                 </div>
               </div>
               <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button id="send" type="submit" class="btn btn-success">Registrar</button>
                  </div>
                </div>
             </form>
         </div>
      </div>
      </div>
      <script src="js/bootstrap.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/npm.js"></script>
      <script src="../Vista/js/jquery.min.js"></script>
      <script type="text/javascript" src="js/bootstrapValidator.js"></script>
      <script type="text/javascript" src="js/bootstrapValidator.min.js"></script>
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
          $('#formUsuario').bootstrapValidator({
            message: 'Este valor no es válido',

          fields: {

          name: {
                    message: 'El nombre no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El campo no puede estar vacío'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'EL campo debe estar entre 3-30 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-ZñÑ\s]+$/,
                            message: 'El campo solo acepta letras'
                        }
                    }
                },
          apellidoPaterno:{
                      message: 'El apellido no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El campo no puede estar vacío'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'EL campo debe estar entre 3-30 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-ZñÑ_\.]+$/,
                            message: 'El campo solo acepta letras'
                        }
                    }

          },


         email:{
           validators: {
                        notEmpty: {
                            message: 'El campo no puede estar vacío'
                        },

                       emailAddress: {

                           message: 'El correo electronico no es valido'

                         }
                    }


         },

         telefono:{
                  validators: {
                        notEmpty: {
                            message: 'El campo no puede estar vacío'
                        },
                       stringLength: {
                            min: 7,
                            max: 8,
                            message: 'El campo debe estar entre 7-8 caracteres'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'El campo solo acepta numeros'
                        }
                    }

         },

        carnet:{

           validators: {
                        notEmpty: {
                            message: 'El campo no puede estar vacío'
                        },
                       stringLength: {
                            min: 7,
                            max: 8,
                            message: 'El campo debe estar entre 7-13 caracteres'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'El campo solo acepta numeros'
                        }
                    }

        },


     roles:{

           validators: {
                        notEmpty: {
                            message: 'El campo no puede estar vacío'
                        },

                    }

        },
          }

          });
          });

        </script>

  </body>
</html>
