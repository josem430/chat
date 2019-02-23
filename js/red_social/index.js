$(document).ready(function(){

  $("input[name='btn_verificar']").bind("click",function(){
    verificar_usuario();
  });

  $("#input_seccion").click(function(){
    $("#window_inicio").dialog('open');
  });

  $("input[name='sig']").bind("click",function(){
    $("#reg_usuario").hide();
    $("#reg_datos").show();
  });

  $("input[name='anterior']").bind("click",function(){
    $("#reg_usuario").show();
    $("#reg_datos").hide();
  });

  $("#input_registar").click(function(){
    $("#window_registro").dialog('open');
  });

  $("#window_inicio").dialog({
    bgiframe: true,
    width: 400,
    modal: true,
    autoOpen: false,
    buttons: {
      'Salir': function(){
        $(this).dialog('close');
        document.from_inicio_seccion.reset();
      }
    }   
  });

  $("#window_registro").dialog({
    bgiframe: true,
    width: 500,
    modal: true,
    autoOpen: false,
    buttons: {
      'Salir': function(){
        $(this).dialog('close');
        document.from_registro.reset();
      }
    }   
  });
});

function verificar_usuario(){
  usuario=$(".usuario").val();
  $.ajax({
    type: 'POST',
    async: true,
    url: 'ajax/verificar_usuario.php',
    data: {
      usuario
    },
    success: function(data){
      
      if (data["resultado"]==""){
        alert("Usuario Disponible");
      }
      else{
        alert("Ya se encuentra en uso este usuario");
      }
    },
    dataType: 'json'
  });
}