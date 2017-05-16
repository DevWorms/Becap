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
                      <a href="#" onclick="event.preventDefault(); showReset();" style="color:#ffffff; position: absolute; margin-left: -241px; margin-top: 32px;">Recuperar contraseña</a>-
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

                  <form action="controladores/sesion/registrar_usuario.php" 
                        method="post" class="form" role="form" 
                        name="formulario1"
                        onsubmit="return validar();">
                    
                        <br>
                        <label for="">Correo</label>                    
                        <input class="form-control input-lg special" name="correo" id="correo" placeholder="" type="email" />
                        <br>
                        <label for="">Contraseña (6 caracteres)</label> 
                        <input class="form-control input-lg special" name="password" id="password" placeholder="" type="password" />
                        <br>
                        <div class="row">
                             <div class="col-xs-12 col-md-8 col-md-offset-2">
                                   <button class="btn btn-danger btn-block" type="submit" name="enviar"><b>Únete ahora</b></button> 
                             </div>
                        </div>

                  </form>                
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
                <h4>Recuperar contraseña</h4>
              </div>
              <div class="modal-body">
                <form role="form">
                  <div class="form-group">
                    <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter email">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
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
      </script>
    </body>
</html>
