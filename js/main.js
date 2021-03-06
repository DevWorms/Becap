$(function () {

    $('[data-toggle="tooltip"]').tooltip({
        placement:"right",
        delay: { "show": 200, "hide": 300 },
        trigger:"focus"
    });

    $("#correo").keypress(function(e){
        if(e.keyCode == 13){
            registrarUsuario();
        }
    });

    $("#password").keypress(function(e){
        if(e.keyCode == 13){
            registrarUsuario();
        }
    });

    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    //icon: 'glyphicon glyphicon-check'
                },
                off: {
                    //icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }

            filtrarBecas();
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });



    getRequirements();

    $('#promedio, #acta, #examen, #toefl, #kardex').change(function() {
        saveRequirements();
    });

});

function getRequirements() {
    $.ajax({
        type : 'POST',
        url  : 'controladores/becas/Beca.php',
        data : {
            get: "loadRequirements"
        },
        dataType: "json",
        success :  function(response) {
            if (response.estado == 1) {
                $("#lbl_kardex").html("&nbsp;&nbsp;&nbsp;Kardex de preparatoria (" + response.kardex + "/" + response.total + ")");
                $("#lbl_toefl").html("&nbsp;&nbsp;&nbsp;TOEFL: 600 (" + response.toefl + "/" + response.total + ")");
                $("#lbl_examen").html("&nbsp;&nbsp;&nbsp;Examen de admisión (" + response.examen + "/" + response.total + ")");
                $("#lbl_acta").html("&nbsp;&nbsp;&nbsp;Acta de Nacimiento (" + response.acta + "/" + response.total + ")");
                $("#lbl_promedio").html("&nbsp;&nbsp;&nbsp;Promedio de: 80 (" + response.promedio + "/" + response.total + ")");

                var req = response.requirements;
                if (req.acta) {
                    if (req.acta == 1) {
                        $('#acta').prop('checked', true);
                    } else {
                        $('#acta').prop('checked', false);
                    }
                }
                if (req.promedio) {
                    if (req.promedio == 1) {
                        $('#promedio').prop('checked', true);
                    } else {
                        $('#promedio').prop('checked', false);
                    }
                }
                if (req.kardex) {
                    if (req.kardex == 1) {
                        $('#kardex').prop('checked', true);
                    } else {
                        $('#kardex').prop('checked', false);
                    }
                }
                if (req.toefl) {
                    if (req.toefl == 1) {
                        $('#toefl').prop('checked', true);
                    } else {
                        $('#toefl').prop('checked', false);
                    }
                }
                if (req.examen) {
                    if (req.examen == 1) {
                        $('#examen').prop('checked', true);
                    } else {
                        $('#examen').prop('checked', false);
                    }
                }
            }
        },
        error : function (response) {
            console.log(response);
        }
    });
}

function saveRequirements() {
    var promedio = 0, acta = 0, examen = 0, toefl = 0, kardex = 0;
    if ($('input#promedio').is(':checked')) { promedio = 1; }
    if ($('input#acta').is(':checked')) { acta = 1; }
    if ($('input#examen').is(':checked')) { examen = 1; }
    if ($('input#toefl').is(':checked')) { toefl = 1; }
    if ($('input#kardex').is(':checked')) { kardex = 1; }

    $.ajax({
        type : 'POST',
        url  : 'controladores/becas/Beca.php',
        data : {
            get: "saveRequirements",
            promedio: promedio,
            acta: acta,
            examen: examen,
            toefl: toefl,
            kardex: kardex
        },
        dataType: "json",
        success :  function(response) {
            if (response.estado == 1) {
                $("#msg").html('<div class="alert alert-success">' + response.mensaje + '</div>');
                setTimeout(
                    function() {
                        $("#msg").html("");
                    }, 3000);
            }
        },
        error : function (response) {
            console.log(response);
        }
    });
}

// Valida los campos en formulario

function validarRegistro(){
    var  correo, password;
    correo =   document.getElementById("correo").value;
    password = document.getElementById("password").value;

    if(correo === "" || password === ""){
        
        $.notify({
            title: '<strong>¡Hey!</strong>',
            message: ' Para poder crear tu cuenta debes ingresar todos los campos.'
        },{
            type: 'danger'
        });

        return false;
    }

    if(password !== "" && password.length < 6){
        $.notify({
            title: '<strong>¡Hey!</strong>',
            message: ' La contraseña debe contener al menos 6 caracteres.'
        },{
            type: 'danger'
        });

        return false;
    }

    return true;
}

function addToFavorite(user_id, beca_id) {
    //event.preventDefault();

    $.ajax({
        type : 'POST',
        url  : 'controladores/becas/Beca.php',
        data : {
            get: "addFavorite",
            user_id: user_id,
            beca_id: beca_id
        },
        dataType: "json",
            success :  function(response) {
            if (response.estado == 1) {
                colorStart(user_id, beca_id);
                console.log("Agregado a favoritos");
                //notificacion(response.mensaje, "success", beca_id);
            } else {
                notificacion(response.mensaje, "danger", beca_id);
            }
        },
        error : function (response) {
            console.log(response);
        }
    });
}

function removeFavorite(user_id, beca_id) {
    //event.preventDefault();

    $.ajax({
        type : 'POST',
        url  : 'controladores/becas/Beca.php',
        data : {
            get: "removeFavorite",
            user_id: user_id,
            beca_id: beca_id
        },
        dataType: "json",
        success :  function(response) {
            if (response.estado == 1) {
                colorStartGrey(user_id, beca_id);
                console.log("Removido de favorito");
                //notificacion(response.mensaje, "success", beca_id);
            } else {
                notificacion(response.mensaje, "danger", beca_id);
            }
        },
        error : function (response) {
            console.log(response);
        }
    });
}

function addToMeInteresa(user_id, beca_id) {
    //event.preventDefault();

    $.ajax({
        type : 'POST',
        url  : 'controladores/becas/Beca.php',
        data : {
            get: "addInteresa",
            user_id: user_id,
            beca_id: beca_id
        },
        dataType: "json",
        success :  function(response) {
            if (response.estado == 1) {
                colorHeart(user_id, beca_id);
                console.log("Agregado a favoritos");
                //notificacion(response.mensaje, "success", beca_id);
            } else {
                notificacion(response.mensaje, "danger", beca_id);
            }
        },
        error : function (response) {
            console.log(response);
        }
    });
}

function removeFromMeInteresa(user_id, beca_id) {
    //event.preventDefault();

    $.ajax({
        type : 'POST',
        url  : 'controladores/becas/Beca.php',
        data : {
            get: "removeInteresa",
            user_id: user_id,
            beca_id: beca_id
        },
        dataType: "json",
        success :  function(response) {
            if (response.estado == 1) {
                colorHeartGrey(user_id, beca_id);
                console.log("Removido de me interesa");
                //notificacion(response.mensaje, "success", beca_id);
            } else {
                notificacion(response.mensaje, "danger", beca_id);
            }
        },
        error : function (response) {
            console.log(response);
        }
    });
}

function colorHeart(user_id, id) {
    var heart = $('#heart-' + id);
    heart.removeClass("gray-box");
    heart.addClass("red");

    heart = $('#icono-' + id);
    heart.removeClass("gray-box");
    heart.addClass("red");
}

function colorHeartGrey(user_id, id) {
    var heart = $('#heart-' + id);
    heart.removeClass("red");
    heart.addClass("gray-box");

    heart = $('#start-' + id);
    heart.removeClass("yellow");
    heart.addClass("gray-box");

    heart = $('#icono-' + id);
    heart.removeClass("red");
    heart.addClass("gray-box");
}

function colorStart(user_id, id) {
    var start = null;

    var others = document.querySelectorAll('*[id^="icono-"]');
    others.forEach(function (item) {
        //$(item).slideUp(500);
        start = $(item);
        start.removeClass("yellow");
        start.removeClass("glyphicon-star");
        start.addClass("glyphicon-heart");
        start.addClass("red")
    });

    start = $('#icono-' + id);
    start.removeClass("red");
    start.removeClass("glyphicon-heart");
    start.addClass("glyphicon-star");
    start.addClass("yellow");

    others = document.querySelectorAll('*[id^="start-"]');
    others.forEach(function (item) {
        //$(item).slideUp(500);
        start = $(item);
        start.removeClass("yellow");
        start.addClass("gray-box");
    });

    start = $('#start-' + id);
    start.removeClass("gray-box");
    start.addClass("yellow");
}

function colorStartGrey(user_id, id) {
    var start = $('#heart-' + id);
    start.removeClass("yellow");
    start.addClass("gray-box");

    start = $('#icono-' + id);
    start.removeClass("yellow");
    start.removeClass("glyphicon-star");
    start.addClass("glyphicon-heart");
    start.addClass("gray-box");

    others = document.querySelectorAll('*[id^="start-"]');
    others.forEach(function (item) {
        //$(item).slideUp(500);
        start = $(item);
        start.removeClass("yellow");
        start.addClass("gray-box");
    });
}


function filtrarBecas() {

     

     if(!(! $("#filtroAcademica").hasClass("active") && ! $("#filtroCredito").hasClass("active") 
        && ! $("#filtroEspecie").hasClass("active"))){
        console.log('**********');
       if($("#filtroAcademica").hasClass("active")){
            console.log("show academica");
            $(".beca-academica").show(300);
         }else{
            console.log("hide academica");
            $(".beca-academica").hide(300);
         }

         if($("#filtroCredito").hasClass("active")){
            console.log("show credito");
            $(".beca-credito").show(300);
         }else{
            console.log("hide credito");
            $(".beca-credito").hide(300);
         }

         if($("#filtroEspecie").hasClass("active")){
            console.log("show especie");
            $(".beca-especie").show(300);
         }else{
            console.log("hide especie");
            $(".beca-especie").hide(300);
         }
     }else{
        console.log("muestra todo");
        $(".beca-academica").show(300);
        $(".beca-credito").show(300);
        $(".beca-especie").show(300);
     }

}

function miBeca(user_id, beca_id) {
    console.log("test " + beca_id);

    $.ajax({
        type : 'POST',
        url  : 'controladores/becas/Beca.php',
        data : {
            get: "isLikeOrFavorite",
            beca_id: beca_id
        },
        dataType: "json",
        success :  function(response) {
            if (response.estado == 1) {
                if (response.type == 3) {
                    addToMeInteresa(user_id, beca_id);
                } else {
                    if (response.type == 2) {
                        addToFavorite(user_id, beca_id);
                    } else {
                        removeFavorite(user_id, beca_id);
                    }
                }
            }
        },
        error : function (response) {
            console.log(response);
        }
    });
}

function notificacion(msg, type, id) {
    var div = $("#msg-" + id);
    div.html("");
    div.html('<div class="alert alert-' + type + '"> &nbsp; ' + msg + '</div>');

    setTimeout(
        function() {
            div.html("");
        }, 3000);

}

function contactar(user_id, beca_id , boton) {
    $(boton).text("Enviando ...");
    $(boton).prop("disabled",true);
    $.ajax({
        type : 'POST',
        url  : 'controladores/becas/Beca.php',
        data : {
            get: "contactar",
            beca_id: beca_id
        },
        dataType: "json",
        success :  function(response) {
            if (response.estado == 1) {
                $(boton).text("¡Gracias!");
                $(boton).prop("disabled",true);
            } else {
                $("#msg").html('<div class="alert alert-warning">" + response.mensaje + "</div>');
                setTimeout(
                    function() {
                        $("#msg").html("");
                    }, 10000);
            }
        },
        error : function (response) {
            console.log(response);
            $(boton).text("Notificar a la escuela");
             $(boton).prop("disabled",false);
        }
    });
}

function setPorcentaje(beca,checkbox){
    // VARIABLES
    var porcentaje = 0;
    var checados = 0;
        //obtenemos el contenedor general de los checkbox para poder interar sus hermanos
        var contenedor = $(checkbox).parent("label").parent(".checkbox").parent(".content-requisitos");
        //intereamos
        $(contenedor).find('[type=checkbox]').each(function(index, el) {
            // agregamos si estan checados
            if(el.checked){
                checados = checados +  1;
            }
        });
        //SON 6 EN TOTAL, asi que 100/6 por los que esten checados
        porcentaje = (100/6) * checados;
        //modificamos la progrees bar
        /*$("#progreso-"+beca).css({
            width: porcentaje + "%",
        });*/
        //seteamos el texto del porcentaje
        /*$("#progreso-"+beca).text(  parseFloat(porcentaje).toFixed(0) + "%",);*/
        //seteamos el procentaje en la vista general
        $("#becaPorc-" + beca).text( parseFloat(porcentaje).toFixed(0) + "%");
        //aparecemos el boton contactar al llegar al 100
        if(porcentaje == 100){
            $(contenedor).find(".notificarEsc").show(300);
            //cambiamos los colores de la vista general
            /*$("#cuadro-" + beca).css({
                'color': '#FFFF',
                'background-color': '#25ACD9'
            });
            $("#cuadro-" + beca).find("[data-target=#tecmon120]").find("span").css({'color': 'white'});
            $("#becaPorc-" + beca).css({color: 'white', });*/
        }else{
            $(contenedor).find(".notificarEsc").hide(300);
        }
}

function saveRequisito(beca,usuario_id){

    var promedio = $("#" + beca + "-chbx-1");
    var mantener = $("#" + beca + "-chbx-2");
    var socioeconomico = $("#" + beca + "-chbx-3");
    var exadmision = $("#" + beca + "-chbx-4");
    var idioma = $("#" + beca + "-chbx-5");
    var ingresos = $("#" + beca + "-chbx-6");

    if(promedio.is(':checked')){
        promedio=1;
    }else{
        promedio = 0;
    }
    if(mantener.is(':checked')){
        mantener=1;
    }else{
        mantener = 0;
    }if(socioeconomico.is(':checked')){
        socioeconomico=1;
    }else{
        socioeconomico = 0;
    }if(exadmision.is(':checked')){
        exadmision=1;
    }else{
        exadmision = 0;
    }if(idioma.is(':checked')){
        idioma=1;
    }else{
        idioma = 0;
    }if(ingresos.is(':checked')){
        ingresos=1;
    }else{
        ingresos = 0;
    }

    var parametros = {'beca':beca,
                    'usuario_id':usuario_id,
                    'promedio':promedio,
                    'mantener':mantener,
                    'socioeconomico':socioeconomico,
                    'exadmision':exadmision,
                    'idioma':idioma,
                    'ingresos':ingresos,
                    'get':'guardarRequisito'};
    $.ajax({
        url: 'controladores/becas/Beca.php',
        type: 'POST',
        dataType: 'json',
        data: parametros,
        success: function(response){
            if(response.estado == 0){
              notificacion("No se pudo guardar el requisito", "danger" , beca);  
            }
        },error: function(error){
            notificacion("No se pudo guardar el requisito", "danger" , beca);
        }
    })    
}

function allReadyContact(beca){
    $("#"+beca + "-chbx-1").prop('disabled', true);
    $("#"+beca + "-chbx-2").prop('disabled', true);
    $("#"+beca + "-chbx-3").prop('disabled', true);
    $("#"+beca + "-chbx-4").prop('disabled', true);
    $("#"+beca + "-chbx-5").prop('disabled', true);
    $("#"+beca + "-chbx-6").prop('disabled', true);

    $("#" + beca + "-btncontac").prop('disabled', true);

    $("#" + beca + "-btregistrarUsuarioncontac").html("¡Gracias!");

}

function registrarUsuario(){
    if(validarRegistro()){
        var correo =   document.getElementById("correo").value;
        var password = document.getElementById("password").value;
        var parametros = {"get" : "registrarUsuario", "correo" : correo , "password" : password};
        console.log(parametros);
        $.ajax({
            url: 'controladores/sesion/registrar_usuario.php',
            type: 'POST',
            dataType: 'json',
            data: parametros,
            success: function(response){
                if(response.estado == 1){
                    window.location.replace("perfil.php");
                }else{
                    $.notify({
                        title: '<strong>¡Hey!</strong>',
                        message: response.mensaje
                    },{
                        type: 'danger'
                    });
                }
            },error: function(error){
                $.notify({
                    title: '<strong>¡Hey!</strong>',
                    message: error
                },{
                    type: 'danger'
                });
            }
        });
    }
}