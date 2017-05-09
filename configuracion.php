<?php
    error_reporting(1);
    require_once dirname(__FILE__) . "/controladores/sesion/comprueba_sesion.php";
    include_once dirname(__FILE__) . '/controladores/funciones/funciones.php';
?>
<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Becap - Configuración</title>
        
        <meta name="description" content="La forma más sencilla de encontrar BECAS. Becas académicas según tu perfil">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/b.png">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/s3.css">
        <link rel="stylesheet" href="css/s6.css">
        <style>
          body{
            overflow-x: hidden;
          }
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
          .boton-gris {
            color: #959595;
            border-radius: 5px;
          }
          .boton-gris:hover {
            color: #656565;
            border-radius: 5px;
          }
          .modal-content{
              -webkit-box-shadow: 0 5px 15px rgba(0,0,0,0);
              -moz-box-shadow: 0 5px 15px rgba(0,0,0,0);
              -o-box-shadow: 0 5px 15px rgba(0,0,0,0);
              box-shadow: 0 5px 15px rgba(0,0,0,0);
              border: 0px solid rgba(0, 0, 0, .2);
          }
          .modal-header{
            background: #FFFFFF;
          }
          .modal-title{
            line-height: 0.6;
            color: #FF0000;
          }
          .modal-body{
            border-radius: 5px;
          }
          @media (min-width: 768px) {
            .modal-dialog {
              width: 300px;
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
          
          h4 {
            font-size: 14px;
          }

          label {
            font-size: 12px;
          }
        </style>
        <script src="js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body>
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
                <a class="navbar-brand" href="oportunidades.php">Becap</a>
              </div>

              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="misbecas.php" class="gr"><b>Mis Becas</b></a></li>
                    <li><a href="oportunidades.php" class="gr"><b>Oportunidades</b></a></li>
                    <li><a href="#" class="gr"><b><span class="underline"><span>Configuración</span></span></b></a></li>
                    <li><a href="#"><?php echo $_SESSION["nombreCompleto"]; ?></a></li>
                    <!-- <li><a href="controladores/sesion/cerrar_sesion.php" class="btn btn-info btn-sm">Cerrar sesion</a></li> -->
                </ul>

              </div><!--/.navbar-collapse -->
          </div>
      </nav>

      <header>
        <br>
        <div class="container space3">
           <div class="row">
             <div class="col-xs-12 col-md-offset-1" align="left">
                <b style="font-size: 18px; color: #545454;"><?php echo $_SESSION["nombreCompleto"]; ?></b>
             </div>
           </div>
        </div>
        <br>
        <div class="container">
          <br>
            <div class="row">
              <div class="col-md-3 col-md-offset-1">
                <h4 style="color: #545454;"><b>Mi cuenta</b></h4>
              </div>
              <div class="col-md-7" style="margin-top: 10px;">
                 <b class="dark-gray" style="font-size: 12px">Correo:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["correo"]; ?>
                <br> 
                 <b class="dark-gray" style="font-size: 12px">Contraseña:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**********
                <br>
                
                <div class="row">
                  <div class="col-md-4">
                    <button class="btn boton-rojo btn-block m-margin" data-toggle="modal" data-target="#updatePassModal">Cambiar contraseña</button>
                  </div>
                  
                  <div class="col-md-6">
                    <a href="controladores/sesion/cerrar_sesion.php" class="btn boton-gris m-margin"><b>Cerrar sesion</b></a>
                  </div>

                </div>
              </div>
            </div>
          <br> <br>

            <div class="row">
              <div class="col-md-3 col-md-offset-1">
                <h4 style="color: #545454;"><b>Mi perfil</b></h4> 
              </div>
              <div class="col-md-7" style="margin-top: 10px; font-size: 12px;">
                <p>Recuerda que tu perfil es la base con la que buscamos las becas que son para tí, si tus calificaciones han cambiado, por favor actualiza tu perfil dando clic a "Actualizar Perfil".
                </p>
                <div class="row">
                  <div class="col-md-4">
                    <a href="info_update.php" class="btn boton-rojo btn-block m-margin">Actualizar perfil</a>
                  </div>
                </div>
              </div>
            </div>
          <br>  

          <!--
            <div class="row">
              <div class="col-md-3 col-md-offset-1">
                <h4>Notificaciones</h4>
              </div>
              <div class="col-md-7">
                <div class="list-group">
                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;
                          Deseo recibir actualizaciones sobre becas con las que cumplo el promedio.
                    </label>
                    
                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;
                          Deseo recibir actualizaciones si los requisitos de "mis becas" cambian.
                    </label>

                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;
                          Deseo recibir un correo del resumen semanal con nuevas becas y cambios.
                    </label>

                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;
                          Deseo recibir información valiosa de los Partners de Becap
                    </label>
                </div>
              </div>
            </div>
            -->
          <br>

            <div class="row">
              <div class="col-md-3 col-md-offset-1">
                <h4 style="color: #545454;"><b>Notificaciones</b></h4>
              </div>
              <div class="col-md-7">
                <div class="list-group">
                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;Deseo recibir notificaciones sobre becas con las que cumplo el promedio.
                    </label>
                    
                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;Deseo recibir actualizaciones si los requisitos de "Mis becas" cambian.
                    </label>

                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;Deseo recibir un correo de resumen semanal con nuevas becas y cambios.
                    </label>

                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;Deseo recibir información valiosa y/o promocional de los Partners de Becap.
                    </label>
                </div>
              </div>
            </div>
          
          
            <div class="row">
              <div class="col-md-3 col-md-offset-1">
                <h4 style="color: #545454;"><b>Privacidad</b></h4>
              </div>
              <div class="col-md-7" style="margin-top: 10px; font-size: 12px;">
                Ir al aviso de <span> <a href="terminos.php">Privacidad, Términos y Condiciones</a></span>
              </div>
            </div>
          <br>

            <div class="row">
              <div class="col-md-3 col-md-offset-1">
                <h4 style="color: #545454;"><b>Sobre Becap</b></h4>
              </div>
              <div class="col-md-7" style="margin-top: 10px; font-size: 12px;">
                Si deseas darnos retroalimentación por favor envianos un correo a retro@becap.mx, con gusto <br>lo atenderemos.
              </div>
            </div>
          <br><br>
          
      
      </header>

      

      <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <script src="js/bootstrap-notify.js"></script>
        <script src="js/configuracion.js"></script>
    </body>
</html>

  <div id="updatePassModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              
              <div class="modal-body" style="background:#EFEFEF !important;" align="center">
                    <div style="margin-top: 10px;"></div>
                    <p style="font-weight: bold; font-size: 20px; color: #545454;">Cambio de Contraseña</p>
                    <div style="margin-top: 20px;"></div>

                    <p style="font-weight: bold; font-size: 14px; color: #A7A7A7; text-align: left;">Introduce dos veces tu contraseña nueva para confirmar, los campos debajo deben coincidir para poder continuar.</p>
                      <form action="controladores/sesion/iniciar_sesion.php" method="post" name="formularionav" style="margin-top: 25px;">
                          
                          <div class="form-group">
                              <input type="password" placeholder="Nueva contraseña" class="form-control special" id="pwd" name="pwd" required>
                          </div>
                          
                          <div style="margin-top: 25px;"></div>
                          <div class="form-group">
                              <input type="password" placeholder="Confirmar contraseña" class="form-control special" id="pwd_confirm" name="pwd_confirm" required>
                          </div>
                          
                          <div style="margin-top: 25px;"></div>
                          <div class="form-group" align="center">
                              <button type="submit" class="btn btn-block boton-rojo" onclick="updatePassword();" name="enviar" id="enviar" style="padding: 9px 12px; font-size: 15px;">Cambiar contraseña</button>
                          </div>
                      </form>
                  
              </div>
            
        </div>
      </div>
  </div>

