<?php
    Ob_start(); 
	session_start();  
    if (isset($_SESSION["codigo_usuario"])) {
?>

<!DOCTYPE html>
<html class="no-js" lang="es"> 
<head>
    <?php 
      require_once("enlaces.html");
    ?>
    
    <script type="text/javascript">
        var usuario="<?php echo $_SESSION["codigo_usuario"]; ?>";
        var amigo="";

        $(document).ready(function(){

            cargar_datos_usuario();

            cargar_listado_chat();

            //IR AL INICIO
            $("#home").bind("click",home);

            //mensajes dispositivos moviles
            $("#mesajes").bind("click",function(){
                mensajes();
            });

            //ACTUALIZACION DE DATOS PERSONALES
            $("#cargar_datos_usuario").bind("click",cargar_datos_personales);
                          
            //BUSQUEDA DE PERSONAS
            $("#buscar_personas").bind("click",buscar_personas);

            //MIS AMIGOS
            $("#amigos").bind("click",mis_amigos);
        });
 
        function home(){
            $("#div_dinamico").html("");
            $("#foto_perfil").show();
        }

        function mensajes(){
            $("#foto_perfil").hide();
            $("#div_dinamico").load("templates/chat_dispositivos_moviles.html");
        }

        function cargar_datos_personales(){
            $("#div_dinamico").load("templates/datos_usuario.html");
            cargar_datos_perfil();
            $("#foto_perfil").show();
        }

        function buscar_personas(){
            $("#div_dinamico").load("templates/buscar_personas.html");
            $("#foto_perfil").show();
        }

        function mis_amigos(){
            $("#div_dinamico").load("templates/mis_amigos.html");
            $("#foto_perfil").show();
        }
    </script>
</head>

<style type="text/css">
    @media screen and (max-width: 600px) {
      #div_d_chat{
        display: none;
      }
    }

    @media screen and (max-width: 800px){
        #div_d_chat{
            display: none;
        }
    }

    @media screen and (max-width: 1000px) {
        #div_d_chat{
            display: none;
        }    
    }
</style>  

<body>

    <?php
        include("menu.html");
    ?>

    <div class="container-fluid col-lg-12" style="height: 500px;">
        <div class="col-lg-3" >
            <div id="foto_perfil"></div>
            
            <div id="nombre_usuario" style=""></div>
        </div>

        <div  class="col-lg-7" id="div_dinamico"></div>

        <div class="col-lg-2" id="div_d_chat">
            <h4>Chat<input type="text" class="form-control" id="inp_buscar_chat_amigos" placeholder="Buscar amigos"></h4>
            <div id="conectados"></div>
            <div id="chat_busqueda"></div>
        </div>
	</div>
</body>
</html>
<?php  
	}
	else
    {
	   echo "Acceso no autorizado";
	}
?>		


