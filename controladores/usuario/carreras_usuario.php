<?php
    function notificacion($msj, $location) {
        echo '<script type="text/javascript">alert("' . $msj . '");';
        echo "window.location.href='" . $location . "'";
        echo "</script>";
    }

    require dirname(__FILE__) . "/../datos/conexion.php";
	session_start();

    $admin = (isset($_POST['admin'])) ? 1 : 0;
    $aboga = (isset($_POST['aboga'])) ? 1 : 0;
    $psico = (isset($_POST['psico'])) ? 1 : 0;
    $conta = (isset($_POST['conta'])) ? 1 : 0;
    $econo = (isset($_POST['econo'])) ? 1 : 0;
    $finan = (isset($_POST['finan'])) ? 1 : 0;
    $arthu = (isset($_POST['arthu'])) ? 1 : 0;
    $arqui = (isset($_POST['arqui'])) ? 1 : 0;
    $ingen = (isset($_POST['ingen'])) ? 1 : 0;
    $disin = (isset($_POST['disin'])) ? 1 : 0;
    $ensen = (isset($_POST['ensen'])) ? 1 : 0;
    $medic = (isset($_POST['medic'])) ? 1 : 0;

	$usuario = $_SESSION["id_usuario"];
	$telefono = $_POST["telefono"];
	$tipoBeca = $_POST["tipo_beca"];
	if (!empty($usuario) && !empty($tipoBeca) && !empty($telefono)) {
	    if ( ($admin == 1) || ($aboga == 1) || ($psico == 1) || ($conta == 1) || ($econo == 1) || ($finan == 1) ||
            ($arthu == 1) || ($arqui == 1) || ($ingen == 1) || ($disin == 1) || ($ensen == 1) || ($medic == 1) ) {
            $conexion = Conectar::get_Conexion();

            $sql = "INSERT INTO becap_db.carreras_usuario 
		(id_usuario, admin, aboga, psico, conta, econo, finan, arthu, arqui, ingen, disin, ensen, medic)
		VALUES (:id_usuario, :admin, :aboga, :psico, :conta, :econo, :finan, :arthu, :arqui, :ingen, :disin, :ensen, :medic)";

            $resultado = $conexion->prepare($sql);

            $resultado->execute(array(":id_usuario" => $usuario, ":admin" => $admin, ":aboga" => $aboga, ":psico" => $psico, ":conta" => $conta, ":econo" => $econo, ":finan" => $finan, ":arthu" => $arthu, ":arqui" => $arqui, ":ingen" => $ingen, ":disin" => $disin, ":ensen" => $ensen, ":medic" => $medic));

            $resultado->closeCursor();


            $conexion2 = Conectar::get_Conexion();

            $sql2 = "UPDATE becap_db.usuarios SET  Telefono_contacto = :telefono, tipo_beca = :tipoBeca
		  WHERE ID_Usuario = :usuario";

            $resultado2 = $conexion2->prepare($sql2);

            $resultado2->execute(array(":telefono" => $telefono,
                ":tipoBeca" => $tipoBeca,
                ":usuario" => $usuario));

            $resultado2->closeCursor();
            header('location: ../../oportunidades.php');
        } else {
            notificacion("Selecciona al menos un área de interés", "../../informacion.php");
        }
    } else {
        notificacion("Ingresa un núemro telefónico y un tipo de beca", "../../informacion.php");
    }

?>