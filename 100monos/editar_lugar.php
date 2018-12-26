<?php
        require('conexion.php');

        require('redireccion.php');
        
        $sql4 = "SELECT * FROM ubicacion WHERE id=" . $_GET['id'];
        $ubicacion1 = $conn->query($sql4);
        $ubicacion = mysqli_fetch_assoc($ubicacion1);
        
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
                echo "<h2 class='text-muted'>Lugar Editado</h2>";
            }
        ?>
        <div class="form-group">
			<a class="btn btn-secondary float-right" role="button" href="lista_lugares.php">Volver a la lista</a>
		</div>
        <h3>Editar un Lugar</h3>
        <form method="post">
			<div class="form-group">
				<label for="usuario">Nombre:</label>
		    	<input type="string" class="form-control" id="nombre" name="nombre" value="<?php echo $ubicacion['nombre'] ?>">
                <label for="color">Color de los parientes:</label>
		    	<input type="color" class="form-control" id="color" name="color" value="<?php echo $ubicacion['colorlinea'] ?>">
                <button id="confirmar" name="confirmar" type="submit" class="btn btn-success">Guardar Cambios</button>
                
            </div>
		</form>
    </div>

    <?php
        if (isset($_POST['confirmar'])) {
            $sql_subida = "UPDATE `ubicacion` SET 
            `nombre`='" . $_POST['nombre'] ."',
            `colorlinea`='" . $_POST['color'] ."' 
            WHERE id=" . $_GET['id'];
            $resultado = $conn->query($sql_subida);
        }
	?>

</body>
</html>