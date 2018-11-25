<?php
	if (isset($_SESSION["usuario"])) {
			if (!(strtoupper($_SESSION["usuario"]) == $usuario AND $_SESSION["pass"] == $contrasena)) {
				header('Location: admin.php');
	    	}
		} else { header('Location: admin.php'); }
?>