<?php 
  include_once "../Controlador/conexion.php";
  $cnn = new connexion();
  $con = $cnn -> conectar();
  $database = mysqli_select_db($con,"inventario");

      #nombre usuario
  $idUsuario = $_SESSION['id_usuario'];
  
  $sql = "SELECT u.IdRolUsuario, p.nombre FROM rolusuario AS u INNER JOIN usuario AS p ON u.idUsuario=p.idUsuario WHERE u.idUsuario = '$idUsuario'";
  $result=mysql_query($con,$sql);
  
  $row = $result->fetch_assoc();

  include_once "../Controlador/conexion.php";
  $cnn = new connexion();
  $con = $cnn -> conectar();
  $database = mysql_select_db("inventario") or die ("Error al Conectar con BD");





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

           <button class="btn btn-default pull-right " > <span class="glyphicon glyphicon-user" class="navbar-link"></span> Bienvenid@: <a href="perfil.php" class="navbar-link"><?php echo ''.utf8_decode($row['nombre']); ?></a></button>
              
          <a href="logout.php"><button class="btn btn-danger pull-right" > <span class="glyphicon glyphicon-log-out" class="navbar-link"></span>Cerrar sesión</button></a>  



        <div class="main-content">

          <div class="menu">
              

              <!-- FORM ACTUALIZAR -->
                      <form class="form-horizontal form-label-left" action="../Controlador/UpdateCategoria.php" method="POST">
                       <div class="centrado-porcentual">
                        <span class="section"><h2>Editar Categoría<small></small></h2></span>
                        <br><br>
                        <?php
                          if (!empty($_GET['id'])) {
                             # code...
                            $ID = $_GET['id'];
                              $SELECT_USER = "SELECT * FROM categoria c INNER JOIN impuesto i ON c.idImpuesto=i.idImpuesto where c.idCategoria='$ID'";
                              $QUERY_USER = mysql_query($SELECT_USER);
                              while ($DATA = mysql_fetch_array($QUERY_USER)):
                        ?>
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nombre Categoría</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" id="nombreCat" name="nombreCat" value="<?php echo $DATA['descripcion']; ?>" >
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Impuesto</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                               <select id="nombreImpuesto" name="nombreImpuesto" class="form-control" value>
                                <option value="0">Seleccione impuesto..</option>
                            
                                                  
                                                  <?php 
                                                   $queryRoles="SELECT * FROM impuesto";
                                                   $getAll = mysql_query($queryRoles);
                                                  while($row = mysql_fetch_array($getAll, MYSQLI_ASSOC)){ ?>
                                                  <option value="<?php echo $row['idImpuesto']; ?>" <?php if ($row['idImpuesto'] == $DATA['idImpuesto']) {
                                                        # code...
                                                        echo "selected";
                                                      }?> ><?php echo $row['nombre']; ?></option>
                                                    <?php }?>

                                 </select>
                        </div>
                      </div>
                          
                    

                        <div class="item form-group">
                        
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" id="telefono" name="id" placeholder="73738238"  data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $DATA['idCategoria']; ?>">

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
