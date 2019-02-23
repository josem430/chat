function actualizar_datos_perfil(){

    nombres=$("#nombres").val();
    apellidos=$("#apellidos").val();
    telefono=$("#telefono").val();
    correo=$("#correo").val();

    $.ajax({
        type: 'POST',
        async: true,
        url: 'ajax/actualizar_datos_usuario.php',
        data: {
            usuario,
            nombres,
            apellidos,
            telefono,
            correo
        },
        success: function(data){
            if(data.resultado==1){
                Lobibox.alert("success",{
                    msg: "Se actualizo"
                });
            }
            else{
                Lobibox.alert("error",{
                    msg: "No se pudo actualizar es posible que ya este en uso este dato"
                });
            }
            cargar_datos_perfil();
        },
        dataType: 'json'
    });
}

function cargar_datos_perfil(){
    $("#div_datos_perfil").show();
    
    $.ajax({
        type: 'POST',
        async: true,
        url: 'ajax/cargar_datos_usuario.php',
        data: {
            usuario
        },
        success: function(data){
            html="";
            $(data.datos).each(function(){
                $("#nombres").val($(this)[0].nombres);
                $("#apellidos").val($(this)[0].apellidos);
                $("#telefono").val($(this)[0].telefono);
                $("#correo").val($(this)[0].correo);

                if ($(this)[0].sexo=="hombre"){
                    $("#sexo").html("<option value="+$(this)[0].sexo+">"+$(this)[0].sexo+"</option>");
                    $("#sexo").append("<option value='mujer'>mujer</option>");
                }
                else if ($(this)[0].sexo=="mujer"){
                    $("#sexo").html("<option value="+$(this)[0].sexo+">"+$(this)[0].sexo+"</option>");
                    $("#sexo").append("<option value='hombre'>hombre</option>");
                }
                
            });
        },
        dataType: 'json'
    });
}

