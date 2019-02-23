<?php
	require_once("../bd/conexion.php");

	$sql="SELECT 

	concat(usr.nombres,' ',usr.apellidos) as 'amigo',
	amg.id_amigo

	FROM tbl_amigos amg

	INNER JOIN tbl_user usr ON
	amg.id_amigo=usr.codigo_usuario

	WHERE amg.id_usuario=". $_POST["usuario"]." AND usr.estado=1

	order by usr.nombres";

	if (!$resultados=$conexion->query($sql)) {
		die('Ha ocurrido un error en la consulta de datos [' . $conexion->error . ']');
	}

	$retorno["amigos"]=$resultados->fetch_all(MYSQLI_BOTH);
		
	mysqli_close($conexion);
	
	echo json_encode($retorno);
?>