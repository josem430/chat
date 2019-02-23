function cargar_amigos(){
	$.ajax({
    type: 'POST',
    async: true,
    url: 'ajax/cargar_amigos.php',
    data: {
      usuario
    },
        
    success: function(data){
      arrayamigos=data;
      html="";
      $(data.amigos).each(function(){
        html+="<div class='col-lg-5 col-xs-12' style='float:left;height:60px;margin:8px;'><a onclick='cargar_perfil_amigo("+$(this)[0].codigo_usuario+")' style='text-decoration:none;' ><img src="+$(this)[0].foto_perfil+"  style='width: 20%;border-radius:30px; margin:4px;'>"+$(this)[0].nombres+"</a></div>";
      });

      $("#div_amigos").html(html);
    },
    dataType: 'json'
  });
}

function cargar_perfil_amigo(id_amigo){
  $("#div_dinamico").load("templates/cargar_perfil_amigo.html");

  $.ajax({
    type: 'POST',
    async: true,
    url: 'ajax/cargar_perfil_amigo.php',
    data: {
      id_amigo
    },
    success: function(data){

      html="";

      $(data.resultado).each(function(){
        $("#contenedor-img").html("<img src='"+$(this)[0].foto_perfil+"' style='width:80%;height: 150px;'>");
        $("#contenedor-nombre").html("<h1>"+$(this)[0].amigo+"</h1>");
        $("#div_telefono").html("<h4>"+$(this)[0].telefono+"<h4>");
        $("#div_correo").html("<h4>"+$(this)[0].correo+"<h4>");

        if ($(this)[0].estado==1){
          $("#contenedor-nombre").append("<img  src='img/line.png' style='width:3%;'>");
        }
        codigo_amigo=$(this)[0].codigo_usuario;
      });
    },
    dataType: 'json'
  });
}





