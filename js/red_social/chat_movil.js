function listado_chat(){
	setInterval(function(){ 
        cargar_conectados_m();
    }, 900);
}

function cargar_conectados_m(){

	$.ajax({
	   type: 'POST',
	   async: true,
	   url: 'ajax/cargar_listado_chat.php',
	   data: {
	       usuario
	   },
	   success: function(data){
	       html="";
	       $(data.amigos).each(function(){
	           html+="<img src='img/line.png' style='width:5%;'>&nbsp<button style=' height:30px; background:white; border:0; color: #337ab7; ' onClick='buscar_chat_m("+ $(this)[0].id_amigo+")'>"+ $(this)[0].amigo+"</button><hr>";
	       });
	            
	       $("#conectados_m").html(html);
	   },
	   dataType: 'json'
	});
}

function buscar_chat_m(id_amigo){

    amigo_glo=id_amigo;

	$("#conectados_m").hide();
	$("#div_close").hide();
	$("#div_chat_m").show();
    $("#chat_m").animate({ scrollTop: $('#chat_m')[0].scrollHeight}, 1000);
    
    if (id_amigo==amigo) {

    }else{
        amigo=id_amigo;            
        setInterval(function(){ 
            peticion_mensajes_m(amigo);
        }, 900);
    }
} 

function peticion_mensajes_m(amigo){
    $.ajax({
        type: 'POST',
        async: true,
        url: 'ajax/cargar_mensaje.php',
        data: {
            usuario,
            amigo
        },
        success: function(data){
            html="";


            if (data.mensajes==""){
                html+="<div style='background:#D5F5E3 ; border-radius: 50px;'><h3 style='padding:10px';>AUN NO TIENES MENSAJE.</h3></div>";
                $("#chat_m").html(html);
            }
            else{
                $(data.mensajes).each(function(){
                    if ($(this)[0].id_usuario==usuario) {
                        html+="<div style='background:#AED6F1; border-radius: 50px; width:70%;margin-left:35%;'><p style='padding-right:9px;text-align:right; color: #337ab7;'>"+$(this)[0].mensaje+"</p><p style='text-align:center; font-size:10px;'>"+$(this)[0].fecha_sistema+"<p></div>";
                    }
                    else{
                          html+="<div style='width:70%; align-items:center;'><div style='width:10%; float:left;'><img src="+$(this)[0].foto_perfil+" style='border-radius:50%;width:100%;'></div><div style='background:#D5F5E3 ; border-radius: 50px; width:90%;margin-left:40px;'><p style='padding-left:9px;color: #337ab7;'> "+$(this)[0].mensaje+"</p><p style='text-align:center;font-size:10px;'>"+$(this)[0].fecha_sistema+"<p></div></div>";
                    }
                });

                $("#chat_m").html(html);
            }

            nom=data.mensajes[0].amigo;
            nom=nom.toUpperCase();
            $("#nombre_c").html(nom);
            
        },
        dataType: 'json'
    });
}

function enviar_mensaje_m(){

    if ($("#txt_mensaje").val()=="") {
        
    }else{
        mensaje=$("#txt_mensaje").val();

        $.ajax({
        type: 'POST',
        async: true,
        url: 'ajax/envio_mensaje.php',
        data: {
            mensaje,
            usuario,
            amigo
        },
        success: function(data){
            $("#txt_mensaje").val("") 
        },
            dataType: 'json'
        });
    }
}