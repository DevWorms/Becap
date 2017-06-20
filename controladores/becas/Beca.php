<?php

/**
 * Created by PhpStorm.
 * User: @HackeaMesta
 * Date: 09.03.17
 * Time: 13:33
 */

require_once dirname(__FILE__) . '/../datos/ConexionBD.php';
session_start();
class Beca {
    private $conn;

    function __construct() {
        $this->conn = ConexionBD::obtenerInstancia()->obtenerBD();
    }

    public function loadRequirements() {
        $res = ["estado" => 0];
        try {
            $query = "SELECT *, '1' AS tipo FROM ( 
                        SELECT becas.*, escuelas.Nombre_Escuela FROM becas 
                        INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla 
                        INNER JOIN beca_favorito ON tabla.ID_Beca = beca_favorito.id_beca 
                        WHERE beca_favorito.id_usuario = ? 
                        UNION SELECT *, '2' AS tipo FROM ( 
                        SELECT becas.*, escuelas.Nombre_Escuela FROM becas 
                        INNER JOIN escuelas ON escuelas.ID_Escuela = becas.id_escuela) AS tabla 
                        INNER JOIN beca_interesa ON tabla.ID_Beca = beca_interesa.id_beca 
                        WHERE beca_interesa.id_usuario = ?";
            $pdo = $this->conn->prepare($query);
            $pdo->bindParam(1, $_SESSION['id_usuario']);
            $pdo->bindParam(2, $_SESSION['id_usuario']);
            $pdo->execute();
            $resultado = $pdo->fetchAll(PDO::FETCH_ASSOC);

            $promedio = 0; $acta = 0; $examen = 0; $toefl = 0; $kardex = 0;

            if (count($resultado) > 0) {
                foreach ($resultado as $beca) {
                    if ( (strpos("examen de admisión", strtolower($beca["Examen_Admision"]))) ||
                         (strpos("examen de admision", strtolower($beca["Examen_Admision"])))) {
                        $examen++;
                    }

                    if (is_numeric($beca["Promedio_Acceso"]) && $beca["Promedio_Acceso"] >= 80) {
                        $promedio++;
                    }

                    if (strpos("toefl", strtolower($beca["Examen_Idiomas"]))) {
                        $toefl++;
                    }
                }
            }

            $query = "SELECT * FROM requirements WHERE user_id=:user_id;";
            $stm2 = $this->conn->prepare($query);
            $stm2->bindParam(":user_id", $_SESSION['id_usuario']);
            $stm2->execute();
            $requirements = $stm2->fetchAll(PDO::FETCH_ASSOC);

            if (count($requirements) < 1) {
                $requirements = [];
            } else {
                $requirements = $requirements[0];
            }

            $res["estado"] = 1;
            $res["total"] = count($resultado);
            $res["promedio"] = $promedio;
            $res["acta"] = $acta;
            $res["examen"] = $examen;
            $res["toefl"] = $toefl;
            $res["kardex"] = $kardex;
            $res["requirements"] = $requirements;
        } catch (Exception $ex) {
            $res["mensaje"] = $ex->getMessage();
        }

        return json_encode($res);
    }

    public function saveRequirements($data) {
        $res = ["estado" => 0];
        try {
            $query = "SELECT id FROM requirements WHERE user_id=:user_id;";
            $pdo = $this->conn->prepare($query);
            $pdo->bindParam(":user_id", $_SESSION['id_usuario']);
            $pdo->execute();
            $resultado = $pdo->fetchAll();

            /*
             * Si ya existen sus ajustes, los  actualiza
             */
            if (count($resultado) > 0) {
                $query = "UPDATE requirements SET promedio=:promedio, acta=:acta, examen=:examen, toefl=:toefl, 
                          kardex=:kardex WHERE user_id=:user_id;";
            } else {
                $query = "INSERT INTO requirements (promedio, acta, examen, toefl, kardex, user_id) 
                          VALUES (:promedio, :acta, :examen, :toefl, :kardex, :user_id);";
            }

            $pdo2 = $this->conn->prepare($query);
            $pdo2->bindParam(":user_id", $_SESSION['id_usuario']);
            $pdo2->bindParam(":promedio", $data['promedio']);
            $pdo2->bindParam(":acta", $data['acta']);
            $pdo2->bindParam(":examen", $data['examen']);
            $pdo2->bindParam(":toefl", $data['toefl']);
            $pdo2->bindParam(":kardex", $data['kardex']);
            $pdo2->execute();

            $res["estado"] = 1;
            $res["mensaje"] = "Requisitos guardados correctamente";
        } catch (Exception $ex) {
            $res["mensaje"] = $ex->getMessage();
        }

        return json_encode($res);
    }


    // Obtiene los reqisitos de beca pro usuario y un count si existe o no
    public function getRequitistosByBeca($beca_id,$usuario_id){
        $res = ["estado" => 0];
        
        $query = "SELECT * FROM resumen_requisitos WHERE ID_Beca = :beca_id AND Usuario_id = :usuario";
        
        $pdo = $this->conn->prepare($query);
        $pdo->bindParam(":beca_id", $beca_id);
        $pdo->bindParam(":usuario", $usuario_id);
        $pdo->execute();

        $resultado = $pdo->fetchAll();
        $res["estado"]=1;
        $res["rows"]=$resultado;

        $cRows = count($resultado);
        $res["count"]=$cRows;

        return json_encode($res);
    }

    public function guardaRequisitosPorbeca($beca_id, $usuario_id,$promedio,$mantener,$socioeconomico,$exadmision,$idioma,$ingresos){

        // VALIDAMOS SI SERA UPDATE O INSERTE
        $res = ['estado' => 0];
        $jExisteBeca = $this->getRequitistosByBeca($beca_id,$usuario_id);
        $arrExisteBeca = json_decode($jExisteBeca);
        $existeBeca = $arrExisteBeca['count'];
        if($existeBeca > 0 ){

            $query = 'UPDATE resumen_requisitos';
            $query .= 'SET Promedio = :promedio,';
            $query .= 'Mantener_Prom = :mantener,';
            $query .= 'Socioeconomico = :socioeconomico,';
            $query .= 'Examen_Admision = :exadmision,';
            $query .= 'Idiomas = :idioma,';
            $query .= 'Ingresos = :ingresos,';
            $query .= 'WHERE ID_Beca = :beca_id AND Usuario_id = : usuario';

            $pdo = $this->conn->prepare($query);
            $pdo->bindParam(":beca_id", $beca_id);
            $pdo->bindParam(":usuario", $usuario_id);
            $pdo->bindParam(":promedio", $promedio);
            $pdo->bindParam(":mantener", $mantener);
            $pdo->bindParam(":socioeconomico", $socioeconomico);
            $pdo->bindParam(":exadmision", $exadmision);
            $pdo->bindParam(":idioma", $idioma);
            $pdo->bindParam(":ingresos", $ingresos);

            $res["action"] = "update";
            if($pdo->execute()){
                $res['estado'] = 1;
            }else{
                $res['estado'] = 0;
            }

        }else {
            $query = 'INSERT INTO resumen_requisitos(ID_Beca,Promedio,Mantener_Prom,Socioeconomico,Examen_Admision,Idiomas,Ingresos,Usuario_id)';
            $query.= ' VALUES (:beca_id,';
            $query.= ':promedio,';
            $query.= ':mantener,';
            $query.= ':socioeconomico,';
            $query.= ':exadmision,';
            $query.= ':idioma,';
            $query.= ':ingresos,';
            $query.= ':usuario_id);';

            $pdo = $this->conn->prepare($query);
            $pdo->bindParam(":beca_id", $beca_id);
            $pdo->bindParam(":usuario", $usuario_id);
            $pdo->bindParam(":promedio", $promedio);
            $pdo->bindParam(":mantener", $mantener);
            $pdo->bindParam(":socioeconomico", $socioeconomico);
            $pdo->bindParam(":exadmision", $exadmision);
            $pdo->bindParam(":idioma", $idioma);
            $pdo->bindParam(":ingresos", $ingresos);

            $res["action"] = "insert";
            if($pdo->execute()){
                $res['estado'] = 1;
            }else{
                $res['estado'] = 0;
            }

        }

        return json_encode($res);
    }

    public function addToFavorites($user_id, $beca_id) {
        if (is_numeric($user_id) && is_numeric($beca_id)) {
            if (!$this->isFavorite($user_id, $beca_id)) {
                try {
                    $query = "SELECT id_beca FROM beca_favorito WHERE id_usuario=:user_id;";
                    $stm2 = $this->conn->prepare($query);
                    $stm2->bindParam(":user_id", $_SESSION['id_usuario'], PDO::PARAM_INT);
                    $stm2->execute();
                    $becas = $stm2->fetchAll();

                    if (count($becas) > 0) {
                        foreach ($becas as $beca) {
                            $this->addToMeInteresa($_SESSION['id_usuario'], $beca[0]);
                        }
                    }

                    $query = "DELETE FROM beca_favorito WHERE id_usuario=:user_id;";
                    $stm3 = $this->conn->prepare($query);
                    $stm3->bindParam(":user_id", $_SESSION['id_usuario'], PDO::PARAM_INT);
                    $stm3->execute();

                    $query = "INSERT INTO beca_favorito (id_usuario, id_beca) VALUES (:user_id, :beca_id)";
                    $stm = $this->conn->prepare($query);
                    $stm->bindParam(":user_id", $_SESSION['id_usuario'], PDO::PARAM_INT);
                    $stm->bindParam(":beca_id", $beca_id, PDO::PARAM_INT);
                    $stm->execute();

                    $res = [
                        'estado' => 1,
                        'mensaje' => "La beca se agrego a favoritos correctamente"
                    ];
                } catch (PDOException $ex) {
                    $res = [
                        'estado' => 0,
                        'mensaje' => "Ocurrio un error al agregar a favoritos: " . $ex->getMessage()
                    ];
                } catch (Exception $ex) {
                    $res = [
                        'estado' => 0,
                        'mensaje' => "Ocurrio un error al agregar a favoritos: " . $ex->getMessage()
                    ];
                }
            } else {
                $res = [
                    'estado' => 0,
                    'mensaje' => "Esta beca ya se encuentra en tu lista de favoritos"
                ];
            }
        } else {
            $res = [
                'estado' => 0,
                'mensaje' => "Ingresa un valor valido"
            ];
        }

        return json_encode($res);
    }

    public function addToMeInteresa($user_id, $beca_id) {
        if (is_numeric($user_id) && is_numeric($beca_id)) {
            if (!$this->isMeInteresa($user_id, $beca_id)) {
                try {
                    $query = "INSERT INTO beca_interesa (id_usuario, id_beca) VALUES (:user_id, :beca_id)";
                    $stm = $this->conn->prepare($query);
                    $stm->bindParam(":user_id", $_SESSION['id_usuario'], PDO::PARAM_INT);
                    $stm->bindParam(":beca_id", $beca_id, PDO::PARAM_INT);
                    $stm->execute();

                    $res = [
                        'estado' => 1,
                        'mensaje' => "La beca se agrego correctamente"
                    ];
                } catch (PDOException $ex) {
                    $res = [
                        'estado' => 0,
                        'mensaje' => "Ocurrio un error al agregar: " . $ex->getMessage()
                    ];
                } catch (Exception $ex) {
                    $res = [
                        'estado' => 0,
                        'mensaje' => "Ocurrio un error al agregar: " . $ex->getMessage()
                    ];
                }
            } else {
                $res = [
                    'estado' => 0,
                    'mensaje' => "Esta beca ya se encuentra en tu lista de \"Me interesa\""
                ];
            }
        } else {
            $res = [
                'estado' => 0,
                'mensaje' => "Ingresa un valor valido"
            ];
        }

        return json_encode($res);
    }

    public function removeMeInteresa($user_id, $beca_id) {
        if (is_numeric($user_id) && is_numeric($beca_id)) {
            if ($this->isMeInteresa($user_id, $beca_id)) {
                try {
                    $query = "DELETE FROM beca_interesa WHERE id_usuario=:user_id and id_beca=:beca_id;";
                    $stm = $this->conn->prepare($query);
                    $stm->bindParam(":user_id", $_SESSION['id_usuario'], PDO::PARAM_INT);
                    $stm->bindParam(":beca_id", $beca_id, PDO::PARAM_INT);
                    $stm->execute();

                    $res = [
                        'estado' => 1,
                        'mensaje' => "La beca se removio correctamente de tu liste \"Me Interesa\""
                    ];
                } catch (PDOException $ex) {
                    $res = [
                        'estado' => 0,
                        'mensaje' => "Ocurrio un error al remover: " . $ex->getMessage()
                    ];
                } catch (Exception $ex) {
                    $res = [
                        'estado' => 0,
                        'mensaje' => "Ocurrio un error al remover: " . $ex->getMessage()
                    ];
                }
            } else {
                $res = [
                    'estado' => 0,
                    'mensaje' => "La beca se removio correctamente"
                ];
            }
        } else {
            $res = [
                'estado' => 0,
                'mensaje' => "Ingresa un valor valido"
            ];
        }

        return json_encode($res);
    }
    public function removeToFavoritos($user_id, $beca_id) {
        if (is_numeric($user_id) && is_numeric($beca_id)) {
            if ($this->isFavorite($user_id, $beca_id)) {
                try {
                    $query = "DELETE FROM beca_favorito WHERE id_usuario=:user_id and id_beca=:beca_id;";
                    $stm = $this->conn->prepare($query);
                    $stm->bindParam(":user_id", $_SESSION['id_usuario'], PDO::PARAM_INT);
                    $stm->bindParam(":beca_id", $beca_id, PDO::PARAM_INT);
                    $stm->execute();

                    $this->removeMeInteresa($user_id, $beca_id);

                    $res = [
                        'estado' => 1,
                        'mensaje' => "La beca se removio correctamente de tu liste de Favoritos"
                    ];
                } catch (PDOException $ex) {
                    $res = [
                        'estado' => 0,
                        'mensaje' => "Ocurrio un error al remover: " . $ex->getMessage()
                    ];
                } catch (Exception $ex) {
                    $res = [
                        'estado' => 0,
                        'mensaje' => "Ocurrio un error al remover: " . $ex->getMessage()
                    ];
                }
            } else {
                $res = [
                    'estado' => 0,
                    'mensaje' => "La beca se removio correctamente"
                ];
            }
        } else {
            $res = [
                'estado' => 0,
                'mensaje' => "Ingresa un valor valido"
            ];
        }

        return json_encode($res);
    }

    public function isFavorite($user_id, $beca_id) {
        if (is_numeric($user_id) && is_numeric($beca_id)) {
            try {
                $query = "SELECT * FROM beca_favorito WHERE id_usuario=:user_id and id_beca=:beca_id";
                $stm = $this->conn->prepare($query);
                $stm->bindParam(":user_id", $_SESSION['id_usuario'], PDO::PARAM_INT);
                $stm->bindParam(":beca_id", $beca_id, PDO::PARAM_INT);
                $stm->execute();
                $resultado = $stm->fetchAll();

                if (count($resultado) > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (Exception $ex) {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isMeInteresa($user_id, $beca_id) {
        if (is_numeric($user_id) && is_numeric($beca_id)) {
            try {
                $query = "SELECT * FROM beca_interesa WHERE id_usuario=:user_id and id_beca=:beca_id";
                $stm = $this->conn->prepare($query);
                $stm->bindParam(":user_id", $_SESSION['id_usuario'], PDO::PARAM_INT);
                $stm->bindParam(":beca_id", $beca_id, PDO::PARAM_INT);
                $stm->execute();
                $resultado = $stm->fetchAll();

                if (count($resultado) > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (Exception $ex) {
                return false;
            }
        } else {
            return false;
        }
    }

    private function GeraHash($qtd){ 
        //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
        $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789'; 
        $QuantidadeCaracteres = strlen($Caracteres); 
        $QuantidadeCaracteres--; 

        $Hash=NULL; 
            for($x=1;$x<=$qtd;$x++){ 
                $Posicao = rand(0,$QuantidadeCaracteres); 
                $Hash .= substr($Caracteres,$Posicao,1); 
            } 

        return $Hash; 
    }

    public function resetPassword($email) {
        $res = ['estado' => 0,
                'mensaje' => "La beca se removio correctamente de tu liste de Favoritos"
                ];
        try {
            $query = "SELECT Mail_Usuario FROM usuarios WHERE Mail_Usuario=:email;";
            $stm = $this->conn->prepare($query);
            $stm->bindParam(":email", $email, PDO::PARAM_STR);
            $stm->execute();
            $resultado = $stm->fetchAll();

            $password = $this->GeraHash(rand(6, 10));
            $msg = "Recientemente has solicitado una recuperar tu contraseña de Becap, <br> Tu nueva contraseña es: <strong>" . $password . "</strong>";

            if (count($resultado) > 0) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                $query = "UPDATE becap_db.usuarios SET Pwd_Usuario=:pwd WHERE Mail_Usuario=:email;";
                $stm2 = $this->conn->prepare($query);
                $stm2->bindParam(":email", $email, PDO::PARAM_STR);
                $stm2->bindParam(":pwd", $password, PDO::PARAM_STR);
                $stm2->execute();

                $headers = "From: " . $resultado[0][0] . "\r\n";
                $headers .= "Reply-To: ". $resultado[0][0] . "\r\n";
                $headers .= "CC: no-reply@example.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                mail($resultado[0][0], "Cambio de contraseñe en Becap", $msg, $headers);

                $res["estado"] = 1;
                $res["mensaje"] = "Tu contraseña se enviò a tu correo";
            } else {
                $res["mensaje"] = "No se encontrò el email";
            }
        } catch (Exception $ex) {
            $res["mensaje"] = $ex->getMessage() . " " . $ex->getLine();
        }

        return json_encode($res);
    }

    public function isLikeOrFavorite($beca_id) {
        $res = ["estado" => 0];

        try {
            if ($this->isFavorite($_SESSION["id_usuario"], $beca_id)) {
                $res["type"] = 1;
            } elseif ($this->isMeInteresa($_SESSION["id_usuario"], $beca_id)) {
                $res["type"] = 2;
            } else {
                $res["type"] = 3;
            }

            $res["estado"] = 1;
        } catch (Exception $ex) {
            $res["mensaje"] = $ex->getMessage();
        }

        return json_encode($res);
    }

    public function contactar($beca_id) {
        $res = ["estado" => 0];

        try {
            $query = "SELECT * FROM usuarios WHERE ID_Usuario=:user_id;";
            $stm = $this->conn->prepare($query);
            $stm->bindParam(":user_id", $_SESSION["id_usuario"], PDO::PARAM_INT);
            $stm->execute();
            $user = $stm->fetchAll(PDO::FETCH_ASSOC);

            if (count($user) > 0) {
                //INFORMACION DEL USUARIO
                $mensaje = "
                    <div><strong>Nombre</strong>: ". $user[0]["Nombre_Usuario"] ." ". $user[0]["Apellidos_Usuario"] ."</div>
                    <br>
                    <div><strong>Email</strong>: ". $user[0]["Mail_Usuario"] ."</div>
                    <div><strong>Número telefónico</strong>: ". $user[0]["Telefono_contacto"] ."</div>";

                $mensaje .= "<p>Fecha de nacimiento: ".$user[0]["Fecha_Nacimiento"]." <p>De " . $user[0]["Ciudad"] . " , ". $user[0]['Pais'] . "</p>";
                
                if($user[0]["Estudia"] == 1){
                    $mensaje .="<p>¿Estudia? SI </p>";
                }else{
                    $mensaje .="<p>¿Estudia? NO </p>";
                }
                
                $mensaje.= "<p> Posgrado : " . $user[0]["Nombre_Posgrado"]  ." Promedio: " . $user[0]["Promedio_Pos"] . "</p>";
                $mensaje.= "<p> Universidad : " . $user[0]["Nombre_Universidad"]  ." Promedio: " . $user[0]["Promedio_Uni"] . "</p>";
                $mensaje.= "<p> Preparatoria : " . $user[0]["Nombre_Prepa"]  ." Promedio: " . $user[0]["Promedio_Prepa"] . "</p>";
                $mensaje.= "<p> Secundaria : " . $user[0]["Nombre_Secundaria"]  ." Promedio: " . $user[0]["Promedio_Secundaria"] . "</p>";

                $mensaje.= "<hr>";

                //INFORMACION DE LA BECA
                $query = "SELECT * FROM becas WHERE ID_Beca=:beca_id;";
                $stm = $this->conn->prepare($query);
                $stm->bindParam(":beca_id", $beca_id, PDO::PARAM_INT);
                $stm->execute();
                $becaApl = $stm->fetchAll(PDO::FETCH_ASSOC);

                $mensaje .= "<p><b>Aplicó a la beca " . $becaApl[0]["Nombre_Beca"] . "</b></p>";
                $mensaje .= "<p> " . $becaApl[0]["Descripcion_Beca"] . "</p>";
                $mensaje .= "<p><b>Contacto: " . $becaApl[0]["Contacto"] . "</b></p>";
                $mensaje .= "<p><b>Enlace: " . $becaApl[0]["Link_Beca"] . "</b></p>";

                $headers = "From: " . $user[0]["Mail_Usuario"] . "\r\n";
                $headers .= "Reply-To: ". $user[0]["Mail_Usuario"] . "\r\n";
                $headers .= "CC: no-reply@example.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                mail("carlosamg@gmail.com", "Nuevo contacto desde BECAP", $mensaje, $headers);
                mail("mauricio.moniet@gmail.com", "Nuevo contacto desde BECAP", $mensaje, $headers);
                
                $res["estado"] = 1;
                $res["mensaje"] = "Se envio un mensaje a la institución se enviará una respuesta a tu correo.";
            } else {
                $res["estado"] = 0;
                $res["mensaje"] = "Ocurrio un error al contactar a la institución";
            }
        } catch (Exception $ex) {
            $res["mensaje"] = $ex->getMessage();
        }

        return json_encode($res);
    }
}

if (isset($_POST['get'])) {
    $get = $_POST['get'];
    $b = new Beca();

    switch ($get) {
        case 'addFavorite':
            echo $b->addToFavorites($_POST['user_id'], $_POST['beca_id']);
            break;
        case 'addInteresa':
            echo $b->addToMeInteresa($_POST['user_id'], $_POST['beca_id']);
            break;
        case 'removeFavorite':
            echo $b->removeToFavoritos($_POST['user_id'], $_POST['beca_id']);
            break;
        case 'removeInteresa':
            echo $b->removeMeInteresa($_POST['user_id'], $_POST['beca_id']);
            break;
        case 'resetPassword':
            echo $b->resetPassword($_POST["email"]);
            break;
        case 'isLikeOrFavorite':
            echo $b->isLikeOrFavorite($_POST['beca_id']);
            break;
        case 'loadRequirements':
            echo $b->loadRequirements();
            break;
        case 'saveRequirements':
            echo $b->saveRequirements($_POST);
            break;
        case 'contactar':
            echo $b->contactar($_POST['beca_id']);
            break;
        default:
            header("Location: ../../");
            break;
    }
}