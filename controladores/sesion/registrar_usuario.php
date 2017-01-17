<?php
	require ("../datos/conexion.php");

	$nombre= $_POST["name"];
	$correo= $_POST["correo"];
	$pwd=password_hash($_POST["password"],PASSWORD_DEFAULT);
	
	try{
		$conexion = Conectar::get_Conexion();	

		$sql="INSERT INTO usuarios (Nombre_Usuario, Mail_Usuario, Pwd_Usuario) 
				   VALUES 		   (nombre = ?,correo = ?,contrasenia = ?)";
		
		$resultado=$conexion->prepare($sql);		

		$resultado->bindParam(1,$nombre);
		$resultado->bindParam(2,$correo);
		$resultado->bindParam(3,$pwd);

		$resultado->execute();		
		$resultado->fetch();
	
		header('location: ../../prueba.php');

		$resultado->closeCursor();

	}catch(Exception $e){		

		echo $e -> getMessage();

	}finally{
		
		$base=null;
		
	}

?>