<?php
require ("../datos/conexion.php");

if(isset($_POST["enviar"])){
	
	try{
		$base = ConexionBD::obtenerInstancia()->obtenerBD();
		$sql="SELECT * FROM usuarios WHERE usuario = :mail_usuario";
		
		$resultado=$base->prepare($sql);
		
		$user=htmlentities(addslashes($_POST["correo"]));
		$password=htmlentities(addslashes($_POST["password"]));				
		
		$resultado->execute(array(":mail_usuario"=>$user));
		
		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
		/*
		$hash = $registro['password'];
		
		$verify=password_verify($_POST["userPassword"],$hash);
		*/
			if($verify){
						  if(isset($_POST["checkbox"])){
											
											setcookie("nombre_usuario", $_POST["userName"], time()+86400);					
											
											session_start();
											$_SESSION["sesion"]=$_POST["userName"];
											header("location:usuarios_registrados.php");
				
										}else{
												session_start();
												$_SESSION["sesion"]=$_POST["userName"];
												header("location:usuarios_registrados.php");
												}     
				}else{
						header("location:hola.php");
	
						/*
						echo '<script type="text/javascript">alert("ERROR - Usuario y Contraseña erroneos");';
						echo "  window.location.href='login.php'"; 
						echo "</script>";
						*/
					}
				
		}catch(Exception $e){
			die("Error " . $e->getMessage());
			}
	}
?>