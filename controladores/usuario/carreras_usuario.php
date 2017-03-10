<?php
    function notificacion($msj) {
        echo
            "<script>
                alert('" . $msj . "');
            </script>";
    }

    require dirname(__FILE__) . "/../datos/conexion.php";
	session_start();

    $admin = (isset($data['admin'])) ? 1 : 0;
    $aboga = (isset($data['aboga'])) ? 1 : 0;
    $psico = (isset($data['psico'])) ? 1 : 0;
    $conta = (isset($data['conta'])) ? 1 : 0;
    $econo = (isset($data['econo'])) ? 1 : 0;
    $finan = (isset($data['finan'])) ? 1 : 0;
    $arthu = (isset($data['arthu'])) ? 1 : 0;
    $arqui = (isset($data['arqui'])) ? 1 : 0;
    $ingen = (isset($data['ingen'])) ? 1 : 0;
    $disin = (isset($data['disin'])) ? 1 : 0;
    $ensen = (isset($data['ensen'])) ? 1 : 0;
    $medic = (isset($data['medic'])) ? 1 : 0;

	$usuario = $_SESSION["id_usuario"];
	$telefono    = $_POST["telefono"];
	$tipoBeca = $_POST["tipo_beca"];
	if (!empty($usuario) && !empty($tipoBeca) && !empty($telefono)) {
	    if ( ($admin == 1) || ($aboga == 1) || ($psico == 1) || ($conta == 1) || ($econo == 1) || ($finan == 1) ||
            ($arthu == 1) || ($arqui == 1) || ($ingen == 1) || ($disin == 1) || ($ensen == 1) || ($medic == 1) ) {
            $conexion = Conectar::get_Conexion();

            $sql = "INSERT INTO becap_db.carreras_usuario 
		(id_usuario, psico, conta, econo, finan, arthu, arqui, ingen, disin, ensen, medic)
		VALUES (:id_usuario, :psico, :conta, :econo, :finan, :arthu, :arqui, :ingen, :disin, :ensen, :medic)";

            $resultado = $conexion->prepare($sql);

            $resultado->execute(array(":id_usuario" => $usuario, ":psico" => $psico, ":conta" => $conta, ":econo" => $econo, ":finan" => $finan, ":arthu" => $arthu, ":arqui" => $arqui, ":ingen" => $ingen, ":disin" => $disin, ":ensen" => $ensen, ":medic" => $medic));

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
            notificacion("Selecciona al menos un área de interés");
            header("Location: ../../informacion.php");
        }
    } else {
        notificacion("Ingresa un núemro telefónico y un tipo de beca");
        header("Location: ../../informacion.php");
    }

?>