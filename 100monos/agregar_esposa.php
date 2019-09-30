<?php
        require('conexion.php');

        require('redireccion.php');
        
        $sql1 = "SELECT * FROM pariente";
        $todos = $conn->query($sql1);
        
        $sql2 = "SELECT * FROM ubicacion";
        $paises = $conn->query($sql2);
        
        $sql3 = "SELECT * FROM ubicacion";
        $lugares = $conn->query($sql3);
        
        $sql4 = "SELECT * FROM pariente WHERE id=" . $_GET['id'];
        $pariente1 = $conn->query($sql4);
        $pariente = mysqli_fetch_assoc($pariente1);
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
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

</head>
<body class="bg-dark">
	<div class="d-flex justify-content-center">
			<img style="width: 275px; height: 185px" src="imagenes\it.png">
	</div>
	<br>
	<div class="container card">
        <?php
            if (isset($_POST['confirmar'])) {
                echo "<h2 class='text-muted'>Pareja Creada</h2>";
            }
        ?>
        <div class="form-group">
            <div class="float-right">
                <a class="btn btn-secondary " role="button" href="editar_pariente.php?id=<?php echo $pariente["id"]; ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver al pariente</a>
			    <a class="btn btn-secondary " role="button" href="lista_parientes.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver a la lista</a>
            </div>
        </div>
        <h3>Agregar pareja a <?php echo $pariente['nombre'] ?></h3>
        <form method="post">
			<div class="form-group">
				<label for="usuario">Nombre:</label>
		    	<textarea type="string" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre..." value=""></textarea>
                <script>
                        CKEDITOR.on( 'instanceReady', function( ev )
                            {
                                // Ends self closing tags the HTML4 way, like <br>.
                                ev.editor.dataProcessor.writer.lineBreakChars = ' ';
                            });
                        CKEDITOR.replace( 'nombre' );
                </script>
                <label for="usuario">Pariente del que es pareja:</label>
                <br>
                <input list="gente" readonly class="form-control" id="esposo" name="esposo" type="search" placeholder="Nombre del esposo..." aria-label="Buscar"  autocomplete=off value="<?php echo $pariente["id"]; ?>">
                <datalist id="gente">
                    <?php
                        while( $persona = mysqli_fetch_assoc( $todos)){
                            echo '<option value="' . $persona["id"] . '">';
                                echo $persona["nombre"] . "(" . $persona["nacimiento"] . ")";
                            echo "</option>";
                        }; 
                    ?>
                </datalist>
                <hr>
                <button id="confirmar" name="confirmar" type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Agregar Pareja</button>
            </div>
		</form>
    </div>

    <?php
        if (isset($_POST['confirmar'])) {

            if ($_POST['esposo'] == ''){
                $_POST['esposo'] = 'NULL';
            }

            $sql_subida = "INSERT INTO `madre`
            (`nombre`, `esposo`)
             VALUES 
             ('" . $_POST['nombre'] ."',". $_POST['esposo'] . ")";
            $resultado = $conn->query($sql_subida);
        }
	?>


</body>
</html>