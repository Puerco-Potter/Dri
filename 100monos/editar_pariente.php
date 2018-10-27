<!DOCTYPE html>
<html>
<head>
	<title>DRI</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<LINK href="bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="//code.jquery.com/jquery.min.js"></script>
	<LINK href="footable\css\footable.standalone.min.css" rel="stylesheet" type="text/css">
	<LINK href="fontawesome\css\font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<?php
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="drinelmo_arbol";
		$conn = new mysqli($servername, $username, $password, $dbname);

		$sql = "SELECT * FROM pariente p1 ORDER BY nombre";
		$result = $conn->query($sql);

		if (isset($_SESSION["usuario"])) {
			if ($_SESSION["usuario"] == "admin" AND $_SESSION["pass"] == "admin" ) {
	    	}else{
	    	echo 'ingresado';
				header('Location: admin.php');
			}
        }
        
        $sql1 = "SELECT * FROM pariente";
        $todos = $conn->query($sql1);
        
        $sql2 = "SELECT * FROM pais";
        $paises = $conn->query($sql2);
        
        $sql3 = "SELECT * FROM ubicacion";
		$lugares = $conn->query($sql3);
	?>

</head>
<body class="bg-dark">
	<div class="d-flex justify-content-center">
			<img style="width: 25%;" src="imagenes\it.png">
	</div>
	<br>
	<div class="container card">
        <h3>Creacion de Pariente Nuevo</h3>
        <form method="post">
			<div class="form-group">
				<label for="usuario">Nombre:</label>
		    	<input type="string" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre...">
			</div>
            <label for="usuario">Padre:</label>
            <input list="gente" class="form-control" id="padre" name="padre" type="search" placeholder="Nombre del Padre..." aria-label="Buscar"  autocomplete=off>
			<datalist id="gente">
                <?php
                    while( $persona = mysqli_fetch_assoc( $todos)){
                        echo '<option value="' . $persona["id"] . '">';
                            echo $persona["nombre"] . "(" . $persona["nacimiento"] . ")";
                        echo "</option>";
                    }; 
                ?>
            </datalist>
            <label for="pais">Origen:</label>
            <input list="paises" class="form-control" id="pais" name="pais" type="search" placeholder="Origen..." aria-label="Buscar"  autocomplete=off>
			<datalist id="paises">
                <?php
                    while( $pais = mysqli_fetch_assoc( $paises)){
                        echo '<option value="' . $pais["id"] . '">';
                            echo $pais["nombre"];
                        echo "</option>";
                    }; 
                ?>
            </datalist>
            <label for="pais">Ubicacion:</label>
            <input list="lugares" class="form-control" id="lugar" name="lugar" type="search" placeholder="Ubicacion..." aria-label="Buscar"  autocomplete=off>
			<datalist id="lugares">
                <?php
                    while( $lugar = mysqli_fetch_assoc( $lugares)){
                        echo '<option value="' . $lugar["id"] . '">';
                            echo $lugar["nombre"];
                        echo "</option>";
                    }; 
                ?>
            </datalist>
            <label for="nacimiento">Nacimiento:</label>
            <textarea class="form-control" id="nacimiento" name="nacimiento" placeholder="Nacimiento..."></textarea>
            <label for="muerte">Muerte:</label>
            <textarea class="form-control" id="muerte" name="muerte" placeholder="Muerte..."></textarea>
            <label for="comentario">Comentario:</label>
            <textarea class="form-control" id="comentario" name="comentario" placeholder="Comentario..."></textarea>

			<button id="confirmar" name="confirmar" type="submit" class="btn btn-primary">Crear</button>
		</form>
    </div>

</body>
</html>