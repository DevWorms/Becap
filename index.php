<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Becap - Becas según tu perfil académico</title>
        
        <meta name="description" content="La forma más sencilla de encontrar BECAS. Becas académicas según tu perfil">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/b.png">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main-index.css">
        <link rel="stylesheet" href="css/animate.css">
        <script src="js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <style>
          .boton-rojo {
            color: #FFF;
            font-weight: bold;
            background: #E74C3C;
            opacity: 1.00;
            border-radius: 5px;
            font-size: 14px;
          }
          .boton-rojo:hover{
            color: #FFF;
            font-weight: bold;
            background: #C94335;
            opacity: 1.00;
            border-radius: 5px;
          }
          .boton-rojo:focus{
            color: #FFF;
            font-weight: bold;
          }
          .modal-content{
              -webkit-box-shadow: 0 5px 15px rgba(0,0,0,0);
              -moz-box-shadow: 0 5px 15px rgba(0,0,0,0);
              -o-box-shadow: 0 5px 15px rgba(0,0,0,0);
              box-shadow: 0 5px 15px rgba(0,0,0,0);
              border: 0px solid rgba(0, 0, 0, .2);
          }
          .modal-title{
            line-height: 0.6;
            color: #FF0000;
          }
          .modal-body{
            border-radius: 0px 0px 5px 5px;
          }
          .modal-footer{
            background: #efefef;
            border: 0px solid rgba(0, 0, 0, .2);
          }
          @media (min-width: 768px) {
            .modal-dialog {
              width: 400px;
              margin: 30px auto;
            }
          }
          .special {
              height: 40px;
              font-weight: bold;
              color: #A7A7A7;
              font-size: 15px;
              line-height: 1.33;
              border-radius: 6px;
              border: 0px solid #ccc;
              text-align: left;
          }
        </style>
    </head>

    <body>
    <?php
        //Verifica que exista un sesion y de no ser asi, una cookie

        // CAMBIAR redireccionamiento A MisBecas
        session_start();
        if(isset($_SESSION["nombre"])){
            header("location:misbecas.php");  
          }

        if(isset($_COOKIE["nombre"])){
            header("location:misbecas.php");  
          }
    ?>

        <!-- Navbar -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Becap</a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                  
                  <form action="controladores/sesion/iniciar_sesion.php"
                        class="navbar-form navbar-right" 
                        role="form" method="post" name="formularionav">
                      <div class="form-group" style="color:#ffffff">
                         ya estás registrado?&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="form-group">
                        <input type="text" placeholder="Correo" class="form-control input-sm" name="correo">
                      </div>
                      <div class="form-group">
                        <input type="password" placeholder="Contraseña" class="form-control input-sm" name="password">
                      </div>

                      <button type="submit" class="btn btn-primary btn-sm" name="enviar" id="enviar">Inicia Sesión</button>

                      <div align="right" class="spce">
                        <a href="#" onclick="event.preventDefault(); showReset();" style="color:#ffffff; font-size: 13px">Recuperar contraseña</a>
                      </div>
                  </form>
                </div><!--/.navbar-collapse -->
                  <br>
            </div>
        </nav>

        <header>
          <div class="container space">
            <div class="row">
              <div class="col-md-7 col-md-offset-1" align="left">
                  <div class="intro-text">
                      <h2 class="intro-text it-sp" style="color:#969696">Becap te ayuda a encontrar becas <br>según tu perfil académico, <span class="blue">en minutos.</span></h2>  
                  </div>
              </div>
              <br>
              <div class="col-md-3 well well-custom">
                  <h3 align="center"><b>Crea tu cuenta gratis</b></h3>

                  <div  class="form" role="form" 
                        name="formulario1"">
                    
                        <br>
                        <label for="">Correo</label>                    
                        <input class="form-control input-lg special" name="correo" id="correo" placeholder="" type="email" />
                        <br>
                        <label for="">Contraseña (6 caracteres)</label> 
                        <input class="form-control input-lg special" name="password" id="password" placeholder="" type="password" />
                        <br>
                        <div class="row">
                             <div class="col-xs-12 col-md-8 col-md-offset-2">
                                   <button class="btn btn-danger btn-block" type="button" name="enviar" onclick="registrarUsuario()"><b>Únete ahora</b></button> 
                             </div>
                        </div>

                  </div>                
              </div> 

            <!-- Row -->    
            </div>
          <!-- Container -->  
          </div>
        </header>


        <footer>
            <div class="container">
              
            <hr>
              <div class="row">
                <div class="col-md-7 col-md-offset-1" align="left">
                    <span>Becap S.A de C.V. 2016</span>
                </div>
                <div class="col-md-3" align="right">
                  <span><a href="terminos.php">Privacidad, Términos y Condiciones</a></span>
                </div>
              </div>
            </div>
              <br><br>
          
        </footer>

        <div class="modal fade" id="resetPassword" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 style="color: #FFF">Recuperar contraseña</h4>
              </div>
              <div class="modal-body">
                <form role="form">
                  <div class="form-group">
                    <label for="username_reset" style="font-weight: bold; font-size: 15px; color: #727272; text-align: left; padding-bottom: 10px;"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;Ingresa tu email</label>
                    <input type="text" class="form-control special" id="username_reset" placeholder="mail@example.com">
                  </div>
                  <div id="msg" style="font-weight: bold; font-size: 14px; color: #A7A7A7; text-align: left; padding-top: 10px;">
                      Un correo se enviará con una contraseña alternativa; no olvides cambiarla una vez que hayas accedido al sistema.

                  </div>

                  <div style="margin-top: 25px;"></div>
                  <div class="form-group" align="center">
                    <button type="submit" class="btn btn-default boton-rojo" id="sendPassword" data-dismiss="modal">Enviar contraseña</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <script src="js/bootstrap-notify.js"></script>
      <script type="text/javascript">
        function showReset() {
          $("#resetPassword").modal("show");
        }

        $( document ).ready(function() {
          $("#sendPassword").click(function() {
            event.preventDefault();
            $.ajax({
              type : 'POST',
              url  : 'controladores/becas/Beca.php',
              data : {
                  get: "resetPassword",
                  email: $("#username_reset").val()
              },
              dataType: "json",
              success :  function(response) {
                if (response.estado == 1) {
                  $("#msg").html(
                    '<div class="alert alert-success"> &nbsp; ' + response.mensaje + '</div>'
                    );
                } else {
                  $("#msg").html(
                    '<div class="alert alert-danger"> &nbsp; ' + response.mensaje + '</div>'
                    );
                }
              },
              error : function (response) {
                  console.log(response);
              }
          });
        });
      });
      </script>
    </body>
</html>
