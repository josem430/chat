<?php
	require_once("../bd/conexion.php");

	$retorno=array();

	$nombres=$_POST["nombres"];
    $apellidos=$_POST["apellidos"];
    $telefono=$_POST["telefono"];      
    $correo=$_POST["correo"];

    $sql="UPDATE  tbl_user SET nombres='".$nombres."', apellidos='".$apellidos."', telefono='".$telefono."', correo='".$correo."' WHERE codigo_usuario=".$_POST["usuario"];

    $conexion->query($sql);
    
    if (mysqli_affected_rows($conexion)>0) {
    	$retorno["resultado"]=1;
    }
    else{
    	$retorno["resultado"]=2;
    }

    mysqli_close($conexion);

    echo json_encode($retorno);
?>