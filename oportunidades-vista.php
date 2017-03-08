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
        <title>Becap - Oportunidades</title>
        
        <meta name="description" content="La forma más sencilla de encontrar BECAS. Becas académicas según tu perfil">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/b.png">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/s3.css">
        <link rel="stylesheet" href="css/s4.css">
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
                    <li class="active"><a href="#" class="gr"><b>Oportunidades</b></a></li>
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
             <div class="col-xs-12" align="center">
                <h3><b>Hemos encontrado <span class="blue">
                
                <?php echo Counter($_SESSION["id_usuario"]); ?>
                  
                </span> becas para ti</b></h3>
                <p>Todas estan becas estan a tu alcance, revisalas y marca tus favoritas para tenerlas en "mis becas".</p>
             </div>
           </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-md-3 space-outside">
              <p class="dark-gray gr"><b>¿Qué tipo de Beca buscas?</b></p>
                <div class="list-group">
                    <a href="" class="list-group-item active">Beca Académica</a>

                    <a href="" class="list-group-item">Beca Crédito</a>

                    <a href="" class="list-group-item">Beca Mixta</a>
                    
                    <a href="" class="list-group-item">Beca Gobierno</a>
                </div>
                <div align="center">
                  <button class="btn btn-default btn-sm gray">                   
                    <a href="oportunidades.php">
                      <span class="glyphicon glyphicon glyphicon-th gr"></span>
                    </a>
                  </button>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-info btn-sm"> 
                      <span class="glyphicon glyphicon glyphicon-align-justify gr"></span>
                  </button>
                </div>
            </div>

            <div class="col-md-9">

                <?php echo MostrarBecasList($_SESSION["id_usuario"]); ?>

                <!--
                <div class="row">
                    <div class="col-md-12 caja-h">
                        <div class="row">
                          <div class="col-xs-1">
                            <span class="glyphicon glyphicon-star yellow" aria-hidden="true" align="right"></span> 
                          </div>
                          <div class="col-xs-3 space-inside">
                            <a href="" data-toggle="modal" data-target="#tecmon"><span class="blue-box">Tec de Monterrey</span></a> 
                          </div>
                          <div class="col-xs-4 space-inside">
                            <p class="dark-gray"><b>Beca Académica</b></p>
                          </div>
                          <div class="col-xs-4 space-inside">
                            <p class="dark-gray"><b>50% de Beca sobre colegiatura</b></p>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 caja-h">
                        <div class="row">
                          <div class="col-xs-1">
                            <span class="glyphicon glyphicon-heart red" aria-hidden="true" align="right"></span> 
                          </div>
                          <div class="col-xs-3 space-inside">
                            <a href="" data-toggle="modal" data-target="#tecmon-heart"><span class="blue-box">Tec de Monterrey</span></a> 
                          </div>
                          <div class="col-xs-4 space-inside">
                            <p class="dark-gray"><b>Beca Académica</b></p>
                          </div>
                          <div class="col-xs-4 space-inside">
                            <p class="dark-gray"><b>50% de Beca sobre colegiatura</b></p>
                          </div>
                        </div>
                    </div>
                </div>

                -->

            </div>


          </div>  <!-- row -->
        </div>    <!-- container -->
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


<?php echo Modals(); ?>