
<?php
  include_once("conexion.php");
  $cnn= new connexion();
  $con =$cnn->conectar();
  mysqli_select_db($con,"inventario");
  $nombre = strtoupper($_POST["nombreCategoria"]);
  $IMPUESTO = $_POST["nombreImpuesto"];

  $VERIFY_USER = "SELECT * FROM categoria WHERE descripcion='$nombre'";
  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
  $TAM = mysqli_num_rows($QUERY_VERIFY);
  if ($TAM > 0) {
    header('location:../vista/categoria.php?error=201');
  } else {
    $QUERY_INSERT = "INSERT INTO categoria(idCategoria,descripcion,idImpuesto)
							VALUES('','$nombre','$IMPUESTO')";
      if(!mysqli_query($con, $QUERY_INSERT)) {
        die("Error al insertar categoria nuevo");
      } else{
        header('location:../vista/categoria.php');
      }
  }
  mysqli_close($con);
?>