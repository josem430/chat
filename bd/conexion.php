<?php
	if (!$conexion=mysqli_connect("localhost","root","","redsocial")) {
		die('Ha ocurrido un error al conectar la bd [' . $conexion->error . ']');
	}
?>