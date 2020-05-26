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
			<a class="btn btn-dark float-right" role="button" href="../index2.php">Portada</a>
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
							//echo '<td>' . $row['nombre'] . '</td>';
							$linea_nombre = trim(strip_tags(str_replace (array("\r\n", "\n", "\r", "\""), '', $row["nombre"])));
							$linea_nombre = str_replace ('á','a',$linea_nombre);
							$linea_nombre = str_replace ('é','e',$linea_nombre);
							$linea_nombre = str_replace ('í','i',$linea_nombre);
							$linea_nombre = str_replace ('ó','o',$linea_nombre);
							$linea_nombre = str_replace ('ú','u',$linea_nombre);
							$linea_nombre = str_replace ('Á','A',$linea_nombre);
							$linea_nombre = str_replace ('É','E',$linea_nombre);
							$linea_nombre = str_replace ('Í','I',$linea_nombre);
							$linea_nombre = str_replace ('Ó','O',$linea_nombre);
							$linea_nombre = str_replace ('Ú','U',$linea_nombre);
							$linea_nombre = str_replace ('&aacute;','a',$linea_nombre);
							$linea_nombre = str_replace ('&eacute;','e',$linea_nombre);
							$linea_nombre = str_replace ('&iacute;','i',$linea_nombre);
							$linea_nombre = str_replace ('&oacute;','o',$linea_nombre);
							$linea_nombre = str_replace ('&uacute;','u',$linea_nombre);
							$linea_nombre = str_replace ('&Aacute;','A',$linea_nombre);
							$linea_nombre = str_replace ('&Eacute;','E',$linea_nombre);
							$linea_nombre = str_replace ('&Iacute;','I',$linea_nombre);
							$linea_nombre = str_replace ('&Oacute;','O',$linea_nombre);
							$linea_nombre = str_replace ('&Uacute;','U',$linea_nombre);
							
							echo '<td>' .$linea_nombre . '</td>';

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

<script>
		  //eliminar acentos del datalist
	jQuery(document ).on( "keypress", ".form-control", function(event){
        var str = $('.form-control').val(); 

        if(String.fromCharCode(event.which) == 'á'){
			event.preventDefault()
			$('.form-control').val(str + 'a'); 
		}
		if(String.fromCharCode(event.which) == 'é'){
			event.preventDefault()
			$('.form-control').val(str + 'e'); 
		}
		if(String.fromCharCode(event.which) == 'í'){
			event.preventDefault()
			$('.form-control').val(str + 'i'); 
		}
		if(String.fromCharCode(event.which) == 'ó'){
			event.preventDefault()
			$('.form-control').val(str + 'o'); 
		}
		if(String.fromCharCode(event.which) == 'ú'){
			event.preventDefault()
			$('.form-control').val(str + 'u'); 
		}

		if(String.fromCharCode(event.which) == 'Á'){
			event.preventDefault()
			$('.form-control').val(str + 'A'); 
		}
		if(String.fromCharCode(event.which) == 'É'){
			event.preventDefault()
			$('.form-control').val(str + 'E'); 
		}
		if(String.fromCharCode(event.which) == 'Í'){
			event.preventDefault()
			$('.form-control').val(str + 'I'); 
		}
		if(String.fromCharCode(event.which) == 'Ó'){
			event.preventDefault()
			$('.form-control').val(str + 'O'); 
		}
		if(String.fromCharCode(event.which) == 'Ú'){
			event.preventDefault()
			$('.form-control').val(str + 'U'); 
		}
	});

	jQuery(document ).on( "paste", ".form-control", function(event){
		// access the clipboard using the api
		var str = $('.form-control').val();
		var pastedData = event.originalEvent.clipboardData.getData('text');
		event.preventDefault();
		pastedData = pastedData.replace("á", "a");
		pastedData = pastedData.replace("é", "e");
		pastedData = pastedData.replace("í", "i");
		pastedData = pastedData.replace("ó", "o");
		pastedData = pastedData.replace("ú", "u");
		pastedData = pastedData.replace("Á", "A");
		pastedData = pastedData.replace("É", "E");
		pastedData = pastedData.replace("Í", "I");
		pastedData = pastedData.replace("Ó", "O");
		pastedData = pastedData.replace("Ú", "U");
		$('.form-control').val(str + pastedData);
	} );
	</script>

</html>