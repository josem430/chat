<?php
	require_once("../bd/conexion.php");

	$retorno=array();

	$id_usuario=$_POST["usuario"];
	$id_amigo=$_POST["codigo_usuario"];

	$sql="SELECT * FROM tbl_amigos WHERE id_usuario=".$id_usuario." AND id_amigo=". $id_amigo ;

	$jose=$conexion->query($sql);

	if (mysqli_num_rows($jose)>0) {
		$retorno["mensaje"]="Ya tienes agregado a esta persona";
	}
	else{

		$sql="INSERT INTO tbl_amigos (id_usuario,id_amigo) VALUES ('$id_usuario','$id_amigo')";
		$conexion->query($sql);
		if (mysqli_affected_rows($conexion)>0){
			$sql="INSERT INTO tbl_amigos (id_usuario,id_amigo) VALUES ('$id_amigo','$id_usuario')";
			$conexion->query($sql);

			if (mysqli_affected_rows($conexion)>0){
				$retorno["mensaje"]="Agregado correctamente";
				$retorno["resultado"]=1;
			}

		}	
	}

	mysqli_close($conexion);
	echo json_encode($retorno);
?>