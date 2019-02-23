<?php
	require_once("../bd/conexion.php");

	$usuario=$_POST["usuario"];
	
	$retorno=array();

	$sql="SELECT user 

	FROM tbl_user

	WHERE user='$usuario'";
	
	if (!$resultado=$conexion->query($sql)) {
		die('Ha ocurrido un error en la consulta de datos [' . $conexion->error . ']');
	}
	
	$retorno["resultado"]=$resultado->fetch_all(MYSQLI_BOTH);
	
	mysqli_close($conexion);

	echo json_encode($retorno);
?>