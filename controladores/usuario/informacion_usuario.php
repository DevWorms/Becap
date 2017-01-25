<<?php
	require ("../datos/conexion.php");
	session_start();
	
	function notificacion($msj){
        echo 
        "<script>
            alert('" . $msj . "');
        </script>";
    }		

	if (isset($_POST['enviar'])){
		$mail=   		 $_SESSION["correo"];
        $apellido= 		 $_POST["apellido"];
		$fecha= 		 $_POST["fecha"]; 
		$pais= 			 $_POST["pais"]; 
		$ciudad= 		 $_POST["ciudad"]; 
		
		if($_POST["estudias"] == "si" || $_POST["estudias"] == "Si" || $_POST["estudias"] == "SI" || $_POST["estudias"] == "sI"){
		$estudias = 1;	
		}else{
			$estudias = 0;	
		}
		
		$gradoActual=    $_POST["gradoActual"];
		$escuelaActual=  $_POST["escuelaActual"];
		$promedioActual= $_POST["promedioActual"];
		
		$prepa= 		 $_POST["prepa"];
		$prepaCiudad=    $_POST["prepaCiudad"];
		$prepaPromedio=  $_POST["prepaPromedio"];
		
		$secu= 			 $_POST["secu"];
		$secuCiudad= 	 $_POST["secuCiudad"];
		$secuPromedio= 	 $_POST["secuPromedio"];
		

			$conexion = Conectar::get_Conexion();	

			$sql="UPDATE becap_db.usuarios SET   Apellidos_Usuario = :apellido, 
												 Fecha_Nacimiento = :fecha, 
												 Pais = :pais, 
												 Ciudad = :ciudad, 
												 Estudia = :estudias, 
												 Grado = :gradoActual, 
												 Escuela = :escuelaActual, 
												 Promedio_Actual = :promedioActual, 
												 Nombre_Prepa = :prepa, 
												 Ciudad_Prepa = :prepaCiudad, 
												 Promedio_Prepa = :prepaPromedio, 
												 Nombre_Secundaria = :secu, 
												 Ciudad_Secundaria = :secuCiudad, 
												 Promedio_Secundaria = :secuPromedio 
				
						WHERE Mail_Usuario = :mail";
			
			$resultado=$conexion->prepare($sql);		

			$resultado->execute(array(":apellido"=>$apellido, 
									  ":fecha"=>$fecha, 
									  ":pais"=>$pais,
									  ":ciudad"=>$ciudad, 
									  ":estudias"=>$estudias, 
									  ":gradoActual"=>$gradoActual, 
									  ":escuelaActual"=>$escuelaActual,
									  ":promedioActual"=>$promedioActual, 
									  ":prepa"=>$prepa, 
									  ":prepaCiudad"=>$prepaCiudad, 
									  ":prepaPromedio"=>$prepaPromedio, 
									  ":secu"=>$secu, 
									  ":secuCiudad"=>$secuCiudad, 
									  ":secuPromedio"=>$secuPromedio,
									  ":mail"=>$mail));

			session_start();
			
			$_SESSION["nombreCompleto"] = $_SESION["nombre"] . ' ' . $apellido;
		
			header('location: ../../prueba.php');

			$resultado->closeCursor();
}

?>