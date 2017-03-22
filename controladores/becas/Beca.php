<?php

/**
 * Created by PhpStorm.
 * User: @HackeaMesta
 * Date: 09.03.17
 * Time: 13:33
 */

require_once dirname(__FILE__) . '/../datos/ConexionBD.php';

class Beca {
    private $conn;

    function __construct() {
        $this->conn = ConexionBD::obtenerInstancia()->obtenerBD();
    }

    public function addToFavorites($user_id, $beca_id) {
        if (is_numeric($user_id) && is_numeric($beca_id)) {
            if (!$this->isFavorite($user_id, $beca_id)) {
                try {
                    $query = "INSERT INTO beca_favorito (id_usuario, id_beca) VALUES (:user_id, :beca_id)";
                    $stm = $this->conn->prepare($query);
                    $stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
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
                    $stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
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
                    $stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
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
                    $stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
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
                $stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
                $stm->bindParam(":beca_id", $beca_id, PDO::PARAM_INT);
                $stm->execute();
                $resultado = $stm->fetchAll()[0];

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
                $stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
                $stm->bindParam(":beca_id", $beca_id, PDO::PARAM_INT);
                $stm->execute();
                $resultado = $stm->fetchAll()[0];

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
        default:
            header("Location: ../../");
            break;
    }
}