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


    public function isLikeOrFavorite() {

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
        default:
            header("Location: ../../");
            break;
    }
}