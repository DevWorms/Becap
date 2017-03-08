<?php
  require_once '../Becap/controladores/datos/ConexionBD.php';
  $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
  $pdo2 = ConexionBD::obtenerInstancia()->obtenerBD();


    function MostrarBecas($id_usuario) {
        global $pdo;

        $promedio = PromedioUsuario($id_usuario);

        $operacion = "SELECT becas.ID_Beca, becas.ID_Escuela, escuelas.Nombre_Escuela, becas.Nombre_Beca, becas.ID_Tipo , becas.Descripcion_Beca, becas.Beca_Sobre FROM becas JOIN escuelas ON becas.ID_Escuela = escuelas.ID_Escuela WHERE becas.Promedio_Acceso <= ?";

        $sentencia = $pdo->prepare($operacion);
        $sentencia->bindParam(1, $promedio);         
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();

        $filas = $sentencia->rowCount();
          
            foreach ($resultado as $fila )  {

              if($fila["ID_Tipo"] == 1)
                $tipo = "Beca Académica";
              if($fila["ID_Tipo"] == 2)
                $tipo = "Beca Crédito";
              if($fila["ID_Tipo"] == 3)
                $tipo = "Beca Especie";

                echo
                    '        
                    <div class="col-md-2 col-md-offset-1 caja">
                      <div class="col-xs-9 space-inside" align="left">
                        <a href="" data-toggle="modal" data-target="#tecmon' . $fila["ID_Beca"] . '"><span class="blue-box">' . substr($fila["Nombre_Escuela"],0,30) . '</span></a>
                        <div class="space-inside-p">
                            <p><strong>' . $tipo . '</strong></p>
                            <p>Aplica ' . $fila["Beca_Sobre"] . '</p>
                        </div>
                      </div>
                      <div class="col-xs-3" align="right">
                        <span class="glyphicon glyphicon-heart gray-box" aria-hidden="true" align="right"></span>
                      </div>
                      <br><br><br><br><br>
                    </div>
                    ';
            }
    }

    function MostrarBecasList($id_usuario) {
        global $pdo;

        $promedio = PromedioUsuario($id_usuario);

        $operacion = "SELECT becas.ID_Beca, becas.ID_Escuela, escuelas.Nombre_Escuela, becas.Nombre_Beca, becas.ID_Tipo , becas.Descripcion_Beca, becas.Beca_Sobre FROM becas JOIN escuelas ON becas.ID_Escuela = escuelas.ID_Escuela WHERE becas.Promedio_Acceso <= ?";

        $sentencia = $pdo->prepare($operacion);
        $sentencia->bindParam(1, $promedio);         
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();

        $filas = $sentencia->rowCount();
          
            foreach ($resultado as $fila )  {

              if($fila["ID_Tipo"] == 1)
                $tipo = "Beca Académica";
              else if($fila["ID_Tipo"] == 2)
                $tipo = "Beca Crédito";
              else if($fila["ID_Tipo"] == 3)
                $tipo = "Beca Especie";

                echo
                    '    
                    <div class="row">
                        <div class="col-md-12 caja-space caja-h-1" style="margin-top:10px">
                            <div class="row">
                              <div class="col-xs-1">
                                <span class="glyphicon glyphicon-heart gray-box" aria-hidden="true" align="right"></span> 
                              </div>
                              <div class="col-xs-3 space-inside">
                                <a href="" data-toggle="modal" data-target="#tecmon' . $fila["ID_Beca"] . '"><span class="blue-box">' . substr($fila["Nombre_Escuela"],0,30) . '</span></a>  
                              </div>
                              <div class="col-xs-4 space-inside">
                                <p class="dark-gray"><b>' . $tipo . '</b></p>
                              </div>
                              <div class="col-xs-4 space-inside">
                                <p class="dark-gray"><b>Aplica ' . $fila["Beca_Sobre"] . '</b></p>
                              </div>
                            </div>
                        </div>
                    </div>
                    ';
            }
    }


    function Counter($id_usuario) {
        global $pdo;

        $operacion = "SELECT COUNT(ID_Beca) AS total FROM becas WHERE Promedio_Acceso <= ?";
        $promedio = PromedioUsuario($id_usuario);

        $sentencia = $pdo->prepare($operacion);
        $sentencia->bindParam(1,$promedio);
        $sentencia->execute();
        $resultado = $sentencia->fetch();

        echo $resultado["total"];
    }


    function CounterAll($id_usuario) {
        global $pdo;

        $operacion = "SELECT COUNT(ID_Beca) AS total FROM becas";
        $promedio = PromedioUsuario($id_usuario);

        $sentencia = $pdo->prepare($operacion);
        $sentencia->bindParam(1,$promedio);
        $sentencia->execute();
        $resultado = $sentencia->fetch();

        echo $resultado["total"];
    }


    function PromedioUsuario($id_usuario) {
        global $pdo;

        $operacion = "SELECT Promedio_Pos, Promedio_Uni, Promedio_Prepa, Promedio_Secundaria FROM usuarios WHERE ID_USUARIO = ?";

        $sentencia = $pdo->prepare($operacion);
        $sentencia->bindParam(1,$id_usuario);
        $sentencia->execute();
        $resultado = $sentencia->fetch();

        $promedio = $resultado["Promedio_Uni"];

        return $promedio;
    }


    function Modals()   {
        global $pdo;

        $operacion = "SELECT becas.ID_Beca, becas.ID_Escuela, escuelas.Nombre_Escuela, escuelas.Nombre_Campus, escuelas.Descripcion_Escuela, becas.Nombre_Beca, becas.Descripcion_Beca FROM becas JOIN escuelas ON becas.ID_Escuela = escuelas.ID_Escuela";

        $sentencia = $pdo->prepare($operacion);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();

        $filas = $sentencia->rowCount();
          
            foreach ($resultado as $fila )  {

                echo 
                '<div id="tecmon' . $fila["ID_Beca"] . '" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                
                              <div class="modal-content">
                                <div class="modal-header" style="border-bottom-width: 0px">
                                  <div align="">
                                      <h4 class="modal-title white"><b>' . $fila["Nombre_Escuela"] . '</b></h4>
                                      <h5 class="modal-title white"><b>Campus ' . $fila["Nombre_Campus"] . '</b></h5>  
                                  </div>
                                  <div align="right">
                                      <i class="glyphicon glyphicon-heart gray-box"></i>
                                      &nbsp;&nbsp;&nbsp;&nbsp;
                                      <i class="glyphicon glyphicon-star gray-box"></i>  
                                  </div>
                                </div>
                                <div class="modal-body" style="padding: 0 0 0 0">
                                  <img class="img-responsive" src="img/modal_img/' . $fila["ID_Escuela"] . '.jpg" alt="image">
                                    
                                  <p align="center">
                                  <br>
                                    <button class="btn btn-info">Requisitos</button>&nbsp;
                                    <button class="btn btn-default">La Institución</button>&nbsp;
                                    <button class="btn btn-danger">Me interesa</button>&nbsp;
                                    <button class="btn btn-default" style="background-color:#e8ba00">Favorito</button>&nbsp;
                                    <br><br>

                                    <div class="col-md-12" style="text-align:center">
                                      <span class="lead">' . $fila["Descripcion_Escuela"] . '</span>
                                    </div>

                                    <br>
                                  </p>
                                  <div class="checkbox">
                                    <label><input type="checkbox" value="">Promedio de: 8.0</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input type="checkbox" value="">Acta de Nacimiento</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input type="checkbox" value="">Puntuación de: 90 del examen de admisión</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input type="checkbox" value="">Puntuación de: 600 del TOEFL</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input type="checkbox" value="">Kardex de Preparatoria</label>
                                  </div>
                                </div>
                                <!-- SIN FOOTER -->
                              </div>
                
                            </div>
                        </div>';
                    }

    }


    function MostrarFavIntereses($id_usuario) {
        global $pdo;

        $operacion = "SELECT becas.ID_Beca, becas.ID_Escuela, escuelas.Nombre_Escuela, becas.Nombre_Beca, becas.ID_Tipo , becas.Descripcion_Beca, becas.Beca_Sobre FROM becas JOIN escuelas ON becas.ID_Escuela = escuelas.ID_Escuela";

        $sentencia = $pdo->prepare($operacion);
        $sentencia->bindParam(1, $promedio);         
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();

        $filas = $sentencia->rowCount();
          
            foreach ($resultado as $fila )  {

              if($fila["ID_Tipo"] == 1)
                $tipo = "Beca Académica";
              if($fila["ID_Tipo"] == 2)
                $tipo = "Beca Crédito";
              if($fila["ID_Tipo"] == 3)
                $tipo = "Beca Especie";

                echo
                    '        
                    <div class="col-md-2 col-md-offset-1 caja">
                      <div class="col-xs-9 space-inside" align="left">
                        <a href="" data-toggle="modal" data-target="#tecmon' . $fila["ID_Beca"] . '"><span class="blue-box">' . substr($fila["Nombre_Escuela"],0,30) . '</span></a>
                        <div class="space-inside-p">
                            <p><strong>' . $tipo . '</strong></p>
                            <p>Aplica ' . $fila["Beca_Sobre"] . '</p>
                        </div>
                      </div>
                      <div class="col-xs-3" align="right">
                        <span class="glyphicon glyphicon-heart gray-box" aria-hidden="true" align="right"></span>
                      </div>
                      <br><br><br><br><br>
                    </div>
                    ';
            }
    }
?>
