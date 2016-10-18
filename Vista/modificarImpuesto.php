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
    <link rel="shortcut icon" href="img/favicon.ico">

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

<style type="text/css">
  .navbar{
    margin-left: 180px;
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

           <button class="btn btn-default pull-right " > <span class="glyphicon glyphicon-user" class="navbar-link"></span> Bienvenid@: <a href="perfil.php" class="navbar-link"><?php echo $_SESSION['usuario']; ?></a></button>

          <a href="logout.php"><button class="btn btn-danger pull-right" > <span class="glyphicon glyphicon-log-out" class="navbar-link"></span>Cerrar sesión</button></a>


    <div class="main-content">

          <div class="menu">

              <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                     <form class="form-horizontal form-label-left" action="../Controlador/UpdateImpuesto.php" method="POST">
                        <span class="section"><h2>Editar Impuesto</h2></span>

                        <?php
                        if (!empty($_GET['id'])) {
                          # code...
                          include_once("../Controlador/conexion.php");

                          $cnn = new connexion();
                          $con = $cnn -> conectar();
                          $database = mysqli_select_db($con,"inventario");
                          $ID = $_GET['id'];
                          $SELECT_USER = "SELECT * FROM impuesto WHERE idImpuesto='$ID'";
                          $QUERY_USER = mysqli_query($con,$SELECT_USER);
                          $DATA = mysqli_fetch_assoc($QUERY_USER);
                          //while ($DATA = mysqli_fetch_array($QUERY_USER):
                      ?>

                      <?php }?>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Nombre Impuesto</label>
                          <div class="col-md-6 col-sm-6 col-xs-9">
                            <input type="text" class="form-control" id="nombreImp" name="nombreImp" value="<?php echo $DATA['nombre']; ?>" >

                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Porcentaje </label>
                          <div class="col-md-6 col-sm-6 col-xs-9">
                            <input type="text" class="form-control" id="impPor" name="impPor" value="<?php echo $DATA['Ice']; ?>">

                          </div>
                        </div>



                          <div class="item form-group">

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="hidden" id="telefono" name="id" placeholder="73738238"  data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $DATA['idImpuesto']; ?>">
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <button id="send" type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                          </div>

                        </form>
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
      $('#formClienteM').bootstrapValidator({
        message: 'Este valor no es válido',

      fields: {

      nombreCliente: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre  de categoría no puede estar vacío'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'EL campo debe estar entre 3-30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZñÑ_\.]+$/,
                        message: 'El nombre consiste en letras'
                    }
                }
            },
     cedulaCliente: {
                message: 'El nombre no es válido',
                validators: {
                    notEmpty: {
                        message: 'El campo no puede estar vacío'
                    },
                    stringLength: {
                        min: 7,
                        max: 13,
                        message: 'EL campo debe estar entre 7-13 caracteres'
                    },
                    regexp: {
                        regexp: /^([Ee]{0,1})([-]{0,1})([0-9]{5,9})([-]{0,1})([0-9]{0,1})([a-zA-Z]{0,1})+$/,
                        message: 'El nombre consiste en valores numericos'
                    }
                }
            },



      }

      });
      });

    </script>

</body>

</html>
