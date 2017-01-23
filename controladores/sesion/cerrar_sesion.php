<?php
	session_start();
	
	session_destroy();
	
	setcookie("nombre","xx",time()-1,'/');
	setcookie("correo","xx",time()-1,'/');

	header("location:../../index.php");
?>