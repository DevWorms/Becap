<?php
error_reporting(0);
require_once dirname(__FILE__) . '/../datos/ConexionBD.php';
require_once dirname(__FILE__) . '/../becas/Beca.php';


$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
$pdo2 = ConexionBD::obtenerInstancia()->obtenerBD();

session_start();

function getTipoBeca($id_usuario){
    $conn = ConexionBD::obtenerInstancia()->obtenerBD(); 
    // seteamos el valor del tipo de beca elegido (tipo de beca que buscas)
    $query = "SELECT tipo_beca FROM becap_db.usuarios WHERE ID_Usuario = :id_usuario";
    $stm = $conn->prepare($query);
    $stm->bindParam(":id_usuario", $id_usuario);
    $stm->execute();
    $rs = $stm->fetchAll();
    return $rs[0]["tipo_beca"];   
}

function getNivelLetra($nivelElegido){
    if($nivelElegido == 1){
        $strNivel = "Secundaria";
    }else if($nivelElegido == 2){
        $strNivel = "Preparatoria";
    }else if($nivelElegido == 3){
        $strNivel = "Profesional";
    }else if($nivelElegido == 4){
        $strNivel = "Posgrado";
    }


    return $strNivel;
}

function getClassTipoBeca($tipo){
    $clase = "beca-";
    switch ($tipo) {
            case 1:
                $clase .= "academica";
                break;
            case 2:
                $clase .= "credito";
                break;
            case 3:
                $clase .= "especie";
                break;
            default:
                $clase = "";
                break;
    }
    return $clase;    
}

function MostrarBecas($id_usuario) {
    global $pdo;
    $b = new Beca();

    $promedio = PromedioUsuario($id_usuario);
    $promedio = $promedio + 1;
    $miTipobeca = 0;
    $miTipobeca = getTipoBeca($_SESSION["id_usuario"]);
    $nivel = getNivelLetra($miTipobeca);

    $operacion = "SELECT becas.ID_Beca, becas.ID_Escuela, escuelas.Nombre_Escuela, becas.Nombre_Beca, becas.ID_Tipo , becas.Descripcion_Beca, becas.Beca_Sobre, becas.Porcentaje_Beca FROM becas JOIN escuelas ON becas.ID_Escuela = escuelas.ID_Escuela WHERE becas.Promedio_Acceso < ? AND Nivel_Estudio = ? ";


    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $promedio,PDO::PARAM_INT);
    $sentencia->bindParam(2,$nivel);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    $funcionesJS = "";
    foreach ($resultado as $fila) {
        if ($fila["ID_Tipo"] == 1) {
            if ($fila["Porcentaje_Beca"] == "NA") {
                $muestra = "Beca";
                $porcentaje = "";
            } else {
                $muestra = " de Beca";
                $porcentaje = $fila["Porcentaje_Beca"];
            }

        } else if ($fila["ID_Tipo"] == 2) {

            if ($fila["Porcentaje_Beca"] == "NA") {
                $muestra = "Crédito";
                $porcentaje = "";
            } else {
                $muestra = " de Crédito";
                $porcentaje = $fila["Porcentaje_Beca"];
            }
        }

        $is_fav = $b->isFavorite($_SESSION['id_usuario'], $fila["ID_Beca"]);
        $is_meInteresa = $b->isMeInteresa($_SESSION['id_usuario'], $fila["ID_Beca"]);

        if ($is_fav) {
            $icono = '<span id="icono-' . $fila["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-star yellow" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        } elseif ($is_meInteresa) {
            $icono = '<span id="icono-' . $fila["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-heart red" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        } else {
            $icono = '<span id="icono-' . $fila["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-heart gray-box" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        }


        echo '
        <div class="col-md-2 col-md-offset-1 caja beca '.getClassTipoBeca($fila["ID_Tipo"]).'">
            <div class="row" style="margin-left: 0px; margin-right: 0px;">
              <div class="col-xs-9 space-inside" align="left">
                  <a href="#" data-toggle="modal" data-target="#tecmon' . $fila["ID_Beca"] . '"><span class="blue-box"><b>' . substr($fila["Nombre_Escuela"], 0, 30) . '</b></span></a>
                  
              </div>
              <div class="col-xs-3" align="right">
                    ' . $icono . '
              </div>
            </div>

            <div class="row" style="margin-left: 0px; margin-right: 0px;">
              <div class="col-xs-12">
                <div style="margin-top: 28px;"><br>
                    <p><strong>' . $fila["Nombre_Beca"] . '</strong></p>
                    <p><strong>' . $porcentaje . $muestra . " " . $fila["Beca_Sobre"] . '</strong></p>
                </div>
              </div>
            </div>
        </div>';

       
        // ponemos los requisitos guardados previamente
        $reqGen = getReq($fila["ID_Beca"],$_SESSION['id_usuario']);
        $doContact = $reqGen["do_contacto"];
        if($doContact == 1){
            $funcionesJS .= " allReadyContact(" . $fila["ID_Beca"]. "); ";
        }
  
    }

    echo "<script type='text/javascript'>$(document).ready(function(){".$funcionesJS."});</script>";
}

function MostrarBecasList($id_usuario){
    global $pdo;
    $b = new Beca();

    $promedio = PromedioUsuario($id_usuario);
    $promedio = $promedio + 1;
    $miTipobeca = 0;
    $miTipobeca = getTipoBeca($_SESSION["id_usuario"]);
    
    $nivel = getNivelLetra($miTipobeca);

    $operacion = "SELECT becas.ID_Beca, becas.ID_Escuela, escuelas.Nombre_Escuela, becas.Nombre_Beca, becas.ID_Tipo , becas.Descripcion_Beca, becas.Beca_Sobre, becas.Porcentaje_Beca FROM becas JOIN escuelas ON becas.ID_Escuela = escuelas.ID_Escuela WHERE becas.Promedio_Acceso < ? AND Nivel_Estudio = ? ";
    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $promedio,PDO::PARAM_INT);
    $sentencia->bindParam(2,$nivel);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();

    foreach ($resultado as $fila) {

        if ($fila["ID_Tipo"] == 1) {
            if ($fila["Porcentaje_Beca"] == "NA") {
                $muestra = "Beca";
                $porcentaje = "";
            } else {
                $muestra = " de Beca";
                $porcentaje = $fila["Porcentaje_Beca"];
            }

        } else if ($fila["ID_Tipo"] == 2) {

            if ($fila["Porcentaje_Beca"] == "NA") {
                $muestra = "Crédito";
                $porcentaje = "";
            } else {
                $muestra = " de Crédito";
                $porcentaje = $fila["Porcentaje_Beca"];
            }
        }

        $is_fav = $b->isFavorite($_SESSION['id_usuario'], $fila["ID_Beca"]);
        $is_meInteresa = $b->isMeInteresa($_SESSION['id_usuario'], $fila["ID_Beca"]);

        if ($is_fav) {
            $icono = '<span id="icono-' . $fila["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-star yellow" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        } elseif ($is_meInteresa) {
            $icono = '<span id="icono-' . $fila["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-heart red" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        } else {
            $icono = '<span id="icono-' . $fila["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-heart gray-box" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        }

        echo
            '    
                    <div class="row">
            
                        <div class="col-xs-12 caja-space caja-h-1 beca ' . getClassTipoBeca($fila["ID_Tipo"]) . '" style="margin-top:10px">
                            
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

                    // ponemos los requisitos guardados previamente
        $reqGen = getReq($fila["ID_Beca"],$_SESSION['id_usuario']);
        $doContact = $reqGen["do_contacto"];
        if($doContact == 1){
            $funcionesJS .= " allReadyContact(" . $fila["ID_Beca"]. "); ";
        }
    }
    echo "<script type='text/javascript'>$(document).ready(function(){".$funcionesJS."});</script>";

}

function Counter($id_usuario) {
    global $pdo;
    $miTipobeca = 0;
    $miTipobeca = getTipoBeca($_SESSION["id_usuario"]);
    $nivel = getNivelLetra($miTipobeca);
    $operacion = "SELECT COUNT(ID_Beca) AS total FROM becas WHERE Promedio_Acceso < ? AND Nivel_Estudio = ? ";
    $promedio = PromedioUsuario($id_usuario);
    $promedio = $promedio + 1;
    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $promedio,PDO::PARAM_INT);
    $sentencia->bindParam(2,$nivel);
    $sentencia->execute();
    $resultado = $sentencia->fetch();

    echo $resultado["total"];
}

function CounterAll($id_usuario) {
    global $pdo;

    $operacion = "SELECT COUNT(ID_Beca) AS total FROM becas";
    $promedio = PromedioUsuario($id_usuario);

    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $promedio);
    $sentencia->execute();
    $resultado = $sentencia->fetch();

    echo $resultado["total"];
}

function PromedioUsuario($id_usuario) {
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

function Modals() {
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
    $b = new Beca();

    $operacion = "SELECT *, '1' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_favorito ON tabla.ID_Beca = beca_favorito.id_beca WHERE beca_favorito.id_usuario = ? UNION SELECT *, '2' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_interesa ON tabla.ID_Beca = beca_interesa.id_beca WHERE beca_interesa.id_usuario = ?";

    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $id_usuario);
    $sentencia->bindParam(2, $id_usuario);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->rowCount();

    $query = "SELECT * FROM requirements WHERE user_id=:user_id;";
    $stm = $pdo->prepare($query);
    $stm->bindParam(":user_id", $_SESSION["id_usuario"], PDO::PARAM_INT);
    $stm->execute();
    $req = $stm->fetchAll(PDO::FETCH_ASSOC);

    $acta = 0; $kardex = 0; $examen = 0; $promedio = 0; $toefl = 0;
    if (count($req) > 0) {
        $acta = $req[0]["acta"];
        $kardex = $req[0]["kardex"];
        $examen = $req[0]["examen"];
        $promedio = $req[0]["promedio"];
        $toefl = $req[0]["toefl"];
    }

    // Remueve los duplicados
    $resultado = unique_multidim_array($resultado, "ID_Beca");

    foreach ($resultado as $fila) {
        $is_fav = $b->isFavorite($_SESSION['id_usuario'], $fila["ID_Beca"]);
        $is_meInteresa = $b->isMeInteresa($_SESSION['id_usuario'], $fila["ID_Beca"]);

        if ($is_fav) {
            $icono = '<span id="icono-' . $fila["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-star yellow" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        } elseif ($is_meInteresa) {
            $icono = '<span id="icono-' . $fila["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-heart red" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        } else {
            $icono = '<span id="icono-' . $fila["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-heart gray-box" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $fila["ID_Beca"] . ');" aria-hidden="true" align="right"></span>';
        }

        //Muestra la beca con los requerimientos completos
        if ($toefl == 1 && $promedio == 1 && $examen == 1) {
            echo
                '        
                    <div id="cuadro-"' .$fila["ID_Beca"].'" class="col-md-2 col-md-offset-1 caja" style="margin-bottom: 23.5px; background-color: #25acd9;">
                          <div class="row" style="position: absolute; margin-left: 160px; margin-top: 10px">
                              <p style="color: white; font-size: 14px"><strong>100%</strong></p>
                          </div>
                          <div class="col-xs-12 space-inside" align="left">
                            
                            <div class="row" style="margin-left: 0px; margin-right: 0px; padding-bottom: 5px;"> 
                              <a href="#" data-toggle="modal" data-target="#tecmon' . $fila["ID_Beca"] . '"><span class="blue-box" style="color: white;">' . substr($fila["Nombre_Escuela"], 0, 30) . '</span></a>
                            </div>

                            <div class="row space-inside-p" style="margin-left: 0px; margin-right: 0px;">
                               
                                <p style="color: white;"><strong>' . $fila["Nombre_Beca"] . '</strong></p>
                                <p style="color: white;">Aplica ' . $fila["Beca_Sobre"] . '</p>
                            </div>
                            <br>
                            <div class="row" style="margin-left: 0px; margin-right: 150px; margin-top: 0px;">
                                <button class="btn btn-danger" onclick="contactar(' . $_SESSION['id_usuario'] . ',' . $fila["ID_Beca"] . ');">Notificar a la escuela</button>
                            </div>
                          </div>
                    </div>
                    ';
        } else {
            echo
                '        
                    <div id="cuadro-' .$fila["ID_Beca"].'" class="col-md-2 col-md-offset-1 caja" style="margin-bottom: 23.5px">
                      
                          <div class="col-xs-9 space-inside" align="left">
                            
                            <div class="row" style="margin-left: 0px; margin-right: 0px; padding-bottom: 15px;"> 
                              <a href="#" data-toggle="modal" data-target="#tecmon' . $fila["ID_Beca"] . '"><span class="blue-box">' . substr($fila["Nombre_Escuela"], 0, 30) . '</span></a>
                            </div>

                            <div class="row space-inside-p" style="margin-left: 0px; margin-right: 0px;">
                                <br>
                                <p><strong>' . $fila["Nombre_Beca"] . '</strong></p>
                                <p>Aplica ' . $fila["Beca_Sobre"] . '</p>
                            </div>

                          </div>
                      
                          <div class="col-xs-3" align="right">
                            <div class="row" style="margin-left: 0px; margin-right: 0px;">
                              ' . $icono . '
                            </div>
                            
                            <div class="row" style="margin-left: 0px; margin-right: 0px; margin-top: 105px;">
                              
                              <span id="becaPorc-'.$fila["ID_Beca"].'" style="color: #25acd9; font-weight: bold; font-size: 12px;">'.getPorcentajeByBeca($fila["ID_Beca"],$_SESSION['id_usuario']).'%</span>
                            </div>
                            
                          </div>

                    </div>
                    ';
        }
    }
}

function unique_multidim_array($array, $key) {
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
function validateSchools($user) {
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
function validateProfile($email) {
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

function ModalsFavIntereses() {
    global $pdo;

    $operacion = "SELECT *, '1' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela, escuelas.Nombre_Campus, escuelas.Descripcion_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_favorito ON tabla.ID_Beca = beca_favorito.id_beca UNION SELECT *, '2' AS tipo FROM ( SELECT becas.*, escuelas.Nombre_Escuela, escuelas.Nombre_Campus, escuelas.Descripcion_Escuela FROM becas INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla INNER JOIN beca_interesa ON tabla.ID_Beca = beca_interesa.id_beca";

    $sentencia = $pdo->prepare($operacion);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    $sentencia->rowCount();
    modalBeca($resultado);
}

function getPorcentajeByBeca($beca_id,$usuario){
    $cantReqisitos = 0;
    $porcentaje = 0;
    $beca = new Beca();
    //obtenemos llos requisitos checados
    $jRequisitos = $beca->getRequitistosByBeca($beca_id,$usuario);
    $requisitos = json_decode($jRequisitos,true);
    // si ya hay requisitos
    if($requisitos["count"] > 0){
        $req = $requisitos["rows"][0];
        if($req["Promedio"] == 1){
            $cantReqisitos += 1;
        }
        if($req["Mantener_Prom"] == 1){
            $cantReqisitos += 1;
        }
        if($req["Socioeconomico"] == 1){
             $cantReqisitos += 1;
        }
        if($req["Examen_Admision"] == 1){
            $cantReqisitos += 1;
        }
        if($req["Idiomas"] == 1){
            $cantReqisitos += 1;
        }
        if($req["Ingresos"] == 1){
            $cantReqisitos += 1;
        }
        
        $porcentaje = (100/6) * $cantReqisitos;
    }

        return number_format($porcentaje,0);
    }


    function getReq($beca_id,$usuario){
        $beca = new Beca();
        //obtenemos llos requisitos checados
        $jRequisitos = $beca->getRequitistosByBeca($beca_id,$usuario);
        $requisitos = json_decode($jRequisitos,true);
        if(count($requisitos["rows"])){
          return $requisitos["rows"][0];  
        }

        return null;
        
    }

/**
 * Muestra el modal con el detalle de una beca, si es la pantalla de oportunidadaes
 * también muestra los botones de favoritos y me interesa
 *
 * @param $becas
 * @param bool $oportunidades
 */
function modalBeca($becas, $oportunidades = false) {
    global $pdo;
    $b = new Beca();

    $query = "SELECT * FROM requirements WHERE user_id=:user_id;";
    $stm = $pdo->prepare($query);
    $stm->bindParam(":user_id", $_SESSION["id_usuario"], PDO::PARAM_INT);
    $stm->execute();
    $req = $stm->fetchAll(PDO::FETCH_ASSOC);

    $acta = 0; $kardex = 0; $examen = 0; $promedio = 0; $toefl = 0;
    if (count($req) > 0) {
        $acta = $req[0]["acta"];
        $kardex = $req[0]["kardex"];
        $examen = $req[0]["examen"];
        $promedio = $req[0]["promedio"];
        $toefl = $req[0]["toefl"];
    }

    foreach ($becas as $beca) {
        $is_fav = $b->isFavorite($_SESSION['id_usuario'], $beca["ID_Beca"]);
        $meInteresa = $b->isMeInteresa($_SESSION['id_usuario'], $beca["ID_Beca"]);
        if ($is_fav && $meInteresa) {
            $icono = '
                    <span id="heart-' . $beca["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-heart red" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                    <span id="start-' . $beca["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-star yellow" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                    ';
        } elseif ($meInteresa && !$is_fav) {
            $icono = '
                    <span id="heart-' . $beca["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-heart red" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                    <span id="start-' . $beca["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-star gray-box" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                ';
        } elseif ($is_fav && !$meInteresa) {
            $icono = '
                    <span id="heart-' . $beca["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-heart gray-box" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                    <span id="start-' . $beca["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-star yellow" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                ';
        } else {
            $icono = '
                    <span id="heart-' . $beca["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-heart gray-box" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                    <span id="start-' . $beca["ID_Beca"] . '" style="cursor: pointer;" class="glyphicon glyphicon-star gray-box" onclick="miBeca(' . $_SESSION['id_usuario'] . ',' . $beca["ID_Beca"] . ');" aria-hidden="true" ></span>
                ';
        }

        //obtenemos los requisitos por beca y usuario
        //Promedio, Mantener_Prom, Socioeconomico, Examen_Admision, Idiomas, Ingresos
        
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
                                <!-- REQUISITOS -->
                                <div class="col-xs-4">
                                    <a class="btn btn-req btn-block" data-toggle="tab"
                                       href="#req-<?php echo $beca["ID_Beca"]; ?>"><b>Requisitos</b></a>&nbsp;
                                </div>

                                <!-- CONTACTO -->
                                <div class="col-xs-4">
                                    <button class="btn btn-normal btn-block" data-toggle="tab"
                                            href="#contacto-<?php echo $beca["ID_Beca"]; ?>"><b>Contacto</b>
                                    </button>
                                </div>
                                <!-- LA INSTITUCION -->
                                <div class="col-xs-4">
                                    <button class="btn btn-normal btn-block" data-toggle="tab"
                                            href="#institucion-<?php echo $beca["ID_Beca"]; ?>"><b>La Institución</b>
                                    </button>&nbsp;
                                </div>
                                <br>
                            </div>
                        </div>
                        <?php
                            // ponemos los requisitos guardados previamente
                                $reqGen = getReq($beca["ID_Beca"],$_SESSION['id_usuario']);
                                $req1 = $reqGen["Promedio"];
                                $req2 = $reqGen["Mantener_Prom"];
                                $req3 = $reqGen["Socioeconomico"];
                                $req4 = $reqGen["Examen_Admision"];
                                $req5 = $reqGen["Idiomas"];
                                $req6 = $reqGen["Ingresos"];
                                $fullReq= $req1 + $req2 + $req3 + $req4 + $req5 + $req6; 
                                $doContact = $reqGen["do_contacto"];
                                if($doContact == 1){
                        ?>
                            <script type="text/javascript">
                                allReadyContact(<?php echo $beca["ID_Beca"];?>);
                            </script>
                        <?php } ?>
                        <div class="row" >
                            <div class="col-md-10 col-md-offset-1">
                                <div class="tab-content">
                                    <div id="req-<?php echo $beca["ID_Beca"]; ?>" class="tab-pane fade in active">
                                        <p style="color: #545454;"><b><?php echo $beca["Nom_Descriptivo"]; ?></b></p>
                                        <div style="word-wrap: break-word;">
                                            <?php echo $beca["Descripcion_Beca"]; ?>
                                        </div>
                                        <p style="margin-top: 30px; color: #545454;"><b>Resumen de Requisitos</b></p>
                                        <div class="content-requisitos">
                                            <div class="checkbox">
                                                <label style="color: #545454;">
                                                <input id="<?php echo $beca["ID_Beca"]."-chbx-1"; ?>" onchange='saveRequisito(<?php echo $beca["ID_Beca"].",".$_SESSION['id_usuario']; ?>)' onclick='setPorcentaje(<?php echo $beca["ID_Beca"]; ?>,this)' type="checkbox" <?php if ($req1) { echo " checked"; } ?> />
                                                    <b>&nbsp;&nbsp;
                                                        ¿Requiere
                                                        promedio? <?php echo ($beca['Requiere_Promedio'] == 1) ? " Si " . "Promedio de: " . $beca['Promedio_Acceso'] : "No"; ?>
                                                            
                                                        </b></label>
                                            </div>
                                            <div class="checkbox">
                                                <label style="color: #545454;">
                                                <input id="<?php echo $beca["ID_Beca"]."-chbx-2"; ?>" onchange='saveRequisito(<?php echo $beca["ID_Beca"].",".$_SESSION['id_usuario']; ?>)' onclick='setPorcentaje(<?php echo $beca["ID_Beca"]; ?>,this)' type="checkbox" <?php if ($req2) { echo " checked"; } ?> />
                                                        <b>&nbsp;&nbsp;
                                                        Mantener promedio
                                                        de: <?php echo $beca['Promedio_Mantener']; ?>
                                                        </b>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label style="color: #545454;">
                                                <input id="<?php echo $beca["ID_Beca"]."-chbx-3"; ?>" onchange='saveRequisito(<?php echo $beca["ID_Beca"].",".$_SESSION['id_usuario']; ?>)' onclick='setPorcentaje(<?php echo $beca["ID_Beca"]; ?>,this)' type="checkbox" <?php if ($req3) { echo " checked"; } ?> /><b>&nbsp;&nbsp;
                                                        ¿Requiere Estudio
                                                        socioeconómico? <?php echo ($beca['Estudio_Socioeco'] == 1) ? "Si" : "No"; ?></b></label>
                                            </div>
                                            <div class="checkbox">
                                                <label style="color: #545454;"><input id="<?php echo $beca["ID_Beca"]."-chbx-4"; ?>" onchange='saveRequisito(<?php echo $beca["ID_Beca"].",".$_SESSION['id_usuario']; ?>)' onclick='setPorcentaje(<?php echo $beca["ID_Beca"]; ?>,this)' type="checkbox" <?php if ($req4) { echo " checked"; } ?> /><b>&nbsp;&nbsp;
                                                        ¿Requiere examen de
                                                        admisión? <?php echo ($beca['Requiere_Examen'] == 1) ? " Si " . $beca['Examen_Admision'] . " puntaje " . $beca['Puntaje'] : "No"; ?></b></label>
                                            </div>
                                            <div class="checkbox">
                                                <label style="color: #545454;"><input id="<?php echo $beca["ID_Beca"]."-chbx-5"; ?>" onchange='saveRequisito(<?php echo $beca["ID_Beca"].",".$_SESSION['id_usuario']; ?>)' onclick='setPorcentaje(<?php echo $beca["ID_Beca"]; ?>,this)' type="checkbox" <?php if ($req5) { echo " checked"; } ?>><b>&nbsp;&nbsp;
                                                        ¿Requiere
                                                        idiomas? <?php echo ($beca['Requiere_Idiomas'] == 1) ? " Si " . $beca['Examen_Idiomas'] . " puntaje " . $beca['Puntuaje_Idiomas'] : "No"; ?></b></label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" id="<?php echo $beca["ID_Beca"]."-chbx-6"; ?>" onchange='saveRequisito(<?php echo $beca["ID_Beca"].",".$_SESSION['id_usuario']; ?>)' onclick='setPorcentaje(<?php echo $beca["ID_Beca"]; ?>,this)' <?php if ($req6) { echo " checked"; } ?>>
                                                <b>&nbsp;&nbsp; Comprobar
                                                        ingresos <?php echo $beca['Ingresos_Comprobar']; ?></b></label>
                                            </div>

                                             <div class="row">
                                              <div class="col-xs-12 col-md-12" align="center"> 
                                                <button type="button" onclick="contactar(<?php echo $_SESSION['id_usuario'].",".$beca["ID_Beca"]; ?>,this);" class="btn btn-danger btn-lg notificarEsc"  id="<?php echo $beca["ID_Beca"]."-btncontac"; ?>" <?php if($fullReq < 6 ){echo "style='display:none'";}else{ if($doContact == 1){echo "disabled";} } ?>>
                                                    <?php 
                                                    if($doContact == 1){
                                                        echo "¡Gracias!";
                                                    }else{
                                                        echo "Notificar a la escuela";
                                                    }?>
                                                    
                                                </button>
                                              </div>
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
