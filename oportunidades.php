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
        <title>Becap - Oportunidades</title>
        
        <meta name="description" content="La forma más sencilla de encontrar BECAS. Becas académicas según tu perfil">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/b.png">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/s3.css">
        <link rel="stylesheet" href="css/s4.css">
        <script src="js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
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
                    <li><a href="#"><?php echo $_SESSION["nombreCompleto"]; ?></a></li>
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
                                  <button type="button"  class="app-boton btn btn-block" id="filtro21_btn" data-color="info"><b>Beca Académica</b></button>
                                  <input type="checkbox" class="hidden" value="0" id="filtro21" name="filtro21" checked/>
                              </span>
                            </div>

                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn btn-block" id="filtro22_btn" data-color="info"><b>Beca Crédito</b></button>
                                  <input type="checkbox" class="hidden" value="0" id="filtro22" name="filtro22"/>
                              </span>
                            </div>

                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn btn-block" id="filtro23_btn" data-color="info"><b>Beca Especie</b></button>
                                  <input type="checkbox" class="hidden" value="0" id="filtro23" name="filtro23"/>
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
                  <a class="btn btn-req btn-sm">
                      <span class="glyphicon glyphicon-th gr"></span>
                  </a>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="oportunidades-vista.php" class="btn btn-sm gray">
                    <span class="glyphicon glyphicon-align-justify">
                    </span>
                  </a>
                </div>
            </div>
            <div style="margin-top: 15px;"></div>
            <div class="col-md-9">
                <div class="row" id="becas_list">

                <?php echo MostrarBecas($_SESSION["id_usuario"]); ?>
                    
                    <!--
                    <div class="col-md-2 col-md-offset-1 caja">
                      <div class="col-xs-9 space-inside" align="left">
                        <a href="" data-toggle="modal" data-target="#tecmon"><span class="blue-box">Tec de Monterrey</span></a>
                        <div class="space-inside-p">
                            <p><b>Beca Académica</b></p>
                            <p>50% de Beca sobre colegiatura</p>
                        </div>
                      </div>
                      <div class="col-xs-3" align="right">
                        <span class="glyphicon glyphicon-heart gray-box" aria-hidden="true" align="right"></span>
                      </div>
                    </div>
                    -->
                    
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
                  <span>Becap S.A de C.V. 2016</span>
              </div>
              <div class="col-xs-6" align="right">
                <span><a href="terminos.php">Privacidad, Términos y Condiciones</a></span>
              </div>
            </div>
          </div>
              <br><br>
      </footer>

      <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/bootstrap-notify.js"></script>
      <script src="js/main.js"></script>
    </body>
</html>


<?php echo Modals(); ?>