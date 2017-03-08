<?php
	require ("../datos/conexion.php");
	session_start();	

	if (isset($_POST['enviar'])){
		$mail        =   $_SESSION["correo"];
        $apellido    =   $_POST["apellido"];
		$fecha       =   $_POST["fecha"]; 
		$pais        = 	 $_POST["pais"]; 
		$ciudad      =	 $_POST["ciudad"]; 
		
		if ($_POST["estudias"] == "Si"){
		$estudias = 1;	
		}else{
			$estudias = 0;	
		}
		
		$posgra           = $_POST["posgrado"];
		$posgraPromedio   = $_POST["posgraPromedio"];

		$uni           = $_POST["universidad"];
		$uniPromedio   = $_POST["uniPromedio"];
		
		$prepa          = $_POST["preparatoria"];
		$prepaPromedio  = $_POST["prepaPromedio"];
		
		$secu           = $_POST["secundaria"];
		$secuPromedio   = $_POST["secuPromedio"];
		

			$conexion = Conectar::get_Conexion();	

			$sql="UPDATE becap_db.usuarios SET   Apellidos_Usuario = :apellido, 
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
			
			$resultado=$conexion->prepare($sql);		

			$resultado->execute(array(":apellido"      =>$apellido, 
									  ":fecha"         =>$fecha, 
									  ":pais"          =>$pais,
									  ":ciudad"        =>$ciudad, 
									  ":estudias"      =>$estudias, 
									  ":posgrado"   =>$posgra, 
									  ":posPromedio" =>$posPromedio,
									  ":universidad"=>$uni,
									  ":uniPromedio"=>$uniPromedio, 
									  ":prepa"         =>$prepa, 
									  ":prepaPromedio" =>$prepaPromedio, 
									  ":secu"          =>$secu, 
									  ":secuPromedio"  =>$secuPromedio,
									  ":mail"          =>$mail));

			session_start();
			
			$_SESSION["nombreCompleto"] = $_SESSION["nombre"] . ' ' . $apellido;
		
			header('location: ../../informacion.php');

			$resultado->closeCursor();
}

?>