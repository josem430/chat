 function validar_datos(){
             
    $("#from_datos_personales").css("display","none");

    Lobibox.prompt('password',{
        title: 'Validacion de contraseña',
        attrs: {
            placeholder: "Ingrese su contraseña"
        }    
    });

    $(".btn-close").bind("click",function(){
        $("#div_dinamico").load("templates/datos_usuario.html");
        cargar_datos_perfil();
    });

    $(".lobibox-btn-cancel").bind("click",function(){
        $("#div_dinamico").load("templates/datos_usuario.html");
        cargar_datos_perfil();
    });
                    
    $(".lobibox-btn").bind("click",function(){

        contrasena=$(".lobibox-input").val();

        $.ajax({
            type: 'POST',
            async: true,
            url: 'ajax/validar_contraseña_datos.php',
            data: {
                usuario,
                contrasena
            },
            
            success: function(data){
                if (data.mensaje==1) {

                    html="";
                    html+="<h2>Datos Usuario</h2>";
                    html+="<input type='text' id='inp_nom_usu' name='' class='form-control sinborde' placeholder='Usuario'><br>";
                    html+="<input type='button' id='btn_act_du' class='btn sinborde' name='' value='Actulizar'>";

                    $("#act_datos_usuario").html(html);

                    ftn_boton_actualizar();   
                }
                else{

                    Lobibox.alert("error", {
                            
                        msg: "Contraseña Incorrecta",
                        buttons: {
                            ok: {
                                                
                            }
                        }

                    });

                    $(".lobibox").bind("click",function(){
                        validar_datos();
                    });
                }
            },
            dataType: 'json'
        });
    });
}

function ftn_boton_actualizar(){
    $("#btn_act_du").bind("click", act_datos_usuario);
}

function act_datos_usuario(){

    if ($("#inp_nom_usu").val()==""){
        alert("Favor llenar los campos");
        $("#inp_nom_usu").focus();
    }
    else if($("#inp_contr_usu").val()==""){
        alert("Favor llenar los campos");
        $("#inp_contr_usu").focus();
    }
    else{

        nombre=$("#inp_nom_usu").val();
        contrasena=$("#inp_contr_usu").val();

        $.ajax({
            type: 'POST',
            async: true,
            url: 'ajax/actualizar_cof_cuenta.php',
            data: {
                usuario,
                nombre,
                contrasena
            },
            success: function(data){
                console.log(data);

                if(data.resultado==1){
                    Lobibox.alert("success",{
                        msg: "Datos actualizado Corretamente"
                    });

                    $(".lobibox-btn").bind("click", function(){
                        window.location="inicio.php";
                    });

                    //alert("Datos actualizado Corretamente");
                }else if (data.resultado==3) {  
                    alert("El usuario " + $("#inp_nom_usu").val()+" ya esta en uso.");
                    $("#inp_nom_usu").focus();
                }
            },
            dataType: 'json'
        });
    }
}         