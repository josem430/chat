<?php
	require_once("enlaces.html");
	require_once("bd/conexion.php");

	$usuario=$_POST["txt_usuario"];
	$password=$_POST["txt_password"];
	$nombres=$_POST["nombres"];
	$apellidos=$_POST["apellidos"];
	$telefono=$_POST["telefono"];
	$correo=$_POST["correo"];
	$sexo=$_POST["sexo"];
 	$nombre_img=$_FILES["imagenes"]["name"];

	$sql="INSERT into tbl_user 
	(user,password,nombres,apellidos,telefono,correo,sexo,foto_perfil)
	values ('$usuario','$password','$nombres','$apellidos','$telefono','$correo','$sexo','fotos_perfil/$nombre_img[0]')";
	
	if(!$resultado=$conexion->query($sql)) {
		echo 	"<script type='text/javascript'>
					alert('Error al registrarse');
					window.location='index.php';
				</script>"; 
	}
	else{
		foreach ($_FILES["imagenes"]["error"] as $clave => $error) {
	        if ($error == UPLOAD_ERR_OK) {
	            $nombre_tmp = $_FILES["imagenes"]["tmp_name"][$clave];
	            $nombre = basename($_FILES["imagenes"]["name"][$clave]);
	            move_uploaded_file($nombre_tmp, "fotos_perfil/$nombre");
	        }
    	}
    	echo 	"<script type='text/javascript'>
					alert('Registrado Correctamente');
					window.location='index.php';
				</script>"; 	
	}
	
	if($nombre_img[0]==""){
		if ($sexo=="hombre") {
			$sql="UPDATE tbl_user SET foto_perfil='fotos_perfil/hombre.png' WHERE user='$usuario'"; 
	    	if(!$resultado=$conexion->query($sql)) {
				die("Error[". $conexion->error."]");
			}
		}
		else{
			$sql="UPDATE tbl_user SET foto_perfil='fotos_perfil/mujer.png' WHERE user='$usuario'"; 
	     	if(!$resultado=$conexion->query($sql)) {
				die("Error[". $conexion->error."]");
			}
		}
	}
?>
