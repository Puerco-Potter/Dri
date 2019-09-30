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

        $sql5 = "SELECT * FROM pariente WHERE padre_id=" . $_GET['id'];
        $hijos = $conn->query($sql5);

        $sql6 = "SELECT * FROM madre WHERE esposo=" . $_GET['id'];
        $esposas = $conn->query($sql6);
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
                echo "<h2 class='text-muted'>Pariente Editado</h2>";
            }
        ?>
        <div class="form-group">
            <div class="float-right">
                <a class="btn btn-info" role="button" href='editar_pariente.php?id=<?php echo $pariente["id"]; ?>'><i class="fa fa-refresh" aria-hidden="true"></i> Recargar Datos</a>
			    <a class="btn btn-secondary " role="button" href="lista_parientes.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver a la lista</a>
            </div>
        </div>
        <h3>Ver/Editar Pariente</h3>
        <form method="post">
			<div class="form-group">
				<label for="usuario">Nombre:</label>
		    	<textarea class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre..." ><?php echo $pariente['nombre'] ?></textarea>
                <script>
                        CKEDITOR.on( 'instanceReady', function( ev )
                            {
                                // Ends self closing tags the HTML4 way, like <br>.
                                ev.editor.dataProcessor.writer.lineBreakChars = ' ';
                            });
                        CKEDITOR.replace( 'nombre' );
                </script>
                <label for="usuario">Padre:</label>
                <br>
                <a class="btn btn-secondary" href="editar_pariente.php?id=<?php echo $pariente['padre_id'] ?>"><i class="fa fa-search" aria-hidden="true"></i> Ir al Padre</a>
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
                <select class="form-control" id="pais" name="pais" type="search" placeholder="Origen..." aria-label="Buscar"  autocomplete=off>
                
                    <?php
                        while( $pais = mysqli_fetch_assoc( $paises)){
                            if ($pariente['origen_id'] == $pais["id"]){
                                $selected = " selected ";
                            }else{
                                $selected= "222";
                            }
                            echo '<option value="' . $pais["id"] . '" ' .  $selected  . ' >';
                                echo $pais["nombre"];
                            echo "</option>";
                        }; 
                    ?>
                </select>
                <label for="lugar">Ubicacion:</label>
                <select class="form-control" id="lugar" name="lugar" type="search" placeholder="Ubicacion..." aria-label="Buscar"  autocomplete=off>
                
                    <?php
                        while( $lugar = mysqli_fetch_assoc( $lugares)){
                            if ($pariente['radicado_id'] == $lugar["id"]){
                                $selected = " selected ";
                            }else{
                                $selected= "222";
                            }
                            echo '<option value="' . $lugar["id"] . '" ' .  $selected  . ' >';
                                echo $lugar["nombre"];
                            echo "</option>";
                        }; 
                    ?>
                </select>
                <label for="nacimiento">Nacimiento:</label>
                <textarea class="form-control" id="nacimiento" name="nacimiento" placeholder="Nacimiento..."><?php echo $pariente['nacimiento'] ?></textarea>
                <label for="muerte">Muerte:</label>
                <textarea class="form-control" id="muerte" name="muerte" placeholder="Muerte..."><?php echo $pariente['muerte'] ?></textarea>
                <label for="comentario">Comentario:</label>
                <textarea class="form-control" id="comentario" name="comentario" placeholder="Comentario..."><?php echo $pariente['comentario'] ?></textarea>
                <label for="lugar">Galeria:</label>
                <input type="text" class="form-control" id="galeria" name="galeria" value="<?php echo $pariente['galeria'] ?>" placeholder="https://photos.app.goo.gl/xxxxxxxxxxxxxxx">
                <label for="comentario">Tamaño:</label>
                <select class="form-control" id="tamano" name="tamano" aria-label="Buscar"  autocomplete=off>
                    <?php
                        if ($pariente['tamano'] == 1){
                            echo '<option value="1"  selected>';
                                echo "Grande";
                            echo "</option>";
                            echo '<option value="0">';
                                echo "Normal";
                            echo "</option>";
                        }else{
                            echo '<option value="1">';
                                echo "Grande";
                            echo "</option>";
                            echo '<option value="0"  selected>';
                                echo "Normal";
                            echo "</option>";
                        }
                        
                    ?>
                </select>
                <hr>
                <button id="confirmar" name="confirmar" type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Guardar Cambios al Pariente</button>
            </div>
		</form>
        <div>
        <table class="table table-primary">
            <thead>
            <td><a class='btn btn-warning' href='agregar_esposa.php?id="<?php echo $_GET['id'] ?>"'>Agregar una persona</i></a></td>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <h3>Personas con las que tuvo hijos:</h3>
            <?php
                while( $esposa = mysqli_fetch_assoc($esposas)){
                    echo "<tr>";
                    echo "<td>". $esposa["id"]. "</td>";
                    echo "<td>". $esposa["nombre"]. "</td>";
                    echo "<td><a class='btn btn-warning' href='editar_esposa.php?id=". $esposa["id"] ."'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
                    echo "<td><a class='btn btn-danger' href='borrar_esposa.php?id=". $esposa["id"] ."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
                    echo "</tr>"; 
                };
                
            ?>
            </tbody>
        </table>
        
        <h3>Hijos:</h3>
        <table class="table table-info">
            <thead>
            <tr>
            <td><a class='btn btn-primary' href='agregar_hijo.php?id="<?php echo $_GET['id'] ?>"'>Agregar un hijo</i></a></td>
            <td><a class='btn btn-primary' href='editar_orden.php?id="<?php echo $_GET['id'] ?>"'>Editar el orden de los hijos</i></a></td>
            </tr>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nacimiento</th>
                <th scope="col">Orden</th>
                <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
                while( $hijo = mysqli_fetch_assoc( $hijos)){
                    echo "<tr>";
                    echo "<td>". $hijo["id"]. "</td>";
                    echo "<td>". $hijo["nombre"]. "</td>";
                    echo "<td>". $hijo["nacimiento"]. "</td>";
                    echo "<td>". $hijo["orden"]. "</td>";
                    echo "<td><a class='btn btn-primary' href='editar_pariente.php?id=". $hijo["id"] ."'><i class='fa fa-eye' aria-hidden='true'></i> / <i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
                    echo "</tr>"; 
                };
                
            ?>
            </tbody>
        </table>
        
        
        </div>
    </div>

    <?php
        if (isset($_POST['confirmar'])) {

            if (empty($_POST['padre'] )){
                $_POST['padre'] = 'NULL';
            }
            if (empty($_POST['pais'] )){
                $_POST['pais'] = 'NULL';
            }
            if (empty($_POST['lugar'] )){
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
            `tamano`='" . $_POST['tamano'] ."',
            `galeria`='" . $_POST['galeria'] ."',
            `enlace`=''
            WHERE id=" . $_GET['id'];
            $resultado = $conn->query($sql_subida);
        }
	?>


</body>
</html>