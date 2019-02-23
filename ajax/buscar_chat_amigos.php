<?php
	require_once("../bd/conexion.php");

	$nombre=$_POST["nombre_buscar"];

	$sql="SELECT 

	usr.estado,
	concat(usr.nombres,' ',usr.apellidos) as 'amigo',
	amg.id_amigo

	FROM tbl_amigos amg

	INNER JOIN tbl_user usr ON
	amg.id_amigo=usr.codigo_usuario

	WHERE amg.id_usuario=". $_POST["usuario"]."  AND usr.nombres like '%".$nombre."%'  OR usr.apellidos like '%".$nombre."%'

	order by usr.nombres";

	if (!$resultados=$conexion->query($sql)) {
		die('Ha ocurrido un error en la consulta de datos [' . $conexion->error . ']');
	}

	$retorno["amigos"]=$resultados->fetch_all(MYSQLI_BOTH);
		
	mysqli_close($conexion);
	
	echo json_encode($retorno);
?>