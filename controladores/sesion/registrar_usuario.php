<?php
require dirname(__FILE__) . "/../datos/conexion.php";

function notificacion($msj) {
    echo
        "<script>
            alert('" . $msj . "');
        </script>";
}

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

if (isset($_POST['enviar'])) {
    $correo = $_POST["correo"];
    $pwd = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if ($correo == null || $pwd == null) {
        notificacion($msj = "Por favor complete todos los campos");
    } else {

        if (validateEmail($correo)) {
            try {
                $conexion = Conectar::get_Conexion();

                $sql = "INSERT INTO becap_db.usuarios (Mail_Usuario, Pwd_Usuario) VALUES (:correo, :pwd)";

                $resultado = $conexion->prepare($sql);
                $resultado->execute(array(":correo" => $correo, ":pwd" => $pwd));
                $id = $conexion->lastInsertId();

                session_start();
                $_SESSION["correo"] = $correo;
                $_SESSION["first_time"] = true;
                $_SESSION["id_usuario"] = $id;
                
                

                session_write_close();

                $resultado->closeCursor();

                header('location: ../../perfil.php');
            } catch (Exception $ex) {
                notificacion($ex->getMessage());
            }
        } else {
            notificacion("El email ya se encuentra registrado");
        }
    }
}

?>