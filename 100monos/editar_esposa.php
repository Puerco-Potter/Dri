<?php
        require('conexion.php');

        require('redireccion.php');
        $id_esposa= $_GET["id"];
        $sql4 = "SELECT * FROM madre where id=" . $_GET["id"];
        $esposa1 = $conn->query($sql4);
        $esposa = mysqli_fetch_assoc($esposa1);
        
        
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
                echo "<h2 class='text-muted'>Pareja Editada</h2>";
            }
        ?>
        <div class="form-group">
            <div class="float-right">
            <a class="btn btn-secondary " role="button" href="lista_parientes.php">Volver a la lista</a>
            <a class="btn btn-secondary" role="button" href="editar_pariente.php?id=<?php echo $esposa['esposo'] ?>">Volver al pariente</a>
            </div>
        </div>
        <form method="post">
			<div class="form-group">
				<h2>Editar pareja: <?php echo strtoupper($id_esposa) ?></h2>
                <label for="usuario">Nombre:</label>
		    	<textarea class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre..." ><?php echo $esposa['nombre'] ?></textarea>
                <script>
                        CKEDITOR.on( 'instanceReady', function( ev )
                            {
                                // Ends self closing tags the HTML4 way, like <br>.
                                ev.editor.dataProcessor.writer.lineBreakChars = ' ';
                            });
                        CKEDITOR.replace( 'nombre' );
                </script>
                <button id="confirmar" name="confirmar" type="submit" class="btn btn-success">Guardar Cambios</button>
                
            </div>
		</form>
    </div>

    <?php
        if (isset($_POST['confirmar'])) {
            $sql_subida = "UPDATE `madre` SET 
            `nombre`='" . $_POST["nombre"] ."'
            WHERE id=" .  $id_esposa;
            $resultado = $conn->query($sql_subida);
        }
	?>

</body>
</html>