<?php
	require_once("../bd/conexion.php");

	$retorno=array();

	$sql="SELECT 

	usr.codigo_usuario,
	usr.foto_perfil,
	concat(usr.nombres,' ',usr.apellidos) as 'amigo',
	usr.telefono,
	usr.correo,
	usr.estado

	FROM tbl_user usr

	WHERE usr.codigo_usuario=".$_POST["id_amigo"];

	$resultado=$conexion->query($sql);

	if ($resultado->num_rows > 0) {
		$retorno["resultado"]=$resultado->fetch_all(MYSQLI_BOTH);
	}

    mysqli_close($conexion);

    echo json_encode($retorno);
?>