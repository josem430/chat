function buscar_chat_amigo(){

    if ($("#inp_buscar_chat_amigos").val()=="") {
        $("#conectados").show();
        $("#chat_busqueda").hide();
        cargar_listado_chat()
    }else{
        
        nombre_buscar=$("#inp_buscar_chat_amigos").val();

        $.ajax({
            type: 'POST',
            async: true,
            url: 'ajax/buscar_chat_amigos.php',
            data: {
                usuario,
                nombre_buscar
            },
            success: function(data){
                i=0;
                html="";
                $("#conectados").hide();
                $("#chat_busqueda").show();

                $(data.amigos).each(function(){
                            
                    if ($(this)[0].estado==1) {
                        html+="<img src='img/line.png' style='width:5%;'>&nbsp<a  id="+i+" class='a_button' onClick='buscar_chat("+ $(this)[0].id_amigo+")'>"+ $(this)[0].amigo+"</a><hr>";
                    }else{
                        html+="&nbsp<a  id="+i+" class='a_button' onClick='buscar_chat("+ $(this)[0].id_amigo+")'>"+ $(this)[0].amigo+"</a><hr>";
                    }
                    i++;
                });

                $("#chat_busqueda").html(html);
            },
            dataType: 'json'
        });
    }
}