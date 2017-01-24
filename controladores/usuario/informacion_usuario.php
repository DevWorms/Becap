<<?php
	require ("../datos/conexion.php");

	function notificacion($msj){
        echo 
        "<script>
            alert('" . $msj . "');
        </script>";
    }		

	if (isset($_POST['enviar'])){
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

			$sql="INSERT INTO becap_db.usuarios (Apellidos_Usuario, Fecha_Nacimiento, 
												 Pais, Ciudad, Estudia, Grado, Escuela, 
												 Promedio_Actual, Nombre_Prepa, Ciudad_Prepa, 
												 Promedio_Prepa, Nombre_Secundaria, 
												 Ciudad_Secundaria, Promedio_Secundaria) 
				
						VALUES (:apellido,      :fecha,         :pais, 
								:ciudad,        :estudias,      
								:gradoActual,   :escuelaActual, :promedioActual, 
								:prepa,         :prepaCiudad,   :prepaPromedio, 
								:secu,          :secuCiudad,    :secuPromedio)";
			
			$resultado=$conexion->prepare($sql);		

			$resultado->execute(array(":apellido"=>$nombre, ":fecha"=>$correo, ":pais"=>$pwd,
									  ":ciudad"=>$ciudad, ":estudias"=>$estudias, ":gradoActual"=>$gradoActual, ":escuelaActual"=>$escuelaActual,
									  ":promedioActual"=>$promedioActual, ":prepa"=>$prepa, ":prepaCiudad"=>$prepaCiudad, 
									  ":prepaPromedio"=>$prepaPromedio, ":secu"=>$secu, ":secuCiudad"=>$secuCiudad, ":secuPromedio"=$secuPromedio));

			session_start();
			
			$_SESSION["nombreCompleto"]=$_SESION["nombre"] . $apellido;
		
			header('location: ../../prueba.php');

			$resultado->closeCursor();
}

?>