<?php 
 
session_start();
  $con=require '../Controlador/conexion.php';

  #
   include_once "../Controlador/conexion.php";
  $cnn = new connexion();
  $con = $cnn -> conectar();
  $database = mysqli_select_db($con,"inventario");
  #
  
  if(!isset($_SESSION["id_usuario"])){
    header("Location: ../Vista/index.php");
  }
  
  $sql = "SELECT idRol, tipo FROM rol";
  $result=mysqli_query($con,$sql);
  
  $bandera = false;
  
  #nombre usuario
  $idUsuario = $_SESSION['id_usuario'];
  
  $sql = "SELECT u.IdRolUsuario, p.nombre FROM rolusuario AS u INNER JOIN usuario AS p ON u.idUsuario=p.idUsuario WHERE u.idUsuario = '$idUsuario'";
  $result=mysqli_query($con,$sql);
  
  $row = $result->fetch_assoc();


?>

<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" href="img/favicon.ico">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
          <li><a href="">Categorías</a></li>
          <li><a href="producto.php">Productos</a></li>
          <li><a href="proveedor.php">Proveedores</a></li>
        
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
          <li><a href="#">Administrar Creditos</a></li>
          
        </ul>

      </div>
      <div class="link-orange">

        <a href="#">
          <i ></i>Promociones
        </a>

        <ul class="sub-links">
          <li><a href="#">Administrar Promoción</a></li>
                    
        </ul>

      </div>
      <div class="link-orange">

        <a href="#">
          <i ></i>Reportes y Dashboards
        </a>

        <ul class="sub-links">
          <li><a href="promocion.php">Ventas Diarias</a></li>
                    
        </ul>

      </div>
      

    </div>

    </aside>



        <div class="main-content">

             <button class="btn btn-default pull-right" > <span class="glyphicon glyphicon-user" class="navbar-link"></span> Bienvenid@: <a href="perfil.php" class="navbar-link"><?php echo ''.utf8_decode($row['nombre']); ?></a></button>
                
           <a href="logout.php"> <button class="btn btn-danger pull-right" > <span class="glyphicon glyphicon-log-out" class="navbar-link"></span>Cerrar sesión</button></a>
               

          <div class="menu">

            

            <!-- FORM ACTUALIZAR -->
                      <form  id="frmProv"class="form-horizontal form-label-left" action="../Controlador/UpdateProveedor.php" method="POST">
                        <br>
                        <span class="section"><h1>Editar Proveedor</h1></span>
                        <?php
                          if (!empty($_GET['id'])) {
                             # code...
                            $ID = $_GET['id'];
                              $SELECT_USER = "SELECT * FROM proveedor WHERE idProveedor='$ID'";
                              $QUERY_USER = mysqli_query($con,$SELECT_USER);
                              while ($DATA = mysqli_fetch_array($QUERY_USER)):
                        ?>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="NombreProv" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="NombreProv" placeholder="Jon Doe"  type="text" value="<?php echo $DATA['nombre']; ?>">
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nit<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="NitProv" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="NitProv"  type="text" value="<?php echo $DATA['nit']; ?>">
                          </div>
                        </div>
                        
                                
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Número de autorización<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="NumProv" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="NumProv" type="text" value="<?php echo $DATA['numeroAutorizacion']; ?>">
                          </div>
                        </div>


                     <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Estado <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                           <select  class="form-control" name="estado">
                              <?php 
                                $ESTADO = $DATA['estado'];
                                if ($ESTADO == 0) {
                                  # code...
                                  echo '<option selected="selected" value="0">Inactivo</option>';
                                  echo '<option value="1">Activo</option';
                                } else {
                                  echo '<option selected="selected" value="1">Activo</option>';
                                  echo '<option value="0">Inactivo</option>';
                                }
                              ?>
                           </select>
                          </div>
                        </div>

                        <div class="item form-group">
                        
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" id="telefono" name="id" placeholder="73738238"  data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $DATA['idProveedor']; ?>">
                          </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <button id="send" type="submit" class="btn btn-success">Actualizar</button>
                          </div>
                        </div>
                        <?php
                            endwhile;
                          }
                        ?>
                      </form>








                       
       </div>


      </div>

  

<script type="text/javascript">

      $(document).ready(function() {
      $('#frmProv').bootstrapValidator({
        message: 'Este valor no es válido',

      fields: {

      NombreProv: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El campo no puede estar vacío'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'EL campo debe estar entre 5-30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZñÑ_/.]+$/,
                        message: 'El nombre consiste en letras'
                    }
                }
            },
     
      NitProv:{
         message: 'El nit no es válido',
                validators: {
                    notEmpty: {
                        message: 'El campo no puede estar vacío'
                    },
                    stringLength: {
                        min: 5,
                        max: 16,
                        message: 'EL campo debe contener 9 caracteres'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'El campo solo acepta numeros'
                    }
                }

      },
       NumProv:{
         message: 'El número de autorización no es válido',
                validators: {
                    notEmpty: {
                        message: 'El campo no puede estar vacío'
                    },
                    stringLength: {
                        min: 9,
                        max: 16,
                        message: 'EL campo debe contener 9-16 caracteres'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'El campo solo acepta numeros'
                    }
                }

      },
    

      }

      });
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
