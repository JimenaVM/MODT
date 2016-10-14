
<?php
  include_once("conexion.php");
  $cnn = new connexion();
  $con = $cnn->conectar();
  $database = mysqli_select_db($con,"inventario");

  $nombre = strtoupper($_POST["nombreCategoria"]);
  $IMPUESTO = $_POST["nombreImpuesto"];

  $VERIFY_USER = "SELECT * FROM Categoria WHERE descripcion='$nombre'";

  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
  $TAM = mysqli_num_rows($QUERY_VERIFY);
  //echo "tam: ".$TAM;
  if ($TAM == 1) {
    header("Location: ../Vista/categoria.php?code=201");

  } else {
    $QUERY_INSERT = "INSERT INTO Categoria(idCategoria,descripcion,idImpuesto) VALUES ('','$nombre','$IMPUESTO')";

      if(!mysqli_query($con, $QUERY_INSERT)) {

      }
      header("Location: ../Vista/categoria.php");
  }
  mysqli_close($con);
?>
