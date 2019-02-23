<?php
	require_once("../bd/conexion.php");

	$retorno=array();

	$nombre=$_POST["nombre"];
    $contrasena=$_POST["contrasena"];

    $sql="SELECT user FROM tbl_user WHERE user='".$nombre."'";

   
   	$r=$conexion->query($sql);
	
   	if ($r->num_rows > 0) {
    	$retorno["resultado"]=3;
    }
    else{
   		$retorno["resultado"]=0;
	    $sql="UPDATE  tbl_user SET user='".$nombre."', password='".$contrasena."' WHERE codigo_usuario=".$_POST["usuario"];

	    $conexion->query($sql);

	    if (mysqli_affected_rows($conexion)>0) {
	    	$retorno["resultado"]=1;
	    }
	    else{
	    	$retorno["resultado"]=2;
	    }
    }

    mysqli_close($conexion);

    echo json_encode($retorno);
?>