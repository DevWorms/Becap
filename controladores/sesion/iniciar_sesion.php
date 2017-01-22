<?php
require ("../datos/conexion.php");

if(isset($_POST["enviar"])){
	
	try{
		$conexion = Conectar::get_Conexion();
		$sql="SELECT * FROM becap_db.usuarios WHERE Mail_Usuario = :correo";
		
		$resultado=$conexion->prepare($sql);
		
		$correo=htmlentities(addslashes($_POST["correo"]));
		$password=htmlentities(addslashes($_POST["password"]));				
		
		$resultado->execute(array(":correo"=>$correo));
		
		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
		
		$hash = $registro['Pwd_Usuario'];
		
		$verify=password_verify($_POST["password"],$hash);
		
			if($verify){				
						if(isset($_POST["checkbox"])){
							
							setcookie("correo", $_POST["correo"], time()+86400);				
							
							session_start();
								$_SESSION["nombre"]=$registro['Nombre_Usuario'];
								$_SESSION["correo"]=$registro['Mail_Usuario'];
							header("location:../../perfil.php");

						}else{
								session_start();
								$_SESSION["nombre"]=$registro['Nombre_Usuario'];
								$_SESSION["correo"]=$registro['Mail_Usuario'];
								header("location:../../perfil.php");
							} 	
				}else{
						
						echo '<script type="text/javascript">alert("ERROR - Usuario y Contraseña erroneos");';
						echo "  window.location.href='../../index.php'"; 
						echo "</script>";
						
					}
				
		}catch(Exception $e){
			die("Error " . $e->getMessage());
			}
	}
?>