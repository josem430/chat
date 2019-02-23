<?php

	$retorno=array();		

	require_once("../bd/conexion.php");

	$sql="SELECT 

	amgus.codigo_usuario,
	CONCAT(amgus.nombres,' ',amgus.apellidos) as nombres,
	amgus.foto_perfil

	FROM tbl_amigos amg

	INNER JOIN tbl_user amgus ON
	amg.id_amigo=amgus.codigo_usuario

	WHERE amg.id_usuario=".$_POST["usuario"]."

	ORDER BY nombres";

	$resultados=$conexion->query($sql);

	if ($resultados->num_rows > 0) {
		$retorno["amigos"]=$resultados->fetch_all(MYSQLI_BOTH);
	}

	mysqli_close($conexion);

	echo json_encode($retorno);	
?>