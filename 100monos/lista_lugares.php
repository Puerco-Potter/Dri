<?php
		require('conexion.php');

		$sql = "SELECT * FROM ubicacion p1 ORDER BY nombre";
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
        <a class="btn btn-secondary " role="button" href="lista_parientes.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver a la Lista de Parientes</a>
			<a class="btn btn-warning float-right" role="button" href="crear_lugar.php">Crear Lugar</a>
		</div>
		<table class="table" data-filtering="true" data-sorting="true" data-empty="Sin Parientes" data-paging-count-format="{CP} de {TP}"
            data-paging="true" data-paging-size="20" data-filter-placeholder="Buscar">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
                    <th>Color</th>
                    <th></th>
				</tr>
			</thead>
			<tbody>
				<?php
					while( $row = mysqli_fetch_assoc($result)){
				    	echo '<tr>';
				    		echo '<td>' . $row['id'] . '</td>';
				    		echo '<td>' . $row['nombre'] . '</td>';
				    		echo '<td style="background-color:' . $row['colorlinea'] . '"</td>';
				    		echo '<td><a class="btn btn-primary" href="editar_lugar.php?id='. $row['id'] .'" ><i class="fa fa-eye" aria-hidden="true"></i> / <i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
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