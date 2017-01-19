<?php

	function crear_sesion(){

		$sql2="SELECT * FROM becap_db.usuarios WHERE Mail_Usuario = :correo";

		$conexion2 = Conectar::get_Conexion();

		$resultado2=$conexion2->prepare($sql2);

		$resultado2->execute(array(":correo"=>$correo));

		$array_sesion = $resultado2->fetch(PDO::FETCH_ASSOC);

		session_start();
		
		$_SESSION["nombre"]=$array_sesion['Nombre_Usuario'];
	}
?>				