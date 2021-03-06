<?php
    session_start();
    error_reporting(1);
    require_once dirname(__FILE__) . "/controladores/sesion/comprueba_sesion.php";
    include_once dirname(__FILE__) . '/controladores/funciones/funciones.php';
    //obtenemos el tipo de beca para establecer lso filstros iniciales
   /* $tipo_beca = $_SESSION['tipo_beca'];
    $tipo_siguiente = $tipo_beca + 1;*/
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
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/s3.css">
        <link rel="stylesheet" href="css/s4.css">
        <script src="js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/bootstrap-notify.js"></script>
        <script src="js/main.js"></script> 
        <style>
          .app-boton {
            color: #706F6F;
            font-weight: bold;
            font-size: 14px;
            line-height: 1.42857143;
            background: #fff;
            border-radius: 5px;
            border: 0px solid #fff;
            width: 155px;
            padding: 6px 12px;
            margin-bottom: 0;
            text-align: center;
            white-space: nowrap;
            text-align: left;
            vertical-align: middle;
            user-select: none;
          }
        </style>
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
                    <li><a href="#" class="gr"><b><span class="underline"><span>Oportunidades</span></span></b></a></li>
                    <li><a href="configuracion.php" class="gr"><b>Configuración</b></a></li>
                    <li><a><?php echo $_SESSION["nombreCompleto"]; ?></a></li>
                    <!-- <li><a href="controladores/sesion/cerrar_sesion.php" class="btn btn-info btn-sm">Cerrar sesion</a></li> -->
                </ul>

              </div><!--/.navbar-collapse -->
          </div>
      </nav>

      <header>
        <div class="container space3">
           <div class="row">
             <div class="col-xs-12" align="center">
                <h2 style="color: #545454;"><b>Hemos encontrado <span class="blue">
                
                <?php echo Counter($_SESSION["id_usuario"]); ?>
                  
                </span> becas para ti</b></h2>
                <!-- <br> -->
                <p style="color: #545454;">Todas estan becas estan a tu alcance, revisalas y marca tus favoritas para tenerlas en "mis becas".</p>
                <!-- <p style="font-size:15px; color: #545454;">Selecciona el tipo de beca que buscas, revisa las oportunidades y marca con un &nbsp;<i class="glyphicon glyphicon-heart" style="color: #E74C3C; opacity: 1.00; font-size: 19px; vertical-align: middle;"></i> &nbsp;tus <span style="color: #E74C3C; font-weight: bold;">favoritas</span> para agruparlas en "mis becas".</p> -->
             </div>
           </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-md-3 space-outside">
              <p class="dark-gray gr" align="center"><b>¿Qué tipo de Beca buscas?</b></p>
                <div class="col-md-12">
                  <div class="col-md-10 col-md-offset-1">
                    <form id="filtros">
                      <div class="list-group">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button id="filtroAcademica" type="button"  class="app-boton btn btn-block" data-color="info">
                                  <input type="checkbox" style="display: none;">
                                    <b>Beca Académica</b>
                                  </button>
                              </span>
                            </div>

                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button id="filtroCredito" type="button" class="app-boton btn btn-block" data-color="info">
                                  <input type="checkbox" style="display: none;">
                                    <b>Beca crédito</b>
                                  </button>
                              </span>
                            </div>

                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button id="filtroEspecie" type="button" class="app-boton btn btn-block"  data-color="info">
                                  <input type="checkbox" style="display: none;">
                                    <b>Beca especie</b>
                                  </button>
                              </span>
                            </div>
                      </div>
                    </form>
                  </div>                
                </div>
                <!--
                <div class="list-group">
                    <a href="#" id="menu_1" onclick="filtrar($(this));" class="list-group-item">Beca Académica</a>
                    <a href="#" id="menu_2" onclick="filtrar($(this));" class="list-group-item">Beca Crédito</a>
                    <a href="#" id="menu_3" onclick="filtrar($(this));" class="list-group-item">Beca Especie</a>
                </div>
                -->
                  <div style="margin-left: 59px;">
                    <a href="oportunidades.php" class="btn btn-sm gray">
                      <span class="glyphicon glyphicon glyphicon-th"></span>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-req btn-sm"> 
                        <span class="glyphicon glyphicon-align-justify gr"></span>
                    </a>
                  </div>
            </div>

            <div class="col-md-9">
                <div id="becas_list">
                <br><br>
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
            </div>
          </div>  <!-- row -->
        </div>    <!-- container -->
      </header>

      <footer>
          <hr>
          <div class="container">
            <div class="row">
              <div class="col-xs-6" align="left">
                  <span>Becap S.A de C.V. 2016</span>
              </div>
              <div class="col-xs-6" align="right">
                <span><a href="terminos.php">Privacidad, Términos y Condiciones</a></span>
              </div>
            </div>
          </div>
              <br><br>
      </footer>
      <script>
        /*$(document).ready(function(){
          // mostramos los filtros iniciales
          var tipoBeca = <?php echo $tipo_beca;?>;
          var tipoBecaN = <?php echo $tipo_siguiente;?>;
          var arrTipos = [1,2,3,4];
          for(var i= 0 ; i<arrTipos.length ; i++){
            if(arrTipos[i] == tipoBeca || arrTipos[i] == tipoBecaN){
              $(".tipo-" + arrTipos[i]).show();
            }else{
                $(".tipo-" + arrTipos[i]).hide();
            }

          }
        });*/
      </script>
      
    </body>
</html>


<?php echo Modals(); ?>