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

    $operacion = "SELECT becas.ID_Beca, becas.ID_Escuela, escuelas.Nombre_Escuela, becas.Nombre_Beca, becas.ID_Tipo , becas.Descripcion_Beca, becas.Beca_Sobre, becas.Porcentaje_Beca FROM becas JOIN escuelas ON becas.ID_Escuela = escuelas.ID_Escuela WHERE becas.Promedio_Acceso <= ?";

    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $promedio);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();

    foreach ($resultado as $fila) {
        $is_fav = $b->isFavorite($_SESSION['id_usuario'], $fila["ID_Beca"]);
        $is_meInteresa = $b->isMeInteresa($_SESSION['id_usuario'], $fila["ID_Beca"]);

        if ($is_fav) {
            $icono = '<span style="cursor: pointer;" class="glyphicon glyphicon-star yellow" onclick="miBeca(' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        } elseif ($is_meInteresa) {
            $icono = '<span style="cursor: pointer;" class="glyphicon glyphicon-heart red" onclick="miBeca(' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        } else {
            $icono = '<span style="cursor: pointer;" class="glyphicon glyphicon-heart gray-box" onclick="miBeca(' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        }

        if ($fila["ID_Tipo"] == 1) {
            $tipo = "Beca Académica";

            if ($fila["Porcentaje_Beca"] == "NA") {
                $muestra = "Beca";
                $porcentaje = "";
            } else {
                $muestra = " de Beca";
                $porcentaje = $fila["Porcentaje_Beca"];
            }

        }
        if ($fila["ID_Tipo"] == 2) {
            $tipo = "Beca Crédito";

            if ($fila["Porcentaje_Beca"] == "NA") {
                $muestra = "Crédito";
                $porcentaje = "";
            } else {
                $muestra = " de Crédito";
                $porcentaje = $fila["Porcentaje_Beca"];
            }

        }
        if ($fila["ID_Tipo"] == 3)
            $tipo = "Beca Especie";

        echo '
            <div class="col-md-2 col-md-offset-1 caja beca tipo-' . $fila["ID_Tipo"] . '">
                 <div class="col-xs-9 space-inside" align="left">
                    <a href="" data-toggle="modal" data-target="#tecmon' . $fila["ID_Beca"] . '"><span class="blue-box"><b>' . substr($fila["Nombre_Escuela"], 0, 30) . '</b></span></a>
                        <div class="space-inside-p"><br>
                            <p><strong>' . $tipo . '</strong></p>
                            <p><strong>' . $porcentaje . $muestra . " " . $fila["Beca_Sobre"] . '</strong></p>
                        </div>
                 </div>
                 <div class="col-xs-3" align="right">
                    ' . $icono . '
                </div>
            </div>';
    }
}

function MostrarBecasList($id_usuario)
{
    global $pdo;
    $b = new Beca();

    $promedio = PromedioUsuario($id_usuario);

    $operacion = "SELECT becas.ID_Beca, becas.ID_Escuela, escuelas.Nombre_Escuela, becas.Nombre_Beca, becas.ID_Tipo , becas.Descripcion_Beca, becas.Beca_Sobre, becas.Porcentaje_Beca FROM becas JOIN escuelas ON becas.ID_Escuela = escuelas.ID_Escuela WHERE becas.Promedio_Acceso <= ?";

    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $promedio);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();

    foreach ($resultado as $fila) {

        if ($fila["ID_Tipo"] == 1) {
            $tipo = "Beca Académica";

            if ($fila["Porcentaje_Beca"] == "NA") {
                $muestra = "Beca";
                $porcentaje = "";
            } else {
                $muestra = " de Beca";
                $porcentaje = $fila["Porcentaje_Beca"];
            }

        } else if ($fila["ID_Tipo"] == 2) {
            $tipo = "Beca Crédito";

            if ($fila["Porcentaje_Beca"] == "NA") {
                $muestra = "Crédito";
                $porcentaje = "";
            } else {
                $muestra = " de Crédito";
                $porcentaje = $fila["Porcentaje_Beca"];
            }

        } else if ($fila["ID_Tipo"] == 3)
            $tipo = "Beca Especie";

        $is_fav = $b->isFavorite($_SESSION['id_usuario'], $fila["ID_Beca"]);
        $is_meInteresa = $b->isMeInteresa($_SESSION['id_usuario'], $fila["ID_Beca"]);

        if ($is_fav) {
            $icono = '<span style="cursor: pointer;" class="glyphicon glyphicon-star yellow" onclick="miBeca(' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        } elseif ($is_meInteresa) {
            $icono = '<span style="cursor: pointer;" class="glyphicon glyphicon-heart red" onclick="miBeca(' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        } else {
            $icono = '<span style="cursor: pointer;" class="glyphicon glyphicon-heart gray-box" onclick="miBeca(' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        }

        echo
            '    
                    <div class="row">

                        <div class="col-xs-12 caja-space caja-h-1 beca tipo-' . $fila["ID_Tipo"] . '" style="margin-top:10px">
                            
                            <div class="row">
                             
                              <div class="col-xs-1">
                                    ' . $icono . '
                              </div>
                             
                             <div class="col-xs-5 space-inside">
                                <a href="" data-toggle="modal" class="blue-box" data-target="#tecmon' . $fila["ID_Beca"] . '"><span class="blue-box">' . substr($fila["Nombre_Escuela"], 0, 30) . '</span></a> 
                             </div>
                             
                              <div class="col-xs-3 space-inside">
                                <p class="dark-gray" style="font-size: 12.5px;"><b>' . $fila["Nombre_Beca"] . '</b></p>
                              </div>
                             
                              <div class="col-xs-3 space-inside">
                                <p class="dark-gray" style="font-size: 12.5px;"><b>' . $porcentaje . $muestra . " " . $fila["Beca_Sobre"] . '</b></p>
                              </div>

                            </div>

                        </div>

                    </div>
                    ';
    }
}


function Counter($id_usuario)
{
    global $pdo;

    $operacion = "SELECT COUNT(ID_Beca) AS total FROM becas WHERE Promedio_Acceso <= ?";
    $promedio = PromedioUsuario($id_usuario);

    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $promedio);
    $sentencia->execute();
    $resultado = $sentencia->fetch();

    echo $resultado["total"];
}

function CounterAll($id_usuario)
{
    global $pdo;

    $operacion = "SELECT COUNT(ID_Beca) AS total FROM becas";
    $promedio = PromedioUsuario($id_usuario);

    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $promedio);
    $sentencia->execute();
    $resultado = $sentencia->fetch();

    echo $resultado["total"];
}

function PromedioUsuario($id_usuario)
{
    global $pdo;

    $operacion = "SELECT Promedio_Pos, Promedio_Uni, Promedio_Prepa, Promedio_Secundaria FROM usuarios WHERE ID_USUARIO = ?";

    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $id_usuario);
    $sentencia->execute();
    $resultado = $sentencia->fetch();

    $p_pos = $resultado["Promedio_Pos"];
    $p_uni = $resultado["Promedio_Uni"];
    $p_pre = $resultado["Promedio_Prepa"];
    $p_sec = $resultado["Promedio_Secundaria"];

    if ($p_pos > 0)
        $promedio = $p_pos;
    elseif ($p_uni > 0)
        $promedio = $p_uni;
    elseif ($p_pre > 0)
        $promedio = $p_pre;
    elseif ($p_sec > 0)
        $promedio = $p_sec;
    else
        $promedio = 0;


    return $promedio;
}

function Modals()
{
    global $pdo;

    $operacion = "SELECT becas.*, escuelas.Nombre_Escuela, escuelas.Nombre_Campus, escuelas.Descripcion_Escuela, becas.Nombre_Beca, becas.Descripcion_Beca FROM becas JOIN escuelas ON becas.ID_Escuela = escuelas.ID_Escuela";

    $sentencia = $pdo->prepare($operacion);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    $sentencia->rowCount();

    modalBeca($resultado, true);
}

function MostrarFavIntereses($id_usuario)
{
    global $pdo;
    $b = new Beca();

    $operacion = "SELECT *, '1' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_favorito ON tabla.ID_Beca = beca_favorito.id_beca WHERE beca_favorito.id_usuario = ? UNION SELECT *, '2' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_interesa ON tabla.ID_Beca = beca_interesa.id_beca WHERE beca_interesa.id_usuario = ?";

    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $id_usuario);
    $sentencia->bindParam(2, $id_usuario);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->rowCount();

    // Remueve los duplicados
    $resultado = unique_multidim_array($resultado, "ID_Beca");

    foreach ($resultado as $fila) {

        if ($fila["ID_Tipo"] == 1)
            $tipo = "Beca Académica";
        if ($fila["ID_Tipo"] == 2)
            $tipo = "Beca Crédito";
        if ($fila["ID_Tipo"] == 3)
            $tipo = "Beca Especie";

        $is_fav = $b->isFavorite($_SESSION['id_usuario'], $fila["ID_Beca"]);

        if ($is_fav) {
            $icono = '<span style="cursor: pointer;" class="glyphicon glyphicon-star yellow" onclick="miBeca(' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        } else {
            $icono = '<span style="cursor: pointer;" class="glyphicon glyphicon-star yellow" onclick="miBeca(' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        }

        echo
            '        
                    <div class="col-md-2 col-md-offset-1 caja" style="margin-bottom: 23.5px">
                      
                          <div class="col-xs-9 space-inside" align="left">
                            
                            <div class="row" style="margin-left: 0px; margin-right: 0px; padding-bottom: 15px;"> 
                              <a href="#" data-toggle="modal" data-target="#tecmon' . $fila["ID_Beca"] . '"><span class="blue-box">' . substr($fila["Nombre_Escuela"], 0, 30) . '</span></a>
                            </div>

                            <div class="row space-inside-p" style="margin-left: 0px; margin-right: 0px;">
                                <br>
                                <p><strong>' . $tipo . '</strong></p>
                                <p>Aplica ' . $fila["Beca_Sobre"] . '</p>
                            </div>

                          </div>
                      
                      

                          <div class="col-xs-3" align="right">
                            <div class="row" style="margin-left: 0px; margin-right: 0px;">
                              ' . $icono . '
                            </div>
                            
                            <div class="row" style="margin-left: 0px; margin-right: 0px; margin-top: 105px;">
                              
                              <span style="color: #25acd9; font-weight: bold; font-size: 13px;">80%</span>
                            </div>
                            
                          </div>

                    </div>
                    ';
    }
}

function unique_multidim_array($array, $key)
{
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach ($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}

/**
 * Valida que el usuario tenga al menos una escuela y su promedio correspondiente
 *
 * @param $user
 * @return bool
 */
function validateSchools($user)
{
    if ((empty($user['Nombre_Universidad']) || $user['Nombre_Universidad'] == "")
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
function validateProfile($email)
{
    $conn = ConexionBD::obtenerInstancia()->obtenerBD();
    $query = "SELECT * FROM becap_db.usuarios WHERE Mail_Usuario = :mail";
    $stm = $conn->prepare($query);
    $stm->bindParam(':mail', $email, PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchAll()[0];

    if (!empty($result['Apellidos_Usuario']) && !empty($result['Fecha_Nacimiento'])
        && !empty($result['Pais']) && !empty($result['Ciudad'])
        && !empty($result['Estudia'])
    ) {
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
function validateInformation($email)
{
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

function ModalsFavIntereses()
{
    global $pdo;

    $operacion = "SELECT *, '1' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela, escuelas.Nombre_Campus, escuelas.Descripcion_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_favorito ON tabla.ID_Beca = beca_favorito.id_beca UNION SELECT *, '2' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela, escuelas.Nombre_Campus, escuelas.Descripcion_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_interesa ON tabla.ID_Beca = beca_interesa.id_beca";

    $sentencia = $pdo->prepare($operacion);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    $sentencia->rowCount();
    modalBeca($resultado);
}

/**
 * Muestra el modal con el detalle de una beca, si es la pantalla de oportunidadaes
 * también muestra los botones de favoritos y me interesa
 *
 * @param $becas
 * @param bool $oportunidades
 */
function modalBeca($becas, $oportunidades = false)
{
    $b = new Beca();
    foreach ($becas as $beca) {
        $is_fav = $b->isFavorite($_SESSION['id_usuario'], $beca["ID_Beca"]);
        $meInteresa = $b->isMeInteresa($_SESSION['id_usuario'], $beca["ID_Beca"]);
        if ($is_fav && $meInteresa) {
            $icono = '
                    <span style="cursor: pointer;" class="glyphicon glyphicon-heart red" onclick="miBeca(' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                    <span style="cursor: pointer;" class="glyphicon glyphicon-star yellow" onclick="miBeca(' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                    ';
        } elseif ($meInteresa && !$is_fav) {
            $icono = '
                    <span style="cursor: pointer;" class="glyphicon glyphicon-heart red" onclick="miBeca(' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                    <span style="cursor: pointer;" class="glyphicon glyphicon-star gray-box" onclick="miBeca(' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                ';
        } elseif ($is_fav && !$meInteresa) {
            $icono = '
                    <span style="cursor: pointer;" class="glyphicon glyphicon-heart gray-box" onclick="miBeca(' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                    <span style="cursor: pointer;" class="glyphicon glyphicon-star yellow" onclick="miBeca(' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                ';
        } else {
            $icono = '
                    <span style="cursor: pointer;" class="glyphicon glyphicon-heart gray-box" onclick="miBeca(' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                    <span style="cursor: pointer;" class="glyphicon glyphicon-star gray-box" onclick="miBeca(' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                ';
        }
        ?>
        <div id="tecmon<?php echo $beca["ID_Beca"]; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom-width: 0px">
                        <div class="row">
                            <div class="col-xs-8">
                                <div align="left">
                                    <h4 class="modal-title blue"><b><?php echo $beca["Nombre_Escuela"]; ?></b></h4>
                                    <h5 class="modal-title blue"><b>Campus <?php echo $beca["Nombre_Campus"]; ?></b>
                                    </h5>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div align="right" style="margin-top: 5px;">
                                    <?php echo $icono; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body" style="padding: 0 0 0 0">
                        <img class="img-responsive" src="img/modal_img/<?php echo $beca["ID_Escuela"]; ?>.jpg"
                             alt="image">
                        <div class="row">
                            <div class="col-xs-12" align="center" id="msg-<?php echo $beca["ID_Beca"]; ?>"></div>
                            <div class="col-xs-12" align="center">
                                <br>
                                <div class="col-xs-<?php echo ($oportunidades) ? 4 : 6; ?>">
                                    <a class="btn btn-req btn-block" data-toggle="tab"
                                       href="#req-<?php echo $beca["ID_Beca"]; ?>"><b>Requisitos</b></a>&nbsp;
                                </div>
                                <div class="col-xs-<?php echo ($oportunidades) ? 4 : 6; ?>">
                                    <button class="btn btn-normal btn-block" data-toggle="tab"
                                            href="#institucion-<?php echo $beca["ID_Beca"]; ?>"><b>La Institución</b>
                                    </button>&nbsp;
                                </div>


                                <?php if ($oportunidades) { ?>

                                    <!-- CONTACTO -->
                                    <div class="col-xs-4">
                                        <button class="btn btn-normal btn-block" data-toggle="tab"
                                                href="#contacto-<?php echo $beca["ID_Beca"]; ?>"><b>Contacto</b>
                                        </button>
                                    </div>

                                    <!--
                                        <div class="col-xs-3">
                                            <button class="btn btn-danger btn-block" onclick="
                                                    <?php if ($meInteresa) { ?>
                                                            miBeca(<?php echo $beca["ID_Beca"]; ?>);
                                                    <?php } else { ?>
                                                            addToMeInteresa(<?php echo $_SESSION['id_usuario'] . ", " . $beca["ID_Beca"]; ?>);
                                                    <?php } ?>
                                                    " id="btn-interesa-<?php echo $beca["ID_Beca"]; ?>"><b>Me interesa!</b></button>&nbsp;
                                        </div>
-->
                                    <!--
                                        <div class="col-xs-3">
                                            <button class="btn btn-default btn-block" onclick="
                                                    
                                                    <?php if ($is_fav) { ?>
                                                            removeFavorite(<?php echo $_SESSION['id_usuario'] . ", " . $beca["ID_Beca"]; ?>);
                                                    <?php } else { ?>
                                                            addToFavorite(<?php echo $_SESSION['id_usuario'] . ", " . $beca["ID_Beca"]; ?>);
                                                    <?php } ?>
                                                    " style="background-color:#e8ba00" id="btn-favorito-<?php echo $beca["ID_Beca"]; ?>">Favorito</button>&nbsp;
                                        </div>
                                        -->

                                <?php } ?>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="tab-content">
                                    <div id="req-<?php echo $beca["ID_Beca"]; ?>" class="tab-pane fade in active">
                                        <p style="color: #545454;"><b>Descripción</b></p>
                                        <div>
                                            <?php echo $beca["Descripcion_Beca"]; ?>
                                        </div>
                                        <p style="margin-top: 30px; color: #545454;"><b>Resumen de Requisitos</b></p>
                                        <div>
                                            <div class="checkbox">
                                                <label style="color: #545454;"><input type="checkbox"><b>&nbsp;&nbsp;
                                                        ¿Requiere
                                                        promedio? <?php echo ($beca['Requiere_Promedio'] == 1) ? " Si " . "Promedio de: " . $beca['Promedio_Acceso'] : "No"; ?></b></label>
                                            </div>
                                            <div class="checkbox">
                                                <label style="color: #545454;"><input type="checkbox"><b>&nbsp;&nbsp;
                                                        Mantener promedio
                                                        de: <?php echo $beca['Promedio_Mantener']; ?></b></label>
                                            </div>
                                            <div class="checkbox">
                                                <label style="color: #545454;"><input type="checkbox"><b>&nbsp;&nbsp;
                                                        ¿Requiere Estudio
                                                        socioeconómico? <?php echo ($beca['Estudio_Socioeco'] == 1) ? "Si" : "No"; ?></b></label>
                                            </div>
                                            <div class="checkbox">
                                                <label style="color: #545454;"><input type="checkbox"><b>&nbsp;&nbsp;
                                                        ¿Requiere examen de
                                                        admisión? <?php echo ($beca['Requiere_Examen'] == 1) ? " Si " . $beca['Examen_Admision'] . " puntaje " . $beca['Puntaje'] : "No"; ?></b></label>
                                            </div>
                                            <div class="checkbox">
                                                <label style="color: #545454;"><input type="checkbox"><b>&nbsp;&nbsp;
                                                        ¿Requiere
                                                        idiomas? <?php echo ($beca['Requiere_Idiomas'] == 1) ? " Si " . $beca['Examen_Idiomas'] . " puntaje " . $beca['Puntuaje_Idiomas'] : "No"; ?></b></label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox"><b>&nbsp;&nbsp; Comprobar
                                                        ingresos <?php echo $beca['Ingresos_Comprobar']; ?></b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="institucion-<?php echo $beca["ID_Beca"]; ?>" class="tab-pane fade">
                                        <p style="color: #545454; color: #545454;"><b>La institución</b></p>
                                        <p><?php echo $beca["Descripcion_Escuela"]; ?></p>
                                    </div>
                                    <div id="contacto-<?php echo $beca["ID_Beca"]; ?>" class="tab-pane fade">
                                        <p style="color: #545454; color: #545454;"><b>Contacto</b></p>
                                        <div>
                                            <div>
                                                <p>
                                                    Correo electrónico: <?php echo $beca['Contacto']; ?>
                                                </p>
                                            </div>
                                            <div class="checkbox">
                                                <p>
                                                    Teléfono: <?php echo $beca['Telefono']; ?>
                                                </p>
                                            </div>
                                            <div class="checkbox">
                                                <p>
                                                    <?php
                                                    $link = substr($beca['Link_Beca'], 0, 60);
                                                    if (strlen($beca['Link_Beca']) > 60) {
                                                        $link .= "...";
                                                    }
                                                    ?>
                                                    Sitio web: <a target="_blank"
                                                                  href="<?php echo $beca['Link_Beca']; ?>"><?php echo $link; ?></a>
                                                </p>
                                            </div>
                                        </div>
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
