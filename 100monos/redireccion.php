<?php
	if (isset($_SESSION["uname"])) {
			if (!(strtoupper($_SESSION["uname"]) == $usuario AND $_SESSION["pass"] == $contrasena)) {
				header('Location: admin.php');
	    	}
		} else { header('Location: admin.php'); }
?>