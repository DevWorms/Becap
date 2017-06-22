/**
 * Created by @HackeaMesta on 10.03.17.
 */

$('document').ready(function() {
    loadProfile();

    $("form#formulario_informacion :button").each(function(){
        var input = $(this);
        input.click(function () {
            var btn = input.attr('id');
            btn = btn.substring(0, btn.length -4);
            var input_val = $("#" + btn);
            if (input_val.val() == 1) {
                input_val.val(0);
            } else {
                input_val.val(1);
            }

            console.log(btn + ": " + input_val.val());
        });
    });

    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
});

function loadProfile() {
    $.ajax({
        type: "POST",
        url  : 'controladores/usuario/Usuario.php',
        data : {
            get: "getProfile"
        },
        dataType: "json",
        success :  function(response) {
            $("#posgrado").val(response.Nombre_Posgrado);
            $("#posgraPromedio").val(response.Promedio_Pos);

            $("#universidad").val(response.Nombre_Universidad);
            $("#uniPromedio").val(response.Promedio_Uni);

            $("#preparatoria").val(response.Nombre_Prepa);
            $("#prepaPromedio").val(response.Promedio_Prepa);

            $("#secundaria").val(response.Nombre_Secundaria);
            $("#secuPromedio").val(response.Promedio_Secundaria);

            $("#telefono").val(response.Telefono_contacto);
            $("#tipo_beca").val(response.tipo_beca);

            $("#ciudad").val(response.Ciudad);
            $("#pais").val(response.Pais);

            if (response.admin == 1) {
                $("#admin").prop( "checked", true ).val(1);
                $("#admin_btn").removeClass("btn-default").addClass("btn-info active");
            }

            if (response.aboga == 1) {
                $("#aboga").prop( "checked", true ).val(1);
                $("#aboga_btn").removeClass("btn-default").addClass("btn-info active");
            }

            if (response.psico == 1) {
                $("#psico").prop( "checked", true ).val(1);
                $("#psico_btn").removeClass("btn-default").addClass("btn-info active");
            }

            if (response.conta == 1) {
                $("#conta").prop( "checked", true ).val(1);
                $("#conta_btn").removeClass("btn-default").addClass("btn-info active");
            }

            if (response.econo == 1) {
                $("#econo").prop( "checked", true ).val(1);
                $("#econo_btn").removeClass("btn-default").addClass("btn-info active");
            }

            if (response.finan == 1) {
                $("#finan").prop( "checked", true ).val(1);
                $("#finan_btn").removeClass("btn-default").addClass("btn-info active");
            }

            if (response.arthu == 1) {
                $("#arthu").prop( "checked", true ).val(1);
                $("#arthu_btn").removeClass("btn-default").addClass("btn-info active");
            }

            if (response.arqui == 1) {
                $("#arqui").prop( "checked", true ).val(1);
                $("#arqui_btn").removeClass("btn-default").addClass("btn-info active");
            }

            if (response.ingen == 1) {
                $("#ingen").prop( "checked", true ).val(1);
                $("#ingen_btn").removeClass("btn-default").addClass("btn-info active");
            }

            if (response.disin == 1) {
                $("#disin").prop( "checked", true ).val(1);
                $("#disin_btn").removeClass("btn-default").addClass("btn-info active");
            }

            if (response.ensen == 1) {
                $("#ensen").prop( "checked", true ).val(1);
                $("#ensen_btn").removeClass("btn-default").addClass("btn-info active");
            }

            if (response.medic == 1) {
                $("#medic").prop( "checked", true ).val(1);
                $("#medic_btn").removeClass("btn-default").addClass("btn-info active");
            }
        },
        error : function (response) {
            console.log(response);
        }
    });
}

function validateHistorial() {
    //event.preventDefault();
    var valid = 1;
    var msg = "";

    var posgrado = $('#posgrado').val();
    var universidad = $('#universidad').val();
    var preparatoria = $('#preparatoria').val();
    var secundaria = $('#secundaria').val();

    var proPosg = $('#posgraPromedio').val();
    var proUni = $('#uniPromedio').val() ;
    var proPrepa= $('#prepaPromedio').val();
    var proSecu= $('#secuPromedio').val();

    // validacion minimo 2 escuelas
    var arrEscuelas =[posgrado,universidad,preparatoria,secundaria];
    var alMenosDosEscuelas = 0;

    for(var cont = 0; cont < arrEscuelas.length ; cont++){
        if(!arrEscuelas[cont]){
            alMenosDosEscuelas += 1;
        }
    }

    if ( alMenosDosEscuelas > 2 ) {

        msg = "Ingresa al menos dos escuelas con su promedio";
        valid = 0;

    } else {
        if (posgrado && !proPosg) {
            msg = "Ingresa tu promedio del posgrado";
            valid = 0;
        }

        if (universidad && !proUni) {
            msg = "Ingresa tu promedio de la universidad";
            valid = 0;
        }

        if (preparatoria && !proPrepa) {
            msg = "Ingresa tu promedio de la preparatoria";
            valid = 0;
        }

        if (secundaria && !proSecu) {
            msg = "Ingresa tu promedio de la secundaria";
            valid = 0;
        }

        if( proPosg && (isNaN(proPosg) || (proPosg < 0 || proPosg >100)) ){
          msg = "El promedio de Posgrado debe ser un valor numérico entre 0 y 100";
          valid = 0;
        }

        if( proUni && (isNaN(proUni) || (proUni < 0 || proUni >100)) ){
            msg = "El promedio de Profesional debe ser un valor numérico entre 0 y 100";
            valid = 0;
        }

        if( proPrepa && (isNaN(proPrepa) || (proPrepa < 0 || proPrepa >100)) ){
            msg = "El promedio de Preparatoria debe ser un valor numérico entre 0 y 100";
            valid = 0;
        }

        if( proSecu && (isNaN(proSecu) || (proSecu < 0 || proSecu >100)) ){
            msg = "El promedio de Secundaria debe ser un valor numérico entre 0 y 100";
            valid = 0;
        }
    }
    if (valid === 1) {
        updateHistorial();
    } else {
        $.notify({
            message: msg
        },{
            type: 'danger',
            placement: {
                from: "bottom",
                align: "right"
            }
        });
    }
}

function updateHistorial() {
    $.ajax({
        type: "POST",
        url: "controladores/usuario/Usuario.php",
        data:  {
            get: "updateHistorial",
            posgrado: $("#posgrado").val(),
            posgraPromedio: $("#posgraPromedio").val(),
            universidad: $("#universidad").val(),
            uniPromedio: $("#uniPromedio").val(),
            preparatoria: $("#preparatoria").val(),
            prepaPromedio: $("#prepaPromedio").val(),
            secundaria: $("#secundaria").val(),
            secuPromedio: $("#secuPromedio").val()
        },
        dataType: "json",
        success: function (response) {
            var msg = response.mensaje;
            if (response.estado == 1) {
                /*$.notify({
                    message: msg
                },{
                    type: 'success',
                    placement: {
                        from: "top",
                        align: "right"
                    }
                });*/
                console.log(msg);
            } else {
                $.notify({
                    message: msg
                },{
                    type: 'warning',
                    placement: {
                        from: "top",
                        align: "right"
                    }
                });
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
}

function validateIntereses() {
    //event.preventDefault();
    var valid = 1; 
    var msg = "";
    var ciudad = $("#ciudad").val();
    var pais = $("#pais").val();

    if ( !ciudad) {
        valid = 0;
        msg = "Ingresa tu ciudad";
    }

    if ( !pais ) {
        valid = 0;
        msg = "Ingresa tu pais";
    }

    if ( !$('#telefono').val() ) {
        valid = 0;
        msg = "Ingresa un número telefónico";
    }

    if($('#telefono').val() && (isNaN($('#telefono').val()) || $('#telefono').val().length != 10)){
      valid = 0;
      msg = "El número telefónico debe contener al menos 10 dígitos";
    }

    if ( !$('#tipo_beca').val() ) {
        valid = 0;
        msg = "Selecciona un tipo de beca";
    }

    if ( ($('#admin').val() == 0) && ($('#aboga').val() == 0) && ($('#psico').val() == 0)
        && ($('#conta').val() == 0) && ($('#econo').val() == 0) && ($('#finan').val() == 0)
        && ($('#arthu').val() == 0) && ($('#arqui').val() == 0) && ($('#ingen').val() == 0)
        && ($('#disin').val() == 0) && ($('#ensen').val() == 0) && ($('#medic').val() == 0) ) {
        valid = 0;
        msg = "Selecciona al menos área de interés";
    }

    if (valid === 1) {
        updateIntereses();
    } else {
        $.notify({
            message: msg
        },{
            type: 'warning',
            placement: {
                from: "top",
                align: "right"
            }
        });
    }
}

function updateIntereses() {
    $.ajax({
        type: "POST",
        url: "controladores/usuario/Usuario.php",
        data:  {
            get: "updateIntereses",
            admin: $("#admin").val(),
            aboga: $("#aboga").val(),
            psico: $("#psico").val(),
            conta: $("#conta").val(),
            econo: $("#econo").val(),
            finan: $("#finan").val(),
            arthu: $("#arthu").val(),
            arqui: $("#arqui").val(),
            ingen: $("#ingen").val(),
            disin: $("#disin").val(),
            ensen: $("#ensen").val(),
            medic: $("#medic").val(),
            telefono: $("#telefono").val(),
            tipo_beca: $("#tipo_beca").val(),
            ciudad : $("#ciudad").val(),
            pais:$("#pais").val()
        },
        dataType: "json",
        success: function (response) {
            var msg = response.mensaje;
            if (response.estado == 1) {
               /* $.notify({
                    message: msg
                },{
                    type: 'success',
                    placement: {
                        from: "top",
                        align: "right"
                    }
                });*/

                console.log(msg);
            } else {
                $.notify({
                    message: msg
                },{
                    type: 'warning',
                    placement: {
                        from: "top",
                        align: "right"
                    }
                });
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
}