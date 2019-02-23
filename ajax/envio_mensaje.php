<?php
	require_once("../bd/conexion.php");

	$retorno=array();

	$usuario=$_POST["usuario"];
	$amigo=$_POST['amigo'];
	$mensaje=$_POST['mensaje'];

	
	$sql="INSERT INTO 
	tbl_mensajes (id_usuario,id_amigo,mensaje)
	VALUES 
	('$usuario','$amigo','$mensaje')";

	$resultado=$conexion->query($sql);

	mysqli_close($conexion);
	
	echo json_encode($retorno);
?>