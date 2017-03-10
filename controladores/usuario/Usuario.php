<?php

/**
 * Created by PhpStorm.
 * User: rk521
 * Date: 09.03.17
 * Time: 21:51
 */
include dirname(__FILE__) . "/../datos/ConexionBD.php";
session_start();

class Usuario {
    private $conn;

    /**
     * Usuario constructor.
     * @param $conn
     */
    public function __construct() {
        $this->conn = ConexionBD::obtenerInstancia()->obtenerBD();
    }

    public function getProfile() {
        try {
            $query = "SELECT usuarios.*, carreras_usuario.* FROM usuarios LEFT JOIN carreras_usuario ON usuarios.ID_Usuario=carreras_usuario.id_usuario WHERE usuarios.ID_Usuario=:id";
            $stm = $this->conn->prepare($query);
            $stm->bindParam(":id", $_SESSION['id_usuario'], PDO::PARAM_INT);
            $stm->execute();
            return json_encode($stm->fetchAll()[0]);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateHistorial($data) {
        try {
            $posgra = $data["posgrado"];
            $posgraPromedio = $data["posgraPromedio"];

            $uni = $data["universidad"];
            $uniPromedio = $data["uniPromedio"];

            $prepa = $data["preparatoria"];
            $prepaPromedio = $data["prepaPromedio"];

            $secu = $data["secundaria"];
            $secuPromedio = $data["secuPromedio"];

            $validate = $this->validateSchools($posgra, $posgraPromedio, $uni, $uniPromedio, $prepa, $prepaPromedio, $secu, $secuPromedio);

            if ($validate === 1) {
                $sql = "UPDATE becap_db.usuarios SET 
												 Nombre_Posgrado       = :posgrado, 
												 Promedio_Pos          = :posPromedio,
												 Nombre_Universidad    = :universidad,	
												 Promedio_Uni    = :uniPromedio, 
												 Nombre_Prepa      = :prepa, 
												 Promedio_Prepa    = :prepaPromedio,
												 Nombre_Secundaria = :secu, 
												 Promedio_Secundaria = :secuPromedio 
				  WHERE ID_Usuario = :id";

                $stm = $this->conn->prepare($sql);
                $stm->bindParam(":id", $_SESSION['id_usuario'], PDO::PARAM_INT);
                $stm->bindParam(":posgrado", $posgra, PDO::PARAM_STR);
                $stm->bindParam(":posPromedio", $posgraPromedio, PDO::PARAM_STR);
                $stm->bindParam(":universidad", $uni, PDO::PARAM_STR);
                $stm->bindParam(":uniPromedio", $uniPromedio, PDO::PARAM_STR);
                $stm->bindParam(":prepa", $prepa, PDO::PARAM_STR);
                $stm->bindParam(":prepaPromedio", $prepaPromedio, PDO::PARAM_STR);
                $stm->bindParam(":secu", $secu, PDO::PARAM_STR);
                $stm->bindParam(":secuPromedio", $secuPromedio, PDO::PARAM_STR);

                $stm->execute();
                $res = ['estado' => 1, 'mensaje' => 'Tu historial se actualizo correctamente'];
            } else {
                $res = ['estado' => 1, 'mensaje' => $validate];
            }
        } catch (Exception $ex) {
            $res = ['estado' => 0, 'mensaje' => $ex->getMessage()];
        }
        return json_encode($res);
    }

    public function updateIntereses($data) {
        try {
            $telefono    = $data["telefono"];
            $tipoBeca = $data["tipo_beca"];

            $admin = (isset($data['admin']) && $data['admin'] == 1) ? 1 : 0;
            $aboga = (isset($data['aboga']) && $data['aboga'] == 1) ? 1 : 0;
            $psico = (isset($data['psico']) && $data['psico'] == 1) ? 1 : 0;
            $conta = (isset($data['conta']) && $data['conta'] == 1) ? 1 : 0;
            $econo = (isset($data['econo']) && $data['econo'] == 1) ? 1 : 0;
            $finan = (isset($data['finan']) && $data['finan'] == 1) ? 1 : 0;
            $arthu = (isset($data['arthu']) && $data['arthu'] == 1) ? 1 : 0;
            $arqui = (isset($data['arqui']) && $data['arqui'] == 1) ? 1 : 0;
            $ingen = (isset($data['ingen']) && $data['ingen'] == 1) ? 1 : 0;
            $disin = (isset($data['disin']) && $data['disin'] == 1) ? 1 : 0;
            $ensen = (isset($data['ensen']) && $data['ensen'] == 1) ? 1 : 0;
            $medic = (isset($data['medic']) && $data['medic'] == 1) ? 1 : 0;

            $validate = $this->validateIntereses($telefono, $tipoBeca, $admin, $aboga, $psico, $conta, $econo,
                $finan, $arthu, $arqui, $ingen, $disin, $ensen, $medic);
            if ($validate === 1) {
                $sql = "UPDATE becap_db.carreras_usuario SET 
                        admin=:admin,
                        aboga=:aboga,
                        psico=:psico, 
                        conta=:conta, 
                        econo=:econo,
                        finan=:finan, 
                        arthu=:arthu, 
                        arqui=:arqui, 
                        ingen=:ingen, 
                        disin=:disin,
                        ensen=:ensen, 
                        medic=:medic WHERE id_usuario=:id_usuario";
                $stm = $this->conn->prepare($sql);
                $stm->bindParam(":admin", $admin, PDO::PARAM_INT);
                $stm->bindParam(":aboga", $aboga, PDO::PARAM_INT);
                $stm->bindParam(":psico", $psico, PDO::PARAM_INT);
                $stm->bindParam(":conta", $conta, PDO::PARAM_INT);
                $stm->bindParam(":econo", $econo, PDO::PARAM_INT);
                $stm->bindParam(":finan", $finan, PDO::PARAM_INT);
                $stm->bindParam(":arthu", $arthu, PDO::PARAM_INT);
                $stm->bindParam(":arqui", $arqui, PDO::PARAM_INT);
                $stm->bindParam(":ingen", $ingen, PDO::PARAM_INT);
                $stm->bindParam(":disin", $disin, PDO::PARAM_INT);
                $stm->bindParam(":ensen", $ensen, PDO::PARAM_INT);
                $stm->bindParam(":medic", $medic, PDO::PARAM_INT);
                $stm->bindParam(":id_usuario", $_SESSION['id_usuario'], PDO::PARAM_INT);
                $stm->execute();

                $sql = "UPDATE becap_db.usuarios SET Telefono_contacto = :telefono, tipo_beca = :tipoBeca
		                WHERE ID_Usuario = :usuario";
                $stm = $this->conn->prepare($sql);
                $stm->bindParam(":telefono", $telefono, PDO::PARAM_STR);
                $stm->bindParam(":tipoBeca", $tipoBeca, PDO::PARAM_INT);
                $stm->bindParam(":usuario", $_SESSION['id_usuario'], PDO::PARAM_STR);
                $stm->execute();

                $res = ['estado' => 1, 'mensaje' => 'Tus intereses se actualizaron correctamente'];
            } else {
                $res = ['estado' => 0, 'mensaje' => $validate];
            }
        } catch (Exception $ex) {
            $res = ['estado' => 0, 'mensaje' => $ex->getMessage()];
        }

        return json_encode($res);
    }

    public function validateIntereses($telefono, $tipoBeca, $admin, $aboga, $psico, $conta, $econo,
                                      $finan, $arthu, $arqui, $ingen, $disin, $ensen, $medic) {
        if ( ($admin == 0) && ($aboga == 0) && ($psico == 0) && ($conta == 0) && ($econo == 0) && ($finan == 0) &&
            ($arthu == 0) && ($arqui == 0) && ($ingen == 0) && ($disin == 0) && ($ensen == 0) && ($medic == 0) ) {
            $res = "Selecciona al menos un área de interés";
        } else {
            if (empty($telefono || empty($tipoBeca))) {
                if (empty($telefono) || $telefono == "") {
                    $res = "Ingresa un núemro telefónico";
                } else {
                    $res = "Ingresa un tipo de beca";
                }
            } else {
                $res = 1;
            }
        }

        return $res;
    }

    public function validateSchools($pos, $posc, $uni, $unic, $pre, $prec, $sec, $secc) {
        if (empty($pos) && empty($uni) && empty($pre) && empty($sec)) {
            $msg = "Ingresa al menos una escuela";
            $status = 0;
        } else {
            if (!empty($pos) && empty($posc)) {
                $msg = "Ingresa tu calificación del posgrado";
                $status = 0;
            } elseif (!empty($uni) && empty($unic)) {
                $msg = "Ingresa tu calificación de la universidad";
                $status = 0;
            } elseif (!empty($pre) && empty($prec)) {
                $msg = "Ingresa tu calificación de la preparatoria";
                $status = 0;
            } elseif (!empty($sec) && empty($secc)) {
                $msg = "Ingresa tu calificación de la secundaria";
                $status = 0;
            } else {
                $msg = "Ok";
                $status = 1;
            }
        }

        if ($status === 1) {
            return 1;
        } else {
            return $msg;
        }
    }
}

if (isset($_POST['get'])) {
    $get = $_POST['get'];
    $u = new Usuario();

    switch ($get) {
        case "getProfile":
            echo $u->getProfile();
            break;
        case "updateHistorial":
            echo $u->updateHistorial($_POST);
            break;
        case "updateIntereses":
            echo $u->updateIntereses($_POST);
            break;
        default:
            header("Location: ../../");
            break;
    }
}