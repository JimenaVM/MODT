<?php
  include_once "../Controlador/conexion.php";
  $cnn = new connexion();
  $con = $cnn -> conectar();
  $database = mysql_select_db("inventario") or die ("Error al Conectar con BD");
  
  $USER = $_POST['usuario'];
  $PASSWORD = $_POST['password'];

  $sql = "SELECT * FROM rolusuario WHERE login = '$USER' AND password = md5('$PASSWORD') AND idRol='3'";
  $result=$mysqli->query($sql);
  $count = $result->num_rows;

  $jsonArray = array();
  
  if ($count == 1) {
    $jsonArray["auth"][] = 1;
  } else {
    $jsonArray["auth"][] = 0;
  }
  
  mysql_close($con);

  echo json_encode($jsonArray);
?>