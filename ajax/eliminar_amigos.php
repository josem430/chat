<?php
	require_once("../bd/conexion.php");

	$retorno=array();

	$jose=1;

	$martinez=2;

	$sql="DELETE FROM tbl_amigos WHERE id_amigo=".$_POST["codigo_amigo"]." AND id_usuario=". $_POST["usuario"];

	$conexion->query($sql);

	if ($conexion->affected_rows >=1) {
		$retorno["resultado"]=1;

		$sql="DELETE FROM tbl_amigos WHERE id_amigo=". $_POST["usuario"]." AND id_usuario=". $_POST["codigo_amigo"];
		$conexion->query($sql);
	}else{
		$retorno["resultado"]=2;
	}

	echo json_encode($retorno);
?>