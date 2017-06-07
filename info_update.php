<?php
    error_reporting(0);
    require_once dirname(__FILE__) . "/controladores/sesion/comprueba_sesion.php";
    include_once dirname(__FILE__) . '/controladores/funciones/funciones.php';
    require_once dirname(__FILE__) . '/controladores/datos/ConexionBD.php';
    $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
?>
<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Becap - Inicio</title>
        
        <meta name="description" content="La forma más sencilla de encontrar BECAS. Becas académicas según tu perfil">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/b.png">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/s3.css">
        <script src="js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <style>
          .app-boton {
            color: #9F9F9F;
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
            vertical-align: middle;
            user-select: none;
          }
        </style>
    </head>

    <body>
        <!-- Navbar -->
      
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
                    <li><a href="configuracion.php" class="gr"><b><span class="underline"><span>Configuración</span></span></b></a></li>
                    <li><a><?php echo $_SESSION["nombreCompleto"]; ?></a></li>
                    <!-- <li><a href="controladores/sesion/cerrar_sesion.php" class="btn btn-info btn-sm">Cerrar sesion</a></li> -->
                </ul>

              </div><!--/.navbar-collapse -->
          </div>
      </nav>
      <div style="margin-top: 10px;"></div>
      <header>
         <div class="container space3">
           <div class="row">
             <div class="col-xs-12" align="center">
               <h3 style="color: #545454;"><b>Actualiza tus interéses</b></h3>
                <p style="color: #545454;">Selecciona todas las áreas que te interesen</p>
             </div>
           </div>
         </div>

         <div class="container space2">
            <div class="row centered-form">
              <div class="col-md-8 col-md-offset-2"" align="center">
                <div class="">
                    <br><br>                      
                    <!-- INICIO FORMULARIO -->
                    <form action="controladores/usuario/carreras_usuario.php"
                          method="post" class="form" role="form" 
                          name="formulario_informacion" id="formulario_informacion">
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="admin_btn">Administración</button>
                                  <input type="checkbox" class="hidden" value="0" id="admin" name="admin"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="aboga_btn">Abogacía</button>
                                  <input type="checkbox" class="hidden" value="0" id="aboga" name="aboga"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="psico_btn">Psicología</button>
                                  <input type="checkbox" class="hidden" value="0" id="psico" name="psico"/>
                              </span>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="conta_btn">Contabilidad</button>
                                  <input type="checkbox" class="hidden" value="0" id="conta" name="conta"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="econo_btn">Economía</button>
                                  <input type="checkbox" class="hidden" value="0" id="econo" name="econo"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="finan_btn">Finanzas</button>
                                  <input type="checkbox" class="hidden" value="0" id="finan" name="finan"/>
                              </span>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="arthu_btn">Artes y Humanidades</button>
                                  <input type="checkbox" class="hidden" value="0" id="arthu" name="arthu"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="arqui_btn">Arquitectura</button>
                                  <input type="checkbox" class="hidden" value="0" id="arqui" name="arqui"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="ingen_btn">Ingeniería</button>
                                  <input type="checkbox" class="hidden" value="0" id="ingen" name="ingen"/>
                              </span>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="disin_btn">Diseño Industrial</button>
                                  <input type="checkbox" class="hidden" value="0" id="disin" name="disin"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="ensen_btn">Enseñanza</button>
                                  <input type="checkbox" class="hidden" value="0" id="ensen" name="ensen"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="app-boton btn-block" data-color="info" id="medic_btn">Medicina</button>
                                  <input type="checkbox" class="hidden" value="0" id="medic" name="medic"/>
                              </span>
                            </div>
                          </div>
                      </div>
                      
                      <br><br>

                      <div class="row">
                         <div class="col-xs-12" align="center">
                           <h4 style="color: #545454;"><b>Actualiza tu ciudad</h4>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <input type="text" name="ciudad" id="ciudad" class="form-control fields input-sm" placeholder="Ciudad" required>
                        </div>
                      </div>

                      <div class="row">
                         <div class="col-xs-12" align="center">
                           <h4 style="color: #545454;"><b>Actualiza país</h4>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <input type="text" name="pais" id="pais" class="form-control fields input-sm" placeholder="País" required>
                        </div>
                      </div>

                      <div class="row">
                         <div class="col-xs-12" align="center">
                           <h4 style="color: #545454;"><b>Actualiza tu número de celular</h4>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <input type="text" name="telefono" id="telefono" class="form-control fields input-sm" placeholder="Teléfono" required>
                        </div>
                      </div>
                      
                      <br>
                      
                      <div class="row">
                         <div class="col-xs-12" align="center">
                           <h4 style="color: #545454;"><b>¿Que tipo de beca buscas?</h4>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <select class="form-control fields input-sm" name="tipo_beca" id="tipo_beca">
                                <option value="4">Posgrado</option>
                                <option value="3">Profesional</option>
                                <option value="2">Preparatoria</option>
                                <option value="1" selected>Secundaria</option>
                              </select>
                        </div>
                      </div> 
                      
                      <br>  

                      <div class="row">
                            <div class="col-xs-12 col-md-2 col-md-offset-5">
                                <button class="btn btn-success btn-block" type="button" onclick="validateIntereses();">Actualizar</button>
                            </div>
                      </div>
                  </form>

                  <hr>

                  <form action="controladores/usuario/informacion_usuario.php"
                          method="post" class="form" role="form"
                          name="formulario_perfil" id="formulario_perfil">

                      <div class="row">
                       <div class="col-xs-12" align="center">
                          <h4 class="m-space" style="color: #545454;"><h3><b>Actualiza tu historial académico</b></h3></h4>
                          <h4 class="m-space" style="color: #545454;">Llena todas las casillas que apliquen para ti, esto mejora <br> la probabilidad de que las escuelas te contacten.</h4>
                          <br>
                       </div>
                      </div>

                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group" align="center">
                              <b>Posgrado</b>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="posgrado" id="posgrado" class="form-control fields input-sm" placeholder="Escuela">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="posgraPromedio" id="posgraPromedio" class="form-control fields input-sm mytooltip" placeholder="Promedio (Acumulado o Final)" data-toggle="tooltip" title="En escala del 1 al 100">
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group" align="center">
                              <b>Universidad</b>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="universidad" id="universidad" class="form-control fields input-sm" placeholder="Escuela">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="uniPromedio" id="uniPromedio" class="form-control fields input-sm mytooltip" placeholder="Promedio (Acumulado o Final)" data-toggle="tooltip" title="En escala del 1 al 100">
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group" align="center">
                              <b>Preparatoria</b>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="preparatoria" id="preparatoria" class="form-control fields input-sm" placeholder="Escuela">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="prepaPromedio" id="prepaPromedio" class="form-control fields input-sm mytooltip" placeholder="Promedio (Acumulado o Final)" data-toggle="tooltip" title="En escala del 1 al 100">
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group" align="center">
                              <b>Secundaria</b>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="secundaria" id="secundaria" class="form-control fields input-sm" placeholder="Escuela">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="secuPromedio" id="secuPromedio" class="form-control fields input-sm mytooltip" placeholder="Promedio (Acumulado o Final)" data-toggle="tooltip" title="En escala del 1 al 100">
                            </div>
                          </div>
                      </div>

                      <br>
                      <div class="row">
                            <div class="col-xs-12 col-md-2 col-md-offset-5">
                                <button class="btn btn-success btn-block" type="button" onclick="validateHistorial();" name="enviar">Actualizar</button>
                            </div>
                      </div>

                    </form>


                    <!-- FIN FORMULARIO -->
                  
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
      </footer>

        <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/bootstrap-notify.js"></script>
        <script src="js/main.js"></script>
        <script src="js/info_update.js"></script>
    </body>
</html>
