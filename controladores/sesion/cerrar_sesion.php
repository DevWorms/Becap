<?php
	session_start();
	
	session_destroy();
	
	setcookie("id","xx",time()-1,'/');

	header("location:../../index.php");
?>