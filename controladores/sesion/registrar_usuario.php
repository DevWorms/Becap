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

    return (count($result[0]['Mail_Usuario']) == 1) ? false : true;
}

if (isset($_POST['enviar'])) {
    $correo = $_POST["correo"];
    $pwd = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if ($correo == null || $pwd == null) {
        notificacion($msj = "Por favor complete todos los campos");
        //header("Location: ../../");
    } else {

        if (validateEmail($correo)) {
            $conexion = Conectar::get_Conexion();

            $sql = "INSERT INTO becap_db.usuarios (Mail_Usuario, Pwd_Usuario) VALUES (:correo, :pwd)";

            $resultado = $conexion->prepare($sql);

            $resultado->execute(array(":correo" => $correo, ":pwd" => $pwd));

            session_start();

            $_SESSION["correo"] = $correo;
            $_SESSION["first_time"] = true;

            //header('location: ../../perfil.php');

            $resultado->closeCursor();
        } else {
            notificacion("El email ya se encuentra registrado");
            //header("Location: ../../");
        }
    }
}

?>