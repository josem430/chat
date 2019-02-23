function cargar_datos_usuario(){
    $.ajax({
        type: 'POST',
        async: true,
        url: 'ajax/cargar_datos_usuario.php',
        data: {
            usuario
        },
        success: function(data){
            html="";
            html+="<img src="+ data.resultado+" width='100%' style='border-radius:30px;'>";
            $("#foto_perfil").html(html);
                
            html="";
            html+="<h5 style='text-align:center;' id='title_usuario'>"+ data.nombre_usuario.toUpperCase()+"</h5>";
            $(".navbar-brand").html(html);
        },
        dataType: 'json'
    });
}
