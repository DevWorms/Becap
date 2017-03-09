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
                colorStart(beca_id);
                $('#tecmon' + beca_id).modal().hide();
                $.notify({
                    message: response.mensaje
                },{
                    type: 'success',
                    placement: {
                        from: "top",
                        align: "right"
                    }
                });
            }
            else {
                $('#tecmon' + beca_id).modal().hide();
                $.notify({
                    message: response.mensaje
                },{
                    type: 'warning',
                    placement: {
                        from: "top",
                        align: "right"
                    }
                });
            }
        },
        error : function (response) {
            console.log(response);
        }
    });
}

function colorHeart(id) {
    var heart = $('#heart-' + id);
    heart.removeClass("gray-box");
    heart.addClass("red");

    heart = $('#heart-m-' + id);
    heart.removeClass("gray-box");
    heart.addClass("red");
}

function colorStart(id) {
    var start = $('#start-m-' + id);
    start.removeClass("gray-box");
    start.addClass("red");
}

function addToMeInteresa(user_id, beca_id) {
    event.preventDefault();

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
                colorHeart(beca_id);

                $('#tecmon' + beca_id).modal().hide();
                $.notify({
                    message: response.mensaje
                },{
                    type: 'success',
                    placement: {
                        from: "top",
                        align: "right"
                    }
                });
            }
            else {
                $('#tecmon' + beca_id).modal().hide();
                $.notify({
                    message: response.mensaje
                },{
                    type: 'warning',
                    placement: {
                        from: "top",
                        align: "right"
                    }
                });
            }
        },
        error : function (response) {
            console.log(response);
        }
    });
}

function filtrar(obj) {
    event.preventDefault();
    $('#menu_1, #menu_2, #menu_3').removeClass('active');
    $(".beca").css('display','none');

    switch (obj.attr('id')) {
        case 'menu_1':
            $('#menu_1').addClass('active');
            $(".tipo-1").show();
            break;
        case 'menu_2':
            $('#menu_2').addClass('active');
            $(".tipo-2").show();
            break;
        case 'menu_3':
            $('#menu_3').addClass('active');
            $(".tipo-3").show();
            break;
    }
}