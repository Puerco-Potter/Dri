<?php
		require('conexion.php');

		$sql = "SELECT * FROM personalizacion";
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
			
		</div>
		<table class="table" data-filtering="true" data-sorting="true" data-empty="Sin Parientes" data-paging-count-format="{CP} de {TP}"
            data-paging="true" data-paging-size="20" data-filter-placeholder="Buscar">
			<thead>
				<tr>
					<th>Objeto</th>
                    <th>Color</th>
                    <th></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$row = mysqli_fetch_assoc($result);
				    	echo '<tr>';
				    		echo '<td>Fondo</td>';
				    		echo '<td style="background-color:' . $row['fondo'] . '"</td>';
				    		echo '<td><a class="btn btn-primary" href="editar_color.php?codigo=fondo" ><i class="fa fa-eye" aria-hidden="true"></i> / <i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
						echo '</tr>';
						echo '<tr>';
				    		echo '<td>Lineas</td>';
				    		echo '<td style="background-color:' . $row['lineas'] . '"</td>';
				    		echo '<td><a class="btn btn-primary" href="editar_color.php?codigo=lineas" ><i class="fa fa-eye" aria-hidden="true"></i> / <i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
						echo '</tr>';
						echo '<tr>';
				    		echo '<td>Cuadro sin Ubicación</td>';
				    		echo '<td style="background-color:' . $row['cuadro'] . '"</td>';
				    		echo '<td><a class="btn btn-primary" href="editar_color.php?codigo=cuadro" ><i class="fa fa-eye" aria-hidden="true"></i> / <i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
						echo '</tr>';
						echo '<tr>';
				    		echo '<td>Texto</td>';
				    		echo '<td style="background-color:' . $row['texto'] . '"</td>';
				    		echo '<td><a class="btn btn-primary" href="editar_color.php?codigo=texto" ><i class="fa fa-eye" aria-hidden="true"></i> / <i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
						echo '</tr>';
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