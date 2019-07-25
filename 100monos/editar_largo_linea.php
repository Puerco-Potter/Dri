<?php
        require('conexion.php');

        require('redireccion.php');
        
        $sql4 = "SELECT * FROM personalizacion";
        $personalizacion1 = $conn->query($sql4);
        $personalizacion = mysqli_fetch_assoc($personalizacion1);
        $codigo= "largo_linea";
        $largo= $personalizacion[$codigo];
        
        
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
                echo "<h2 class='text-muted'>Largo Minimo de Linea Editado</h2>";
            }
        ?>
        <div class="form-group">
			<a class="btn btn-secondary float-right" role="button" href="personalizar.php">Volver a la lista</a>
		</div>
        <form method="post">
			<div class="form-group">
				<h2>Largo Minimo de Linea</h2>
                <label for="color">Valor:</label>
		    	<input type="number" class="form-control" id="largo" name="largo" value="<?php echo $largo ?>">
                <button id="confirmar" name="confirmar" type="submit" class="btn btn-success">Guardar Cambios</button>
                
            </div>
		</form>
    </div>

    <?php
        if (isset($_POST['confirmar'])) {
            $sql_subida = "UPDATE `personalizacion` SET 
            `largo_linea`='" . $_POST["largo"] ."'";
            $resultado = $conn->query($sql_subida);
        }
	?>

</body>
</html>