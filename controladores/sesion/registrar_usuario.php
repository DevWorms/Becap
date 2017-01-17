<?php
	require ("../datos/conexion.php");

	
	
	function notificacion($msj){
        echo 
        "<script>
            alert('" . $msj . "');
        </script>";
    }		

	if (isset($_POST['enviar'])){
        $nombre= $_POST["name"];
		$correo= $_POST["correo"];
		$pwd=password_hash($_POST["password"],PASSWORD_DEFAULT);

	        if ($nombre == null || $correo == null || $pwd == null){
	            notificacion($msj = "Por favor complete todos los campos");
	            header("Location: ../../");
	        }else{

				$conexion = Conectar::get_Conexion();	

				$sql="INSERT INTO becap_db.usuarios (Nombre_Usuario, Mail_Usuario, Pwd_Usuario) VALUES (:name, :correo, :pwd)";
				
				$resultado=$conexion->prepare($sql);		

				$resultado->execute(array(":name"=>$nombre, ":correo"=>$correo, ":pwd"=>$pwd));
				
				
			
				header('location: ../../prueba.php');

				$resultado->closeCursor();
			}
	}

?>