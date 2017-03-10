/**
 * Created by @HackeaMesta on 10.03.17.
 */

$('document').ready(function() {
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
    loadProfile();
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

            /*
             if (response.arqui == 1) {
             $("#admin").prop( "checked", true );
             }

             if (response.arqui == 1) {
             $("#aboga").prop( "checked", true );
             }
             */

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
    event.preventDefault();
    var valid = 1;
    var msg = "";

    var posgrado = $('#posgrado').val();
    var universidad = $('#universidad').val();
    var preparatoria = $('#preparatoria').val();
    var secundaria = $('#secundaria').val();

    if ( !posgrado && !universidad && !preparatoria && !secundaria ) {
        msg = "Ingresa al menos una escuela y promedio";
        valid = 0;
    } else {
        if (posgrado && !$('#posgraPromedio').val()) {
            msg = "Ingresa tu promedio del posgrado";
            valid = 0;
        }

        if (universidad && !$('#uniPromedio').val()) {
            msg = "Ingresa tu promedio de la universidad";
            valid = 0;
        }

        if (preparatoria && !$('#prepaPromedio').val()) {
            msg = "Ingresa tu promedio de la preparatoria";
            valid = 0;
        }

        if (secundaria && !$('#secuPromedio').val()) {
            msg = "Ingresa tu promedio de la secundaria";
            valid = 0;
        }
    }

    if (valid === 1) {
        updateHistorial();
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
                $.notify({
                    message: msg
                },{
                    type: 'success',
                    placement: {
                        from: "top",
                        align: "right"
                    }
                });
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
    event.preventDefault();
    var valid = 1;
    var msg = "";

    if ( !$('#telefono').val() ) {
        valid = 0;
        msg = "Ingresa un número telefónico";
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
            tipo_beca: $("#tipo_beca").val()
        },
        dataType: "json",
        success: function (response) {
            var msg = response.mensaje;
            if (response.estado == 1) {
                $.notify({
                    message: msg
                },{
                    type: 'success',
                    placement: {
                        from: "top",
                        align: "right"
                    }
                });
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