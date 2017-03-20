<?php
    error_reporting(1);
    require_once dirname(__FILE__) . "/controladores/sesion/comprueba_sesion.php";
    include_once dirname(__FILE__) . '/controladores/funciones/funciones.php';

    if (validateProfile($_SESSION['correo'])) {
        // Si ya tiene el perfil... valida la información
        if (validateInformation($_SESSION['correo'])) {
            // Si ya completo la información lo redirecciona a mis becas
            header("Location: misbecas.php");
        }
    } else {
        // Si no ha completado su perfil, lo redirecciona a perfil.php
        header("Location: perfil.php");
    }
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
                <form class="navbar-form navbar-right" role="form">
                  <label for="" class="white"> <?php echo $_SESSION["nombreCompleto"]; ?> </label>&nbsp;&nbsp;&nbsp;
                  <a href="controladores/sesion/cerrar_sesion.php" class="btn btn-info btn-sm">Cerrar sesion</a>
                </form>
              </div><!--/.navbar-collapse -->
          </div>
      </nav>

      <header>
         <div class="container space3">
           <div class="row">
             <div class="col-xs-12" align="center">
               <h3><b>Ya casi terminamos, ¿Qué te interesa estudiar?</b></h3>
                <p>Selecciona todas las áreas que te interesen</p>
             </div>
           </div>
         </div>

         <div class="container space2">
            <div class="row centered-form">
              <div class="col-xs-12 col-sm-12 col-md-10 col-sm-offset-2 col-md-offset-1" align="center">
                <div class="panel panel-default">
                  <div class="panel-body">
                    
                    <!-- INICIO FORMULARIO -->
                    <form action="controladores/usuario/carreras_usuario.php"
                          method="post" class="form" role="form" 
                          name="formulario_informacion" id="formulario_informacion">
                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Administración</button>
                                  <input type="checkbox" class="hidden" value="Administración" id="admin" name="admin"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Abogacía</button>
                                  <input type="checkbox" class="hidden" value="Abogacía" id="aboga" name="aboga"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Psicología</button>
                                  <input type="checkbox" class="hidden" value="Psicología" id="psico" name="psico"/>
                              </span>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Contabilidad</button>
                                  <input type="checkbox" class="hidden" value="Contabilidad" id="conta" name="conta"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Economía</button>
                                  <input type="checkbox" class="hidden" value="Economía" id="econo" name="econo"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Finanzas</button>
                                  <input type="checkbox" class="hidden" value="Finanzas" id="finan" name="finan"/>
                              </span>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Artes y Humanidades</button>
                                  <input type="checkbox" class="hidden" id="arthu" name="arthu"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Arquitectura</button>
                                  <input type="checkbox" class="hidden" id="arqui" name="arqui"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Ingeniería</button>
                                  <input type="checkbox" class="hidden" id="ingen" name="ingen"/>
                              </span>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Diseño Industrial</button>
                                  <input type="checkbox" class="hidden" id="disin" name="disin"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Enseñanza</button>
                                  <input type="checkbox" class="hidden" id="ensen" name="ensen"/>
                              </span>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <span class="button-checkbox">
                                  <button type="button" class="btn" data-color="info">Medicina</button>
                                  <input type="checkbox" class="hidden" id="medic" name="medic"/>
                              </span>
                            </div>
                          </div>
                      </div>
                      
                      <br>
                      
                      <div class="row">
                         <div class="col-xs-12" align="center">
                           <h4><b>¿En qué teléfono quieres que te contacten las escuelas?</h4>
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
                           <h4><b>¿Que tipo de beca buscas?</h4>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <select class="form-control fields input-sm" name="tipo_beca" id="tipo_beca">
                                <option value="1">Académica</option>
                                <option value="2">Crédito</option>
                                <option value="3">Especie</option>
                              </select>
                        </div>
                      </div> 
                      
                      <br>  

                      <div class="row">
                            <div class="col-xs-12 col-md-2 col-md-offset-5">
                                <button class="btn btn-danger btn-block" type="submit" onclick="validateInformation();">Continuar</button>
                            </div>
                      </div>

                     <div class="row m-space">
                          <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5"> 
                            <div class="progress">
                              <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:99%">
                                99%
                              </div>
                            </div>
                          </div>
                      </div>
                    
                    </form>
                    <!-- FIN FORMULARIO -->
                  </div>
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
                <span><a href="terminos.php">Privacidad, Términos y Condiciones</a></span>
              </div>
            </div>
          </div>
      </footer>

        <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/bootstrap-notify.js"></script>
        <script src="js/main.js"></script>
        <script>
            function validateInformation() {
                event.preventDefault();
                var valid = 1;
                var msg = "";

                if ( !$('#telefono').val() ) {
                    valid = 0;
                    msg = "Ingresa un número telefónico";
                }

                if ( !$('#tipo_beca').val() ) {
                    valid = 0;
                    msg = "Selecciona un tipo de beca";
                }

                if ( !$('#admin').is(':checked') && !$('#aboga').is(':checked') && !$('#psico').is(':checked')
                    && !$('#conta').is(':checked') && !$('#econo').is(':checked') && !$('#finan').is(':checked')
                    && !$('#arthu').is(':checked') && !$('#arqui').is(':checked') && !$('#ingen').is(':checked')
                    && !$('#disin').is(':checked') && !$('#ensen').is(':checked') && !$('#medic').is(':checked') ) {
                    valid = 0;
                    msg = "Selecciona al menos área de interés";
                }

                if (valid === 1) {
                    $('form#formulario_informacion').submit();
                } else {
                    $.notify({
                        message: msg
                    },{
                        type: 'warning',
                        placement: {
                            from: "top",
                            align: "right"
                        }
                    });
                }
            }
        </script>
    </body>
</html>
