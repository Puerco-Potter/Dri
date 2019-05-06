<?php
		require('conexion.php');

		$sql = "SELECT * FROM pariente p1 ORDER BY nombre";
		$result = $conn->query($sql);

		require('redireccion.php');	
?>
<!DOCTYPE html>
<html>
<head>
	<title>DRI</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<LINK href="bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="footable\js\footable.min.js"></script>
	<LINK href="footable\css\footable.standalone.min.css" rel="stylesheet" type="text/css">
	<LINK href="fontawesome\css\font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body class="bg-dark">
	<div class="d-flex justify-content-center">
			<img style="width: 275px; height: 185px" src="imagenes\it.png">
	</div>
	<br>
	<div class="container card">
		<div class="form-group">
			<a class="btn btn-info float-right" role="button" href="crear_pariente.php">Crear un Pariente Nuevo</a>
			<a class="btn btn-warning float-right" role="button" href="lista_lugares.php">Lugares</a>
			<a class="btn btn-dark float-right" role="button" href="personalizar.php">Personalizar</a>
			<a href="../dri/" class="btn btn-success btn-lg">Arbol Genealogico Interactivo</a>
			<a href="arbol2.php" class="btn btn-danger btn-lg">Arbol Genealogico Interactivo 2.0 Beta</a>
		</div>
		<table class="table" data-filtering="true" data-sorting="true" data-empty="Sin Parientes" data-paging-count-format="{CP} de {TP}"
            data-paging="true" data-paging-size="20" data-filter-placeholder="Buscar">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Padre</th>
					<th>Nacimiento</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while( $row = mysqli_fetch_assoc($result)){
				    	echo '<tr>';
				    		echo '<td>' . $row['id'] . '</td>';
				    		echo '<td>' . $row['nombre'] . '</td>';
				    		echo '<td>'. '<a class="btn btn-primary" href="editar_pariente.php?id='. $row['padre_id'] .'" ><i class="fa fa-search" aria-hidden="true"></i></a> ' . $row['padre_id'] . '</td>';
				    		echo '<td>' . $row['nacimiento'] . '</td>';
							echo '<td><a class="btn btn-primary" href="editar_pariente.php?id='. $row['id'] .'" ><i class="fa fa-eye" aria-hidden="true"></i> / <i class="fa fa-pencil" aria-hidden="true"></i></a>';
							echo '<a class="btn btn-danger" href="borrar_pariente.php?id='. $row['id'] .'" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
				    	echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</body>
	<script type="text/javascript">
		jQuery(function($){
			$('.table').footable();
		});
	</script>

</html>