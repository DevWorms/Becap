<?php
require dirname(__FILE__) . "/../datos/conexion.php";
include dirname(__FILE__) . "/Usuario.php";
session_start();

function notificacion($msj, $location) {
    echo '<script type="text/javascript">alert("' . $msj . '");';
    echo "window.location.href='" . $location . "'";
    echo "</script>";
}

$mail = $_SESSION["correo"];
$apellido = $_POST["apellido"];
$fecha = $_POST["fecha"];
$pais = $_POST["pais"];
$ciudad = $_POST["ciudad"];

if ($_POST["estudias"] == "Si")
    $estudias = 1;
elseif ($_POST["estudias"] == "No")
    $estudias = 2;

if (!empty($apellido) && !empty($fecha) && !empty($pais) && !empty($ciudad) && !empty($estudias)) {
    $u = new Usuario();
    $posgra = $_POST["posgrado"];
    $posgraPromedio = $_POST["posgraPromedio"];

    $uni = $_POST["universidad"];
    $uniPromedio = $_POST["uniPromedio"];

    $prepa = $_POST["preparatoria"];
    $prepaPromedio = $_POST["prepaPromedio"];

    $secu = $_POST["secundaria"];
    $secuPromedio = $_POST["secuPromedio"];

    $validate = $u->validateSchools($posgra, $posgraPromedio, $uni, $uniPromedio, $prepa, $prepaPromedio, $secu, $secuPromedio);

    if ($validate === 1) {
        $conexion = Conectar::get_Conexion();

        $sql = "UPDATE becap_db.usuarios SET   Apellidos_Usuario = :apellido, 
												 Fecha_Nacimiento  = :fecha, 
												 Pais              = :pais, 
												 Ciudad            = :ciudad, 
												 Estudia           = :estudias, 

												 Nombre_Posgrado       = :posgrado, 
												 Promedio_Pos          = :posPromedio,
												 Nombre_Universidad    = :universidad,	
												 Promedio_Uni    = :uniPromedio, 
												 Nombre_Prepa      = :prepa, 
												 Promedio_Prepa    = :prepaPromedio,
												 Nombre_Secundaria = :secu, 
												 Promedio_Secundaria = :secuPromedio 
				  WHERE Mail_Usuario = :mail";

        $resultado = $conexion->prepare($sql);

        $resultado->execute(array(":apellido" => $apellido,
            ":fecha" => $fecha,
            ":pais" => $pais,
            ":ciudad" => $ciudad,
            ":estudias" => $estudias,
            ":posgrado" => $posgra,
            ":posPromedio" => $posgraPromedio,
            ":universidad" => $uni,
            ":uniPromedio" => $uniPromedio,
            ":prepa" => $prepa,
            ":prepaPromedio" => $prepaPromedio,
            ":secu" => $secu,
            ":secuPromedio" => $secuPromedio,
            ":mail" => $mail));

        session_start();

        $_SESSION["nombreCompleto"] = $_SESSION["nombre"] . ' ' . $apellido;

        header('location: ../../informacion.php');

        $resultado->closeCursor();
    } else {
        notificacion($validate, "../../perfil.php");
    }
} else {
    notificacion("Completa todos los datos", "../../perfil.php");
}


?>