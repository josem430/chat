<?php
	$conexion=new mysqli("localhost","root","","redsocial");

	if($conexion->connect_error) {
		die($conexion->connect_error);
	}

	$sql="SELECT * FROM tbl_user";

	$resultados=$conexion->query($sql);

	if ($resultados->num_rows > 0) {
		
		foreach ($resultados as $resultado) {
			echo $resultado["user"]."<br>";
		}
	}
	else{
		echo "no hay resultado";
	}
?>