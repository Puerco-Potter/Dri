<?php
		require('conexion.php');       
		$mensaje="";
			if (isset($_SESSION["usuario"])) {
				if (strtoupper($_SESSION["usuario"]) == $usuario AND $_SESSION["pass"] == $contrasena ) {
					header('Location: lista_parientes.php');
		    	}	
		    }	

			if (isset($_POST['confirmar'])) {
		        if (strtoupper($_POST["usuario"]) == $usuario AND $_POST['pass'] == $contrasena) {
		        	$_SESSION["pass"] = $_POST['pass'];
					$_SESSION["usuario"] = strtoupper($_POST["usuario"]);	
		        header("Refresh:0");
		        } else {
		        	$mensaje="Usuario y/o Contraseña Incorrectos";
		        }
		    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>DRI - Ingreso</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<LINK href="bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="footable\js\footable.min.js"></script>
	<LINK href="footable\css\footable.standalone.min.css" rel="stylesheet" type="text/css">
	<LINK href="fontawesome\css\font-awesome.min.css" rel="stylesheet" type="text/css">
	
</head>
<body class="bg-dark">
	<div class="d-flex justify-content-center">
			<img style="width: 25%;" src="imagenes\it.png">
	</div>
	<br>

	<div class="card container">
		<form method="post">
			<div class="form-group">
				<label for="usuario">Usuario</label>
		    	<input type="string" class="form-control" id="usuario" name="usuario" placeholder="Ingrese Usuario">
			</div>
			<div class="form-group">
		    	<label for="pass">Contraseña</label>
		    	<input type="password" class="form-control" id="pass" name="pass" placeholder="Ingrese Contraseña">
			</div>
			<button id="confirmar" name="confirmar" type="submit" class="btn btn-primary">Ingresar</button>
			<?php
				echo $mensaje;
			?>
		</form>

		
	</div>
	
</body>

</html>