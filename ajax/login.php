<?php
    Ob_start(); 
    session_start();  

	  require_once("../bd/conexion.php"); 

    $retorno=array();

    $usuario=$_POST['txt_usuario'];
    $contraseña=$_POST['txt_password'];
       
    $sql="SELECT codigo_usuario FROM tbl_user WHERE user='$usuario' AND password='$contraseña'";

    $resul=$conexion->query($sql);
    $fila=mysqli_fetch_assoc($resul);
    
    if($resul->num_rows >0){
      $_SESSION['codigo_usuario']=$fila['codigo_usuario'];

      $sql="UPDATE tbl_user SET estado=1 WHERE codigo_usuario=".$_SESSION['codigo_usuario'];
      $conexion->query($sql);

      $retorno["incorrecto"]=2;
    }
    else{
      $retorno["incorrecto"]=1;
    }
    
    echo json_encode($retorno);
?>