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
        <link rel="stylesheet" href="css/main.css">
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
                  <a class="navbar-brand" href="#">Becap</a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                  <form class="navbar-form navbar-right" role="form" action="controladores/sesion/iniciar_sesion.php">
                    <div class="form-group">
                      <input type="text" placeholder="Correo" class="form-control" name="correo">
                    </div>
                    <div class="form-group">
                      <input type="password" placeholder="Contraseña" class="form-control" name="password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>          
                  </form>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>

        <header>
          <div class="container space">
            <div class="row">
              <div class="col-md-7" align="left">
                  <div class="intro-text">
                      <h2 class="intro-text it-sp">Becap te ayuda a encontrar becas <br>según tu perfil académico, <span class="blue">en minutos.</span></h2>  
                  </div>
              </div>
              <br>
              <div class="col-md-3 col-md-offset-1 well well-custom">
                  <legend align="center"><b>Crea tu cuenta ¡Gratis!</b></legend>
                  
                  <form action="controladores/sesion/registrar_usuario.php" method="post" class="form" role="form">
                    <label for="">Nombre</label>                    <input class="form-control" name="name" placeholder="Solo tu nombre, sin apellidos" type="text" />
                    <br>
                    <label for="">Correo</label>                    <input class="form-control" name="correo" placeholder="ejemplo@becap.com" type="text" />
                    <br>
                    <label for="">Contraseña (6 caracteres)</label> <input class="form-control" name="password" placeholder="" type="text" />
                    <br>
                    <div class="row">
                         <div class="col-xs-12 col-md-7 col-md-offset-2">
                               <button class="btn btn-danger btn-block" type="submit"><b>Únete ahora</b></button> 
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
            <hr>
            <div class="container">
              <div class="row">
                <div class="col-xs-6" align="left">
                    <span>Becap S.A de C.V 2016</span>
                </div>
                <div class="col-xs-6" align="right">
                  <span><a href="">Privacidad, Términos y Condiciones</a></span>
                </div>
              </div>
            </div>
          
        </footer>

      <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
    </body>
</html>
