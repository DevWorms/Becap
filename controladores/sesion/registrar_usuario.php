<?php
require dirname(__FILE__) . "/../datos/conexion.php";

/*function notificacion($msj) {
    echo
        "<script>
            alert('" . $msj . "');
        </script>";
}*/

function validateEmail($email) {
    $conn = Conectar::get_Conexion();
    $query = "SELECT Mail_Usuario FROM becap_db.usuarios WHERE Mail_Usuario = :email";
    $stm = $conn->prepare($query);
    $stm->bindParam(":email", $email, PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchAll();

    if (count($result) > 0) {
        return (count($result[0]['Mail_Usuario']) == 1) ? false : true;
    } else{
        return true;
    }
}

function registrarUsuario($correo,$password){
    $response = ["estado" => 0];
    $pwd = password_hash($password, PASSWORD_DEFAULT);
    
    if (validateEmail($correo)) {
            try {
                $conexion = Conectar::get_Conexion();

                $sql = "INSERT INTO becap_db.usuarios (Mail_Usuario, Pwd_Usuario) VALUES (:correo, :pwd)";

                $resultado = $conexion->prepare($sql);
                $bolInserto= $resultado->execute(array(":correo" => $correo, ":pwd" => $pwd));
                $id = $conexion->lastInsertId();

                session_start();
                $_SESSION["correo"] = $correo;
                $_SESSION["first_time"] = true;
                $_SESSION["id_usuario"] = $id;
                session_write_close();

                $resultado->closeCursor();
                if($bolInserto){
                    $response["estado"] = 1;
                    $response["mensaje"] = "Registro exitoso";
                }else{
                    $response["estado"] = 0;
                    $response["mensaje"] = "No se pudo concretar el registro";
                }
            } catch (Exception $ex) {
                $response["estado"] = 0;
                $response["mensaje"] = $ex->getMessage();
            }
        }else{
            $response["estado"] = 0;
            $response["mensaje"] = "Este correo ya se encuentra registrado";
        }

        return json_encode($response);
}

if (isset($_POST['get'])) {
    $get = $_POST['get'];
    switch ($get) {
        case 'registrarUsuario':
            echo registrarUsuario($_POST["correo"],$_POST["password"]);
            break;        
        default:
        $response = ["estado"=>0];
        $response["mensaje"] = "Peticion no reconocida";
        echo json_encode($response);
            break;
    }
}

?>