<?php
    require_once dirname(__FILE__) . '/../datos/ConexionBD.php';
    require_once dirname(__FILE__) . '/../becas/Beca.php';
  $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
  $pdo2 = ConexionBD::obtenerInstancia()->obtenerBD();
  session_start();

    function MostrarBecas($id_usuario) {
        global $pdo;
        $b = new Beca();

        $promedio = PromedioUsuario($id_usuario);
        
        $operacion = "SELECT becas.ID_Beca, becas.ID_Escuela, escuelas.Nombre_Escuela, becas.Nombre_Beca, becas.ID_Tipo , becas.Descripcion_Beca, becas.Beca_Sobre FROM becas JOIN escuelas ON becas.ID_Escuela = escuelas.ID_Escuela WHERE becas.Promedio_Acceso <= ?";

        $sentencia = $pdo->prepare($operacion);
        $sentencia->bindParam(1, $promedio);         
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();

        $filas = $sentencia->rowCount();
          
            foreach ($resultado as $fila )  {
                $color = ($b->isMeInteresa($_SESSION['id_usuario'], $fila["ID_Beca"])) ? 'red' : 'gray-box';

              if($fila["ID_Tipo"] == 1)
                $tipo = "Beca Académica";
              if($fila["ID_Tipo"] == 2)
                $tipo = "Beca Crédito";
              if($fila["ID_Tipo"] == 3)
                $tipo = "Beca Especie";

                echo
                    '        
                    <div class="col-md-2 col-md-offset-1 caja beca tipo-' . $fila["ID_Tipo"] . '">
                      <div class="col-xs-9 space-inside" align="left">
                        <a href="" data-toggle="modal" data-target="#tecmon' . $fila["ID_Beca"] . '"><span class="blue-box">' . substr($fila["Nombre_Escuela"],0,30) . '</span></a>
                        <div class="space-inside-p">
                            <p><strong>' . $tipo . '</strong></p>
                            <p>Aplica ' . $fila["Beca_Sobre"] . '</p>
                        </div>
                      </div>
                      <div class="col-xs-3" align="right">
                        <span class="glyphicon glyphicon-heart ' . $color . '" aria-hidden="true" align="right" id="heart-' . $fila["ID_Beca"] . '"></span>
                      </div>
                    </div>
                    ';
            }
    }

    function MostrarBecasList($id_usuario) {
        global $pdo;
        $b = new Beca();

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

              $color = ($b->isMeInteresa($_SESSION['id_usuario'], $fila["ID_Beca"])) ? 'red' : 'gray-box';

                echo
                    '    
                    <div class="row">
                        <div class="col-md-12 caja-space caja-h-1 beca tipo-' . $fila["ID_Tipo"] . '" style="margin-top:10px">
                            <div class="row">
                              <div class="col-xs-1">
                                <span class="glyphicon glyphicon-heart ' . $color . '" aria-hidden="true" align="right" id="heart-' . $fila["ID_Beca"] . '></span> 
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

        $operacion = "SELECT becas.*, escuelas.Nombre_Escuela, escuelas.Nombre_Campus, escuelas.Descripcion_Escuela, becas.Nombre_Beca, becas.Descripcion_Beca FROM becas JOIN escuelas ON becas.ID_Escuela = escuelas.ID_Escuela";

        $sentencia = $pdo->prepare($operacion);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        $sentencia->rowCount();

        modalBeca($resultado, true);
    }


    function MostrarFavIntereses($id_usuario) {
        global $pdo;

        $operacion = "SELECT *, '1' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_favorito ON tabla.ID_Beca = beca_favorito.id_beca WHERE beca_favorito.id_usuario = ? UNION SELECT *, '2' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_interesa ON tabla.ID_Beca = beca_interesa.id_beca WHERE beca_interesa.id_usuario = ?";

        $sentencia = $pdo->prepare($operacion);
        $sentencia->bindParam(1, $id_usuario);  
        $sentencia->bindParam(2, $id_usuario);       
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


              if($fila["tipo"] == 1)
                $icono = '<span class="glyphicon glyphicon-heart red" aria-hidden="true" align="right"></span>';
              else
                $icono = '<span class="glyphicon glyphicon-star yellow" aria-hidden="true" align="right"></span>';

                echo
                    '        
                    <div class="col-md-2 col-md-offset-1 caja" style="margin-bottom: 10px">

                      <div class="col-xs-9 space-inside" align="left">
                        
                        <a href="" data-toggle="modal" data-target="#tecmon' . $fila["ID_Beca"] . '"><span class="blue-box">' . substr($fila["Nombre_Escuela"],0,30) . '</span></a>

                        <div class="space-inside-p">
                            <p><strong>' . $tipo . '</strong></p>
                            <p>Aplica ' . $fila["Beca_Sobre"] . '</p>
                        </div>

                      </div>
                      
                      <div class="col-xs-3" align="right">'
                        . $icono .
                      '</div>

                    </div>

                    ';
            }
    }

    /**
     * Valida que el usuario tenga al menos una escuela y su promedio correspondiente
     *
     * @param $user
     * @return bool
     */
    function validateSchools($user) {
        if ( (empty($user['Nombre_Universidad']) || $user['Nombre_Universidad'] == "")
            && (empty($user['Nombre_Posgrado']) || $user['Nombre_Posgrado'] == "")
            && (empty($user['Nombre_Prepa']) || $user['Nombre_Prepa'] == "")
            && (empty($user['Nombre_Secundaria']) || $user['Nombre_Secundaria'] == "")
        ) {
            return false;
        } else {
            if (!empty($user['Nombre_Universidad']) || $user['Nombre_Universidad'] != "") {
                if (empty($user['Promedio_Uni']) || $user['Promedio_Uni'] == "") {
                    return false;
                } else {
                    return true;
                }
            } elseif (!empty($user['Nombre_Posgrado']) || $user['Nombre_Posgrado'] != "") {
                if (empty($user['Promedio_Pos']) || $user['Promedio_Pos'] == "") {
                    return false;
                } else {
                    return true;
                }
            } elseif (!empty($user['Nombre_Prepa']) || $user['Nombre_Prepa'] != "") {
                if (empty($user['Promedio_Prepa']) || $user['Promedio_Prepa'] == "") {
                    return false;
                } else {
                    return true;
                }
            } elseif (!empty($user['Nombre_Secundaria']) || $user['Nombre_Secundaria'] != "") {
                if (empty($user['Promedio_Secundaria']) || $user['Promedio_Secundaria'] == "") {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }
    }

    /**
     * Valida que el usuario tenga su perfil completo
     *
     * @param $email
     * @return bool
     */
    function validateProfile($email) {
        $conn = ConexionBD::obtenerInstancia()->obtenerBD();
        $query = "SELECT * FROM becap_db.usuarios WHERE Mail_Usuario = :mail";
        $stm = $conn->prepare($query);
        $stm->bindParam(':mail', $email, PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetchAll()[0];

        if (!empty($result['Apellidos_Usuario']) && !empty($result['Fecha_Nacimiento'])
            && !empty($result['Pais']) && !empty($result['Ciudad'])
            && !empty($result['Estudia']) ) {
            if (validateSchools($result)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Valida que el usuario tenga su información completa
     *
     * @param $email
     * @return bool
     */
    function validateInformation($email) {
        $conn = ConexionBD::obtenerInstancia()->obtenerBD();
        $query = "SELECT Telefono_contacto, tipo_beca FROM becap_db.usuarios WHERE Mail_Usuario = :mail";
        $stm = $conn->prepare($query);
        $stm->bindParam(':mail', $email, PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetchAll()[0];

        if (!empty($result['Telefono_contacto']) && is_numeric($result['tipo_beca'])) {
            return true;
        } else {
            return false;
        }
    }

    function ModalsFavIntereses()   {
        global $pdo;

        $operacion = "SELECT *, '1' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela, escuelas.Nombre_Campus, escuelas.Descripcion_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_favorito ON tabla.ID_Beca = beca_favorito.id_beca UNION SELECT *, '2' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela, escuelas.Nombre_Campus, escuelas.Descripcion_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_interesa ON tabla.ID_Beca = beca_interesa.id_beca";

        $sentencia = $pdo->prepare($operacion);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        $sentencia->rowCount();
        modalBeca($resultado);
    }

    function modalBeca($becas, $oportunidades = false) {
        $b = new Beca();
        foreach ($becas as $beca) {
            $color = ($b->isMeInteresa($_SESSION['id_usuario'], $beca["ID_Beca"])) ? 'red' : 'gray-box';
            $colorS = ($b->isFavorite($_SESSION['id_usuario'], $beca["ID_Beca"])) ? 'yellow' : 'gray-box';

            $iconoH = '<i class="glyphicon glyphicon-heart ' . $color . '" id="heart-m-' . $beca['ID_Beca'] . '"></i>';
            $iconoS = '<i class="glyphicon glyphicon-star ' . $colorS . '" id="start-m-' . $beca['ID_Beca'] . '"></i>';

            ?>
            <div id="tecmon<?php echo $beca["ID_Beca"]; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="border-bottom-width: 0px">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div align="">
                                        <h4 class="modal-title white"><b><?php echo $beca["Nombre_Escuela"]; ?></b></h4>
                                        <h5 class="modal-title white"><b>Campus <?php echo $beca["Nombre_Campus"]; ?></b></h5>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div align="right">
                                        <?php echo $iconoH; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php echo $iconoS; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body" style="padding: 0 0 0 0">
                            <img class="img-responsive" src="img/modal_img/<?php echo $beca["ID_Escuela"]; ?>.jpg" alt="image">
                            <div class="row">
                                <div class="col-xs-12" align="center">
                                    <br>
                                    <div class="col-xs-<?php echo ($oportunidades) ? 3 : 6 ;?>">
                                        <a class="btn btn-info btn-block" data-toggle="tab" href="#req-<?php echo $beca["ID_Beca"]; ?>">Requisitos</a>&nbsp;
                                    </div>
                                    <div class="col-xs-<?php echo ($oportunidades) ? 3 : 6 ;?>">
                                        <button class="btn btn-default btn-block" data-toggle="tab" href="#institucion-<?php echo $beca["ID_Beca"]; ?>">La Institución</button>&nbsp;
                                    </div>
                                    <?php if ($oportunidades) { ?>
                                        <div class="col-xs-3">
                                            <button class="btn btn-danger btn-block" onclick="addToMeInteresa(<?php echo $_SESSION['id_usuario'] . ", " . $beca["ID_Beca"]; ?>);">Me interesa</button>&nbsp;
                                        </div>
                                        <div class="col-xs-3">
                                            <button class="btn btn-default btn-block" onclick="addToFavorite(<?php echo $_SESSION['id_usuario'] . ", " . $beca["ID_Beca"]; ?>);" style="background-color:#e8ba00">Favorito</button>&nbsp;
                                        </div>
                                    <?php } ?>
                                    <br>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="tab-content">
                                        <div id="req-<?php echo $beca["ID_Beca"]; ?>" class="tab-pane fade in active">
                                            <h3>Requisitos</h3>
                                            <div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">&nbsp;&nbsp; ¿Requiere promedio? <?php echo ($beca['Requiere_Promedio'] == 1) ?  " Si " . "Promedio de: " . $beca['Promedio_Acceso']:  "No"; ?></label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">&nbsp;&nbsp; Mantener promedio de: <?php echo $beca['Promedio_Mantener']; ?></label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">&nbsp;&nbsp; ¿Requiere Estudio socioeconómico? <?php echo ($beca['Estudio_Socioeco'] == 1) ?  "Si" :  "No"; ?></label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">&nbsp;&nbsp; ¿Requiere examen de admisión? <?php echo ($beca['Requiere_Examen'] == 1) ?  " Si " . $beca['Examen_Admision'] . " puntaje " . $beca['Puntaje']:  "No"; ?></label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">&nbsp;&nbsp; ¿Requiere idiomas? <?php echo ($beca['Requiere_Idiomas'] == 1) ?  " Si " . $beca['Examen_Idiomas'] . " puntaje " . $beca['Puntuaje_Idiomas']:  "No"; ?></label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">&nbsp;&nbsp; Comprobar ingresos <?php echo $beca['Ingresos_Comprobar']; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="institucion-<?php echo $beca["ID_Beca"]; ?>" class="tab-pane fade">
                                            <h3>La institución</h3>
                                            <p><?php echo $beca["Descripcion_Escuela"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
?>
