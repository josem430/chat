<?php
	require_once("../bd/conexion.php");

	$retorno=array();

	$id_usuario=$_POST["usuario"];
	$id_amigo=$_POST["amigo"];


	$sql="SELECT 
	
	(SELECT concat(usr.nombres,' ',usr.apellidos) FROM tbl_user usr where usr.codigo_usuario=". $id_amigo.") as amigo,
	us.foto_perfil,
	mens.id_mensaje,
	mens.id_usuario,
	mens.id_amigo,
	mens.mensaje, 
	mens.fecha_sistema
		
	FROM tbl_mensajes mens

	INNER JOIN tbl_user us ON
	mens.id_usuario=us.codigo_usuario

	WHERE (mens.id_usuario=". $id_usuario . " and mens.id_amigo=".$id_amigo .") or (mens.id_usuario=". $id_amigo ." and mens.id_amigo=". $id_usuario .") 

	order by mens.fecha_sistema";
	
	if (!$resultados=$conexion->query($sql)) {
		die('Ha ocurrido un error en la consulta de datos [' . $conexion->error . ']');
	}

	$retorno["mensajes"]=$resultados->fetch_all(MYSQLI_BOTH);
	
	mysqli_close($conexion);
	
	echo json_encode($retorno);
?>