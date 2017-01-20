<?php
	session_start();
	
	session_destroy();
	
	setcookie("nombre_usuario","xx",time()-1);

	header("location:../../index.php");
?>