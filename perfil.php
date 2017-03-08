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
        <title>Becap - ¡Bienvenido!</title>
        
        <meta name="description" content="La forma más sencilla de encontrar BECAS. Becas académicas según tu perfil">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/b.png">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/s2.css">
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
                      echo '<label for="" class="white">' . $_SESSION["correo"] . '</label>&nbsp;&nbsp;&nbsp;';
                  ?>
                  <a href="controladores/sesion/cerrar_sesion.php" class="btn btn-info btn-sm">Cerrar sesion</a>
                </form>
              </div><!--/.navbar-collapse -->
          </div>
      </nav>

      <header>
         <div class="container space3">
           <div class="row">
             <div class="col-xs-12" align="center">
                 <?php
                      echo "<h1><b>¡Bienvenido, " . $_SESSION["nombre"] . "!</b></h1>";
                 ?>
                <h4 class="m-space">Tenemos <span class="blue"><?php echo CounterAll($_SESSION["id_usuario"]); ?></span> becas esperandote, solo necesitamos <br> que nos cuentes más de ti para facilitarte la búsqueda.</h4>
             </div>
           </div>
         </div>

         <div class="container space2">
            <div class="row centered-form">
              <div class="col-xs-12 col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
                <div class="panel panel-default">
                  <div class="panel-body"> 

                                     
                    <!-- INICIO FORMULARIO -->
                    <form action="controladores/usuario/informacion_usuario.php"
                          method="post" class="form" role="form" 
                          name="formulario_perfil">

                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="nombre" class="form-control fields input-sm" placeholder="Nombre" value="<?php echo $_SESSION['nombre']?>" disabled>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="apellido" class="form-control fields input-sm" placeholder="Apellido">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="date" name="fecha" class="form-control fields input-sm" placeholder="Fecha de Nacimiento"
                                     data-toggle="popover" data-content="Fecha de Nacimiento">
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="pais" class="form-control fields input-sm" placeholder="País donde resides">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="ciudad" class="form-control fields input-sm" placeholder="Ciudad donde resides">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                            <!--
                              <input type="text" name="estudias" class="form-control fields input-sm" placeholder="¿Estudias actualmente?">
                            -->
                              <select class="form-control fields input-sm" name="estudias">
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
                              <input type="text" name="posgrado" class="form-control fields input-sm" placeholder="Escuela">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="posgraPromedio" class="form-control fields input-sm" placeholder="Promedio (Acumulado o Final)">
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
                              <input type="text" name="universidad" class="form-control fields input-sm" placeholder="Escuela">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="uniPromedio" class="form-control fields input-sm" placeholder="Promedio (Acumulado o Final)">
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
                              <input type="text" name="preparatoria" class="form-control fields input-sm" placeholder="Escuela">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="prepaPromedio" class="form-control fields input-sm" placeholder="Promedio (Acumulado o Final)">
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
                              <input type="text" name="secundaria" class="form-control fields input-sm" placeholder="Escuela">
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <input type="text" name="secuPromedio" class="form-control fields input-sm" placeholder="Promedio (Acumulado o Final)">
                            </div>
                          </div>
                      </div>

                      <br>
                      <div class="row">
                            <div class="col-xs-12 col-md-2 col-md-offset-5">
                                <button class="btn btn-danger btn-block" type="submit" name="enviar">Continuar</button> 
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
      <script src="js/bootstrap-notify.js"></script>
      <script>
              $(document).ready(function(){
                  $('[data-toggle="popover"]').popover();   
              });


              $.notify({
                message: '¡<strong>Cuenta</strong> creada exitosamente!' 
              },{
                type: 'success',
                placement: {
                  from: "bottom",
                  align: "right"
                },
              });
      </script>
    </body>
</html>
