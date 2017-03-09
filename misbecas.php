<?php
    error_reporting(1);
    require_once("controladores/sesion/comprueba_sesion.php");
    include_once 'controladores/funciones/funciones.php';
?>
<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Becap - Mis Becas</title>
        
        <meta name="description" content="La forma más sencilla de encontrar BECAS. Becas académicas según tu perfil">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/b.png">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/s3.css">
        <link rel="stylesheet" href="css/s6.css">
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
                    <li class="active"><a href="#" class="gr"><b>Mis Becas</b></a></li>
                    <li><a href="oportunidades.php" class="gr"><b>Oportunidades</b></a></li>
                    <li><a href="configuracion.php" class="gr"><b>Configuración</b></a></li>
                    <li><a href="#"><?php echo $_SESSION["nombreCompleto"]; ?></a></li>
                    <li><a href="controladores/sesion/cerrar_sesion.php" class="btn btn-info btn-sm">Cerrar sesion</a></li>
                </ul>

              </div><!--/.navbar-collapse -->
          </div>
      </nav>

      <header>
        <div class="container space3">
           <div class="row">
             <div class="col-xs-12" align="left">
                <h3><b>Mis Becas favoritas</b></h3>
             </div>
           </div>
        </div>
        <br>
        <div class="container">
          <div class="row">
            <div class="col-md-3 space-outside">
              <p class="dark-gray gr"><b>Requisitos Agrupados</b></p>
                <div class="list-group">
                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;Promedio de: 80 (7/7)
                    </label>
                    
                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;Acta de Nacimiento (3/7)
                    </label>

                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;Examen de admisión (3/7)
                    </label>

                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;TOEFL: 600 (3/7)
                    </label>
                    
                    <label class="radio">
                          <input value="" type="checkbox">&nbsp;&nbsp;&nbsp;Kardex de preparatoria (2/7)
                    </label>
                </div>
            </div>
            

            <div class="col-md-9">
                <div class="row">
                    <p class="dark-gray gr margin"><b>Becas Seleccionadas</b></p>

                    <?php echo MostrarFavIntereses($_SESSION["id_usuario"]); ?>

                </div>
 
            </div>


          </div>
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
