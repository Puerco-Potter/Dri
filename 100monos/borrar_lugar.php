<?php
        require('conexion.php');

        require('redireccion.php');
        
        $sql1 = "SELECT * FROM pariente";
        $todos = $conn->query($sql1);
        
        $sql2 = "SELECT * FROM pais";
        $paises = $conn->query($sql2);
        
        $sql3 = "SELECT * FROM ubicacion";
        $lugares = $conn->query($sql3);
        
        $sql4 = "SELECT * FROM ubicacion WHERE id=" . $_GET['id'];
        $ubicacion1 = $conn->query($sql4);
        $ubicacion = mysqli_fetch_assoc($ubicacion1);

        $sql5 = "SELECT * FROM pariente WHERE padre_id=" . $_GET['id'];
        $hijos = $conn->query($sql5);
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
                echo "<h2 class='text-muted'>Lugar Borrado</h2>";
            }
        ?>
        <div class="form-group">
            <div class="float-right">
			    <a class="btn btn-secondary " role="button" href="lista_lugares.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver a la lista</a>
            </div>
        </div>
        <h3 class="bg-danger text-white">Esta a punto de borrar el siguiente lugar:</h3>
        <form method="post">
			<div class="form-group">
				<label for="usuario">Nombre:</label>
		    	<h3><?php echo $ubicacion['nombre'] ?></h3>
                <hr>
                <h3 class="bg-danger text-white">Solo presione Borrar si esta seguro. No podra deshacer esta accion.</h3>
                <button id="confirmar" name="confirmar" type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Borrar Lugar</button>
            </div>
		</form>
    </div>

    <?php
        if (isset($_POST['confirmar'])) {
            $sql_quitarorigen = "UPDATE `pariente` SET 
            `origen_id`= null
            WHERE origen_id=" . $_GET['id'];
            $resultado_quitarorigen = $conn->query($sql_quitarorigen);
            
            $sql_quitarubicacion = "UPDATE `pariente` SET 
            `radicado_id`= null
            WHERE radicado_id=" . $_GET['id'];
            $resultado_quitarubicacion = $conn->query($sql_quitarubicacion);

            $sql_subida = "DELETE FROM `ubicacion` 
            WHERE id=" . $_GET['id'];
            $resultado = $conn->query($sql_subida);
        }
	?>


</body>
</html>