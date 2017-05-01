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
                    <li class="active"><a href="#" class="gr"><b>Configuración</b></a></li>
                    <li><a href="#"><?php echo $_SESSION["nombreCompleto"]; ?></a></li>
                    <!-- <li><a href="controladores/sesion/cerrar_sesion.php" class="btn btn-info btn-sm">Cerrar sesion</a></li> -->
                </ul>

              </div><!--/.navbar-collapse -->
          </div>
      </nav>

      <header>
       
        <div class="container space3">
           <div class="row">
             <div class="col-xs-12 col-md-offset-1" align="left">
                <h3><b><?php echo $_SESSION["nombreCompleto"]; ?></b></h3>
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
                 <b class="dark-gray">Correo:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["correo"]; ?>
                <br> 
                 <b class="dark-gray">Contraseña:</b> &nbsp;&nbsp;******
                <br>
                <button class="btn btn-default m-margin" data-toggle="modal" data-target="#updatePassModal">Cambiar contraseña</button>
                <button class="btn btn-default m-margin"><a href="controladores/sesion/cerrar_sesion.php">Cerrar sesion</a></button>
              </div>
            </div>
          <br> 

            <div class="row">
              <div class="col-md-3 col-md-offset-1">
                <h4 style="color: #545454;"><b>Mi perfil</b></h4> 
              </div>
              <div class="col-md-7" style="margin-top: 10px;">
                <p>Recuerda que tu perfil es la base con la que buscamos becas que son para ti,
                   si tus calificaciones han cambiado, por favor modifica tu 
                   información para poder darte la información más oportuna. 
                </p>
                <button class="btn btn-default m-margin"><a href="info_update.php">Cambiar perfil</a></button>
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
                <h4 style="color: #545454;"><b>Privacidad</b></h4>
              </div>
              <div class="col-md-7" style="margin-top: 10px;">
                Ir al aviso de <span> <a href="terminos.php">Privacidad, Términos y Condiciones</a></span>
              </div>
            </div>
          <br>

            <div class="row">
              <div class="col-md-3 col-md-offset-1">
                <h4 style="color: #545454;"><b>Sobre Becap</b></h4>
              </div>
              <div class="col-md-7" style="margin-top: 10px;">
                Si deseas darnos retroalimentación por favor envianos un correo a retro@becap.mx
              </div>
            </div>
          <br>

      
      </header>

      

      <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <script src="js/bootstrap-notify.js"></script>
        <script src="js/configuracion.js"></script>
    </body>
</html>

  <div id="updatePassModal" class="modal fade " role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                <div align="">
                    <h4 class="modal-title white"><br><b> Modificar contraseña</b></h4>
                </div>
              </div>
              <div class="modal-body" style="background:#ffffff !important;">
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                      <form action="controladores/sesion/iniciar_sesion.php" method="post" name="formularionav">
                          <div class="form-group">
                              <input type="password" placeholder="Nueva contraseña" class="form-control" id="pwd" name="pwd" required>
                          </div>
                          <div class="form-group">
                              <input type="password" placeholder="Confirmar contraseña" class="form-control" id="pwd_confirm" name="pwd_confirm" required>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-info pull-right" onclick="updatePassword();" name="enviar" id="enviar">Cambiar contraseña</button>
                          </div>
                      </form>
                  </div>
                  <div class="col-lg-3"></div>
              </div>
            <div class="modal-footer"></div>
        </div>
      </div>
  </div>

