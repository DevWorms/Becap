/**
 * Created by rk521 on 14.03.17.
 */

function updatePassword() {
    event.preventDefault();
    var pwd = $('#pwd').val(), pwd_confirm = $('#pwd_confirm').val();
    if (pwd) {
        if (pwd === pwd_confirm) {
            $.ajax({
                type: "POST",
                url: "controladores/usuario/Usuario.php",
                data:  {
                    get: "updatePassword",
                    pwd: pwd,
                    pwd_confirm: pwd_confirm
                },
                dataType: "json",
                success: function (response) {
                    var msg = response.mensaje;
                    if (response.estado == 1) {
                        notification(msg, "success")
                    } else {
                        notification(msg, "warning")
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        } else {
            notification("Las contraseñas no coinciden", "warning");
        }
    } else {
        notification("Ingresa una contraseña", "warning");
    }
}

function notification(msg, type) {
    $('#updatePassModal').modal().hide();
    $.notify({
        message: msg
    },{
        type: type,
        placement: {
            from: "top",
            align: "right"
        }
    });
}