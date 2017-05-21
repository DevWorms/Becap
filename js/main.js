$(function () {
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

    $("form#filtros :button").each(function(){
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

            filtrar();
        });
    });
});


// Valida los campos en formulario

function validar(){
    var nombre, correo, password;
    nombre =   document.getElementById("name").value;
    correo =   document.getElementById("correo").value;
    password = document.getElementById("password").value;

    if(nombre === "" || correo === "" || password === ""){
        
        $.notify({
            title: '<strong>¡Hey!</strong>',
            message: ' Para poder crear tu cuenta debes ingresar todos los campos.'
        },{
            type: 'danger'
        });

        return false;
    }
}

function addToFavorite(user_id, beca_id) {
    event.preventDefault();

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
                notificacion(response.mensaje, "success", beca_id);
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
                notificacion(response.mensaje, "success", beca_id);
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
                notificacion(response.mensaje, "success", beca_id);
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
                notificacion(response.mensaje, "success", beca_id);
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


function filtrar() {
    $(".beca").css('display', 'none');
    if (($("#filtro21").val() == 0 && $("#filtro22").val() == 0 && $("#filtro23").val() == 0) ||
        ($("#filtro21").val() == 1 && $("#filtro22").val() == 1 && $("#filtro23").val() == 1)
    ) {
        $(".beca").css('display', 'none');

        $(".tipo-1").show();
        $(".tipo-2").show();
        $(".tipo-3").show();

    } else {
        $(".beca").css('display', 'none');

        if ($("#filtro21").val() == 1) {
            $(".tipo-1").show();
        }

        if ($("#filtro22").val() == 1) {
            $(".tipo-2").show();
        }

        if ($("#filtro23").val() == 1) {
            $(".tipo-3").show();
        }
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