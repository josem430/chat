<?php
   	session_start();
	require_once("bd/conexion.php");

   	$sql="UPDATE tbl_user SET estado=2 WHERE codigo_usuario=".$_SESSION['codigo_usuario'];
   	$conexion->query($sql);

  	session_unset();
  	session_destroy();
  	header("location:index.php");
?>