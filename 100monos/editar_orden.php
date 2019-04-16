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
                echo "<h2 class='text-muted'>Pariente Editado</h2>";
            }
        ?>
        <div class="form-group">
            <div class="float-right">
            <a class="btn btn-secondary " role="button" href="editar_pariente.php?id=<?php echo $pariente["id"]; ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver al padre</a>
			    <a class="btn btn-secondary " role="button" href="lista_parientes.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver a la lista</a>
            </div>
        </div>
        <h3>Editar Orden de los Hijos de <?php echo $pariente['nombre'] ?></h3>
        <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nacimiento</th>
                <th scope="col">Orden</th>
                </tr>
            </thead>
            <tbody>
            <h3>Hijos:</h3>
            <form method="post">
                <td><button id="confirmar" name="confirmar" type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Guardar Cambios al Orden de los Hijos</button></td>
                <?php
                    while( $hijo = mysqli_fetch_assoc( $hijos)){
                        echo "<tr>";
                        echo "<td>". $hijo["id"]. "</td>";
                        echo "<td>". $hijo["nombre"]. "</td>";
                        echo "<td>". $hijo["nacimiento"]. "</td>";
                        echo "<td><input type='number' class='form-control' id='" . $hijo["id"]. "' name='" . $hijo["id"]. "' value='". $hijo["orden"]. "'></td>";
                        echo "</tr>"; 
                    };
                    
                ?>
            </form>
            </tbody>
        </table>
        
        </div>
    </div>

    <?php
        if (isset($_POST['confirmar'])) {

            foreach($_POST as $id => $orden)
            {

                $sql_subida = "UPDATE `pariente` SET 
                `orden`='" . $orden ."'
                WHERE id=" . $id;
                $resultado = $conn->query($sql_subida);
            }
        }
	?>


</body>
</html>