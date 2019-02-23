<?php
	require_once("../bd/conexion.php");

	$nombre=$_POST["nombre"];

	$retorno=array();

	$sql="SELECT 

	ami.id_usuario,
	us.codigo_usuario,
	us.foto_perfil,
	concat(us.nombres,' ',us.apellidos ) as 'nombres'

	FROM tbl_user us

	left join tbl_amigos ami on
	ami.id_usuario = us.codigo_usuario 

	WHERE ami.id_usuario is null and  us.codigo_usuario <> ".$_POST["usuario"]." AND us.nombres like '%".$nombre."%'  OR us.apellidos like '%".$nombre."%' limit 10 ";

	$resultados=$conexion->query($sql);

	if ($resultados->num_rows > 0) {
		$retorno["personas"]=$resultados->fetch_all(MYSQLI_BOTH);
		
		//consulta de los amigos

		$sql="SELECT 
					
		amg.id_amigo

		FROM tbl_amigos amg

		WHERE amg.id_usuario =". $_POST["usuario"];

		$r=$conexion->query($sql);
		
		if ($r->num_rows > 0) {
			$retorno["amigos"]=$r->fetch_all(MYSQLI_BOTH);
		}	
		
		mysqli_close($conexion);
	}
	else{
		$retorno["error"]=1;
	}
	
	echo json_encode($retorno);
?>