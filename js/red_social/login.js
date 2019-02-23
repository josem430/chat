$(document).ready(function(){
  $("#btn-iniciar").bind("click",iniciar_session);
});

function iniciar_session(){

  if ($("#txt_usuario").val()=="") {
    Lobibox.notify('warning', {
      size: 'mini',rounded: true,delay: false,delay: 1200,position: 'center top', msg: 'LLenar el campo "usuario".'
    });

    $("#txt_usuario").focus();
  }
  else if ($("#txt_password").val()=="") {

    Lobibox.notify('warning', {
      size: 'mini',rounded: true,delay: false,delay: 1200,position: 'center top', msg: 'LLenar el campo "Password".'
    });

    $("#txt_password").focus();
  }
  else{

    txt_usuario=$("#txt_usuario").val();
    txt_password=$("#txt_password").val();
          
    $.ajax({
      type: 'POST',
      async: true,
      url: 'ajax/login.php',
      data: {txt_usuario,txt_password},
      success: function(data){    
        if (data.incorrecto==1){
          alert("incorrecto");
        }else{
          window.location="inicio.php";
        }
      },
      dataType: 'json'
    });
  }
}