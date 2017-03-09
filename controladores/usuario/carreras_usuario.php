<?php
    function notificacion($msj) {
        echo
            "<script>
                alert('" . $msj . "');
            </script>";
    }

    require dirname(__FILE__) . "/../datos/conexion.php";
	session_start();

	$admin = 0;
	$aboga = 0;
	$psico = 0;
	$conta = 0;
	$econo = 0;
	$finan = 0;
	$arthu = 0;
	$arqui = 0;
	$ingen = 0;
	$disin = 0;
	$ensen = 0;
	$medic = 0;

	if (isset($_POST['admin']))
		$admin = 1;
	if (isset($_POST['aboga']))
		$aboga = 1;
	if (isset($_POST['psico']))
		$psico = 1;
	if (isset($_POST['conta']))
		$conta = 1;
	if (isset($_POST['econo']))
		$econo = 1;
	if (isset($_POST['finan']))	
		$finan = 1;
	if (isset($_POST['arthu']))
		$arthu = 1;
	if (isset($_POST['arqui']))
		$arqui = 1;
	if (isset($_POST['ingen']))
		$ingen = 1;
	if (isset($_POST['disin']))
		$disin = 1;
	if (isset($_POST['ensen']))
		$ensen = 1;
	if (isset($_POST['medic']))
		$medic = 1;

	$usuario = $_SESSION["id_usuario"];
	$telefono    = $_POST["telefono"];
	$tipoBeca = $_POST["tipo_beca"];
	if (!empty($usuario) && !empty($tipoBeca)) {
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

            header('location: ../../misbecas.php');
        } else {
            notificacion("Selecciona al menos un área de interés");
            header("Location: ../../informacion.php");
        }
    } else {
        notificacion("Ingresa un núemro telefónico y un tipo de beca");
        header("Location: ../../informacion.php");
    }

?>