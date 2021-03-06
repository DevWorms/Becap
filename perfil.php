<?php
    error_reporting(1);
    require_once dirname(__FILE__) . "/controladores/sesion/comprueba_sesion.php";
    include_once dirname(__FILE__) . '/controladores/funciones/funciones.php';

    if (validateProfile($_SESSION['correo'])) {
        // Si ya tiene el perfil... valida la información
        if (validateInformation($_SESSION['correo'])) {
            // Si ya completo la información lo redirecciona a mis becas
            header("Location: oportunidades.php");
        } else {
            // Si no ha completado la información, lo redirecciona a informacion.php
            header("Location: informacion.php");
        }
    }
?>
<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Becap - ¡Bienvenido!</title>
        
        <meta name="description" content="La forma más sencilla de encontrar BECAS. Becas académicas según tu perfil">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/b.png">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-custom.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/s2.css">
        <link rel="stylesheet" href="css/animate.css">
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
                  <?php
                      echo '<label for="" class="white" style="margin-top: 7px">' . $_SESSION["correo"] . '</label>&nbsp;&nbsp;&nbsp;';
                  ?>
                  <!-- <a href="controladores/sesion/cerrar_sesion.php" class="btn btn-info btn-sm">Cerrar sesion</a> -->
                </form>
              </div><!--/.navbar-collapse -->
          </div>
      </nav>

      <header>
         <div class="container space3">
           <div class="row">
             <div class="col-xs-12" align="center">
                 <?php
                      /* echo "<h1><b>¡Bienvenido, " . $_SESSION["nombre"] . "!</b></h1>"; */
                      echo "<h1 style='color: #545454;'><b>¡ Bienvenido !</b></h1>";
                 ?>
                <h4 class="m-space" style="color: #545454;">Tenemos <span class="blue"><?php echo CounterAll($_SESSION["id_usuario"]); ?></span> becas esperandote, solo necesitamos <br> que nos cuentes más de ti para facilitarte la búsqueda.</h4>
             </div>
           </div>
         </div>
          <br>
         <div class="container space2">
            <div class="row centered-form">
              <div class="col-xs-12 col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
                
                  <div class=""> 


                    <!-- INICIO FORMULARIO -->
                    <form action="controladores/usuario/informacion_usuario.php"
                          method="post" class="form" role="form"
                          name="formulario_perfil" id="formulario_perfil">

                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="nombre" class="form-control fields input-sm" placeholder="Nombre(s)">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="apellido" id="apellido" class="form-control fields input-sm" placeholder="Apellido(s)">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="date" name="fecha" id="fecha" class="form-control fields input-sm mytooltip" placeholder="Fecha de Nacimiento"
                                     data-toggle="tooltip" title="Fecha de Nacimiento">
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="pais" id="pais" class="form-control fields input-sm" placeholder="País donde resides">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="ciudad" id="ciudad" class="form-control fields input-sm" placeholder="Ciudad donde resides">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                            <!--
                              <input type="text" name="estudias" class="form-control fields input-sm" placeholder="¿Estudias actualmente?">
                            -->
                              <select class="form-control fields input-sm" name="estudias" id="estudias">
                                <option disabled selected>¿Estudias actualmente?</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                              </select>
                            </div>
                          </div>
                      </div>



                      <div class="row">
                       <div class="col-xs-12" align="center">
                          <h4 class="m-space"><b>Describe tu historial académico</b></h4>
                          <h4 class="m-space">Llena todas las casillas que apliquen para ti, esto mejora <br> la probabilidad de que las escuelas te contacten.</h4>
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
                              <input type="text" name="posgraPromedio" id="posgraPromedio" class="form-control fields input-sm mytooltip" placeholder="Promedio (Acumulado o Final)" 
                                     data-toggle="tooltip" title="En escala del 1 al 100">
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
                              <input type="text" name="prepaPromedio" id="prepaPromedio" class="form-control fields input-sm mytooltip" placeholder="Promedio (Acumulado o Final)" 
                                     data-toggle="tooltip" title="En escala del 1 al 100">
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
                                <button class="btn btn-danger btn-block" type="button" onclick="validateForm();" name="enviar">Continuar</button>
                            </div>
                      </div>

                     <div class="row m-space">
                          <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                            <div class="progress">
                              <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                50%
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

      <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <script src="js/bootstrap-notify.js"></script>
      <script>
              $(document).ready(function(){
                  $('[data-toggle="popover"]').popover();   
              });

              <?php
                if (isset($_SESSION['first_time'])) {
              ?>
              /*$.notify({
                message: '¡<strong>Cuenta</strong> creada exitosamente!' 
              },{
                type: 'success',
                placement: {
                  from: "bottom",
                  align: "right"
                }
              });*/
              console.log("cuenta creada");
              <?php
              } else {
              ?>
              $.notify({
                  message: "¡Bienvenido <strong><?php echo $_SESSION['nombre']?></strong>!"
              },{
                  type: 'success',
                  placement: {
                      from: "bottom",
                      align: "right"
                  }
              });
              <?php
              }
              ?>

            function validateForm() {
                var valid = 1;
                var msg = "";

                var posgrado = $('#posgrado').val();
                var universidad = $('#universidad').val();
                var preparatoria = $('#preparatoria').val();
                var secundaria = $('#secundaria').val();

                var proPosg = $('#posgraPromedio').val();
                var proUni = $('#uniPromedio').val() ;
                var proPrepa= $('#prepaPromedio').val();
                var proSecu= $('#secuPromedio').val();

                // validacion minimo 2 escuelas
                var arrEscuelas =[posgrado,universidad,preparatoria,secundaria];
                var alMenosDosEscuelas = 0;

                for(var cont = 0; cont < arrEscuelas.length ; cont++){
                    if(!arrEscuelas[cont]){
                        alMenosDosEscuelas += 1;
                    }
                }

                if ( alMenosDosEscuelas > 2 ) {

                    msg = "Ingresa al menos dos escuelas con su promedio";
                    valid = 0;

                } else {
                    if (posgrado && !proPosg) {
                        msg = "Ingresa tu promedio del posgrado";
                        valid = 0;
                    }

                    if (universidad && !proUni) {
                        msg = "Ingresa tu promedio de la universidad";
                        valid = 0;
                    }

                    if (preparatoria && !proPrepa) {
                        msg = "Ingresa tu promedio de la preparatoria";
                        valid = 0;
                    }

                    if (secundaria && !proSecu) {
                        msg = "Ingresa tu promedio de la secundaria";
                        valid = 0;
                    }

                    if( proPosg && (isNaN(proPosg) || (proPosg < 0 || proPosg >100)) ){
                      msg = "El promedio de Posgrado debe ser un valor numérico entre 0 y 100";
                      valid = 0;
                    }

                    if( proUni && (isNaN(proUni) || (proUni < 0 || proUni >100)) ){
                        msg = "El promedio de Profesional debe ser un valor numérico entre 0 y 100";
                        valid = 0;
                    }

                    if( proPrepa && (isNaN(proPrepa) || (proPrepa < 0 || proPrepa >100)) ){
                        msg = "El promedio de Preparatoria debe ser un valor numérico entre 0 y 100";
                        valid = 0;
                    }

                    if( proSecu && (isNaN(proSecu) || (proSecu < 0 || proSecu >100)) ){
                        msg = "El promedio de Secundaria debe ser un valor numérico entre 0 y 100";
                        valid = 0;
                    }
                }

                if (!$('#estudias').val()) {
                    msg = "Especifica si estudias actualmente";
                    valid = 0;
                }

                if (!$('#ciudad').val()) {
                    msg = "Ingresa tu ciudad de residencia";
                    valid = 0;
                }

                if (!$('#pais').val()) {
                    msg = "Ingresa tu pais de residencia";
                    valid = 0;
                }

                if (!$('#fecha').val()) {
                    msg = "Ingresa tu fecha de nacimiento";
                    valid = 0;
                }

                if (!$('#apellido').val()) {
                    msg = "Ingresa tu(s) apellido(s)";
                    valid = 0;
                }

                

                if (valid === 1) {
                    $('form#formulario_perfil').submit();
                } else {
                    $.notify({
                        message: msg
                    },{
                        type: 'danger',
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
