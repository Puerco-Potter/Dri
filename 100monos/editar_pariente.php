<?php
        require('conexion.php');

        require('redireccion.php');
        
        $sql1 = "SELECT * FROM pariente";
        $todos = $conn->query($sql1);
        
        $sql2 = "SELECT * FROM pais";
        $paises = $conn->query($sql2);
        
        $sql3 = "SELECT * FROM ubicacion";
        $lugares = $conn->query($sql3);
        
        $sql4 = "SELECT * FROM pariente WHERE id=" . $_GET['id'];
        $pariente1 = $conn->query($sql4);
        $pariente = mysqli_fetch_assoc($pariente1)
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
			<img style="width: 25%;" src="imagenes\it.png">
	</div>
	<br>
	<div class="container card">
        <?php
            if (isset($_POST['confirmar'])) {
                echo "Pariente Editado";
            }
        ?>
        <div class="form-group">
			<a class="btn btn-secondary float-right" role="button" href="lista_parientes.php">Volver a la lista</a>
		</div>
        <h3>Ver/Editar Pariente</h3>
        <form method="post">
			<div class="form-group">
				<label for="usuario">Nombre:</label>
		    	<input type="string" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre..." value="<?php echo $pariente['nombre'] ?>">
                <label for="usuario">Padre:</label>
                <input list="gente" class="form-control" id="padre" name="padre" type="search" placeholder="Nombre del Padre..." aria-label="Buscar"  autocomplete=off value="<?php echo $pariente['padre_id'] ?>">
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
                <input list="paises" class="form-control" id="pais" name="pais" type="search" placeholder="Origen..." aria-label="Buscar"  autocomplete=off value="<?php echo $pariente['origen_id'] ?>">
                <datalist id="paises">
                    <?php
                        while( $pais = mysqli_fetch_assoc( $paises)){
                            echo '<option value="' . $pais["id"] . '">';
                                echo $pais["nombre"];
                            echo "</option>";
                        }; 
                    ?>
                </datalist>
                <label for="lugar">Ubicacion:</label>
                <input list="lugares" class="form-control" id="lugar" name="lugar" type="search" placeholder="Ubicacion..." aria-label="Buscar"  autocomplete=off value="<?php echo $pariente['radicado_id'] ?>">
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
                <textarea class="form-control" id="nacimiento" name="nacimiento" placeholder="Nacimiento..."><?php echo $pariente['nacimiento'] ?></textarea>
                <label for="muerte">Muerte:</label>
                <textarea class="form-control" id="muerte" name="muerte" placeholder="Muerte..."><?php echo $pariente['muerte'] ?></textarea>
                <label for="comentario">Comentario:</label>
                <textarea class="form-control" id="comentario" name="comentario" placeholder="Comentario..."><?php echo $pariente['comentario'] ?></textarea>
                <hr>
                <button id="confirmar" name="confirmar" type="submit" class="btn btn-success">Guardar Cambios al Pariente</button>
            </div>
		</form>
    </div>

    <?php
        if (isset($_POST['confirmar'])) {

            if ($_POST['padre'] == ''){
                $_POST['padre'] = 'NULL';
            }
            if ($_POST['pais'] == ''){
                $_POST['pais'] = 'NULL';
            }
            if ($_POST['lugar'] == ''){
                $_POST['lugar'] = 'NULL';
            }

            $sql_subida = "UPDATE `pariente` SET 
            `nombre`='" . $_POST['nombre'] ."',
            `padre_id`=" . $_POST['padre'] .",
            `origen_id`=" . $_POST['pais'] .",
            `radicado_id`=" . $_POST['lugar'] .",
            `nacimiento`='" . $_POST['nacimiento'] ."',
            `muerte`='" . $_POST['muerte'] ."',
            `comentario`='" . $_POST['comentario'] ."',
            `enlace`=''
            WHERE id=" . $_GET['id'];
            $resultado = $conn->query($sql_subida);
        }
	?>

</body>
</html>