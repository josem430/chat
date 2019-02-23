<?php
	require_once("../bd/conexion.php");

	$retorno=array();

	$sql="SELECT 

	us.foto_perfil,
	concat(us.nombres,' ',us.apellidos) as 'nombre_usuario',
	us.nombres,
	us.apellidos,
	us.telefono,
	us.correo,
	us.sexo


	FROM tbl_user us

	WHERE us.codigo_usuario=".$_POST["usuario"];

	if (!$resultados=$conexion->query($sql)) {
		die('Ha ocurrido un error en la consulta de datos [' . $conexion->error . ']');
	}
	$retorno["datos"]=$resultados->fetch_all(MYSQLI_BOTH);

	foreach ($resultados as $resultado) {
		$retorno["resultado"]=$resultado["foto_perfil"];
		$retorno["nombre_usuario"]=$resultado["nombre_usuario"];
	}
	echo json_encode($retorno);
?>