<?php
        require('conexion.php');

        require('redireccion.php');
        
        $sql1 = "SELECT * FROM pariente";
        $todos = $conn->query($sql1);
        
        $sql2 = "SELECT * FROM pais";
        $paises = $conn->query($sql2);
        
        $sql3 = "SELECT * FROM ubicacion";
        $lugares = $conn->query($sql3);
?>
<!DOCTYPE html>
<html>
<head>
	<title>DRI</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<LINK href="bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="//code.jquery.com/jquery.min.js"></script>
	<LINK href="footable\css\footable.standalone.min.css" rel="stylesheet" type="text/css">
	<LINK href="fontawesome\css\font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body class="bg-dark">
	<div class="d-flex justify-content-center">
			<img style="width: 275px; height: 185px" src="imagenes\it.png">
	</div>
	<br>
	<div class="container card">
        <?php
            if (isset($_POST['confirmar'])) {
                echo "<h2 class='text-muted'>Lugar Creado</h2>";
            }
        ?>
        <div class="form-group">
			<a class="btn btn-secondary float-right" role="button" href="lista_lugares.php">Volver a la lista</a>
		</div>
        <h3>Creacion de Lugar</h3>
        <form method="post">
			<div class="form-group">
				<label for="usuario">Nombre:</label>
		    	<input type="string" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre...">
                <label for="color">Color de los parientes:</label>
		    	<input type="color" class="form-control" id="color" name="color">
                <label for="color">Color de texto:</label>
		    	<input type="color" class="form-control" id="texto" name="texto">
                <button id="confirmar" name="confirmar" type="submit" class="btn btn-success">Crear Lugar</button>
                
            </div>
		</form>
    </div>

    <?php
        if (isset($_POST['confirmar'])) {

            $sql_subida = "INSERT INTO `ubicacion`
                            (`nombre`, `colorlinea`, `texto`)
                            VALUES 
                            ('" . $_POST['nombre'] ."', '". $_POST['color'] . "', '". $_POST['texto'] . "')";
            $resultado = $conn->query($sql_subida);
        }
	?>

</body>
</html>