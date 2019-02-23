<?php
	require_once("../bd/conexion.php");

	$retorno=array();

	$usuario=$_POST["usuario"];
	$contra=$_POST["contrasena"];

	$sql="SELECT codigo_usuario FROM tbl_user WHERE codigo_usuario=".$usuario ." AND password=".$contra;

	$resultado=$conexion->query($sql);
	 
	if(!$resultado){
		$retorno["mensaje"]=2;
	}
	else{
		$retorno["mensaje"]=1;
	}
	
	echo json_encode($retorno);
?>