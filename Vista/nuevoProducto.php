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
     <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css.map">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css.map">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css.map">
     <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.min.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.scss">

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
           <li><a href="almacen.php">Almacen</a></li>
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

          <a href="logout.php"><button class="btn btn-danger pull-right" > <span class="glyphicon glyphicon-log-out" class="navbar-link"></span>Cerrar sesión</button></a>


          <div class="menu">
            <?php
            include_once("../Controlador/conexion.php");

            $cnn = new connexion();
            $con = $cnn -> conectar();
            $database = mysqli_select_db($con,"inventario") or die("Error al conectar la base de datos");
            ?>

            <form id="formProducto" class="form-horizontal form-label-left"  enctype="multipart/form-data" action="../Controlador/ProductoControlador.php" method="POST">

                                  <span class="section"><h1>Nuevo Producto</h1></span>

                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Código <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="codigoProd" name="codigoProducto" class="form-control col-md-7 col-xs-12">
                                      </div>
                                    </div>

                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="nomProd" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" data-validate-words="2"  name="nomProducto"  type="text">
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Descripción <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="desProd" class="form-control col-md-7 col-xs-12" data-validate-length-range="20" data-validate-words="2" name="desProducto"   type="text">
                                      </div>
                                    </div>

                                     <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Categoría <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">


                                              <select id="nombreCat" name="nombreCat" class="form-control">
                                                    <option value="0">Seleccione Categoría...</option>
                                                    <?php
                                                    $queryCat="SELECT * FROM Categoria";
                                                    $getAll = mysqli_query($con,$queryCat);
                                                    while($row = mysqli_fetch_array($getAll)): ?>
                                                      <option value="<?php echo $row['idCategoria']; ?>"><?php echo $row['descripcion']; ?></option>
                                                    <?php
                                                  endwhile;
                                                    ?>
                                              </select>

                                      </div>
                                    </div>
                                     <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unidad medida<span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">


                                              <select id="unidadMed" name="unidadMed" class="form-control">
                                                    <option value="">Seleccione Unidad...</option>
                                                    <?php
                                                     $queryCat="SELECT * FROM unidadmedida";
                                                     $getAll = mysqli_query($con,$queryCat);
                                                    while($row = mysqli_fetch_array($getAll)):?>
                                                      <option value="<?php echo $row['idUnidadMedida']; ?>"><?php echo $row['tipo']; ?></option>
                                                    <?php
                                                  endwhile;
                                                    ?>
                                              </select>

                                      </div>
                                    </div>

                                   <!--Insertar foto-->

                                   <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Foto <span class="required" >*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">

                                        <input id="imagen" type="file"  name="imagen" class="btn btn-success"/>

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
      $('#formProducto').bootstrapValidator({
        message: 'Este valor no es válido',
      fields: {

      nomProducto: {
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

        desProducto: {
                message: 'El campo no es válido',
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
