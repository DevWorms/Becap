<?php
require dirname(__FILE__) . "/../datos/conexion.php";
session_start();

if (isset($_COOKIE["id"])) {
    try {
        $id = $_COOKIE["id"];
        $conexion = Conectar::get_Conexion();
        $sql = "SELECT * FROM becap_db.usuarios WHERE ID_Usuario = :id";

        $resultado = $conexion->prepare($sql);

        $resultado->execute(array(":id" => $id));

        $statement = $resultado->fetch(PDO::FETCH_ASSOC);

        $_SESSION["nombre"] = "";
        $_SESSION["nombreCompleto"] = "";
        if (!empty($statement['Nombre_Usuario'])) {
            $_SESSION["nombre"] = $statement['Nombre_Usuario'];
            $_SESSION["nombreCompleto"] = $statement['Nombre_Usuario'];
        }
        if (!empty($statement['Apellidos_Usuario'])) {
            $_SESSION["nombreCompleto"] .= ' ' . $statement['Apellidos_Usuario'];
        }
        $_SESSION["correo"] = $statement['Mail_Usuario'];
        $_SESSION["id_usuario"] = $statement['ID_Usuario'];

    } catch (Exception $e) {
        die("Error " . $e->getMessage());
    }
}

if ((!isset($_SESSION["id_usuario"]))) {
    header("location:index.php");
} else {
    try {
        $correo = $_SESSION["correo"];
        $conexion = Conectar::get_Conexion();
        $sql = "SELECT * FROM becap_db.usuarios WHERE Mail_Usuario = :correo";

        $resultado = $conexion->prepare($sql);

        $resultado->execute(array(":correo" => $correo));

        $statement = $resultado->fetch(PDO::FETCH_ASSOC);

        //$_SESSION["nombreCompleto"] = $statement['Nombre_Usuario'] . ' ' . $statement['Apellidos_Usuario'];
        $_SESSION["correo"] = $statement['Mail_Usuario'];
        $_SESSION["id_usuario"] = $statement['ID_Usuario'];


    } catch (Exception $e) {
        die("Error " . $e->getMessage());
    }
}
?>