<?php
class connexion{
	function conectar(){
		return mysqli_connect("localhost", "root", "");
	}
}
?>
