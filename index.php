<?php
  Ob_start(); 
  session_start();
?>
<!doctype html>
<html class="no-js" lang="es"> 

<head>  
    <?php 
      require_once("enlaces.html");
    ?> 
</head>

  <body class="jumbotron">
    
      <div class="col-lg-12">
        <div class="col-lg-6">
          <img src="img/milogo.png" width="100%">
        </div>
        
        <div class="col-lg-6" id="div_log">
          <h1>Bienvenido</h1>
          <p>Comunicate con todo el mundo ahora mismo.</p>
          <div id="div_seccion" style="padding-left: 30px; padding-right: 30px;">
            <input type="button" id="input_seccion" class="form-control btn btn-info" name=""  value="Iniciar Sesión"> 
          </div>
          
          <div id="div_registrar" style="padding-left: 30px; padding-right: 30px;">
            <input type="button" id="input_registar" class="form-control btn btn-default" name=""  value="Registrate">
          </div>
        </div>
      </div>

      <div id="window_inicio" title="Iniciar Sesión">
        <div class="center col-lg-12">
          <form method="POST" action="index.php" id="from_inicio_seccion" name="from_inicio_seccion">
            <input type="text" id="txt_usuario" class="form-control" name="txt_usuario" placeholder="Usuario" required="" style="border:0;"><br>

            <input type="Password" id="txt_password" class="form-control" name="txt_password" placeholder="Password" required="" style="border:0;"><br>

            <input type="button" id="btn-iniciar" class="form-control btn btn-info" name="" value="Iniciar Sesión">
          </form>     
        </div>
      </div>

      <div id="window_registro" title="Registrate">
        <div class=" col-lg-12" id="reg_usuario">
          <form id="from_resgistro" name="from_registro" method="POST" action="guardar_registro.php" enctype="multipart/form-data" class="form-inline">

            <div class="form-group mx-sm-3 mb-2">
              <input type="text" id="txt_usuario" class="form-control usuario" name="txt_usuario" placeholder="Usuario"> 
            </div>

            <input type="button" name="btn_verificar" class="btn btn-success" 
             value="Verificar" id="btn_sig_log"> <i class='fas fa-search'></i><br><br>

            <input type="text" id="txt_password" class="form-control" name="txt_password" placeholder="Password">
        
            <h4>Foto de perfil</h4>
        
            <input class="form-control" name="imagenes[]" type="file"/><br><br>

            <input type="button" name="sig" id="btn_sig_log" value="Siguiente" class="btn btn-info">
        </div>

        <div id="reg_datos" style="display: none;">
            <input type="text" id="nombres" class="form-control" name="nombres" placeholder="Nombres" ><br>

            <input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="Apellidos" ><br>

            <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Telefono" ><br>

            <input type="text" id="correo" class="form-control" name="correo" placeholder="Correo"><br>
            <p>
              <label>Sexo:</label>
              <select class="form-control" name="sexo">
                <option>Seleccione una Opcion</option>
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
              </select>
            </p> 

            <input type="button" name="anterior" id="btn_sig_log"  value="Regresar" class="btn btn-info">

            <input type="submit" name="" id="btn_sig_log"  value="Registrar" class="btn btn-info"> 
        </div>
          </form>     
      </div>

      <hr>
      <div class="col-lg-12">
        <footer>
          <p>&copy; Jose Martinez 2018</p>
        </footer>
      </div>  
  </body>
</html>
