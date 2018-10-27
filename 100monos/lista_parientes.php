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
	
	<?php
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="drinelmo_arbol";
		$conn = new mysqli($servername, $username, $password, $dbname);

		$sql = "SELECT * FROM pariente p1 ORDER BY nombre";
		$result = $conn->query($sql);

		if (isset($_SESSION["usuario"])) {
			if ($_SESSION["usuario"] == "admin" AND $_SESSION["pass"] == "admin" ) {
	    	}else{
	    	echo 'ingresado';
				header('Location: admin.php');
			}
		}	
	?>

</head>
<body class="bg-dark">
	<div class="d-flex justify-content-center">
			<img style="width: 25%;" src="imagenes\it.png">
	</div>
	<br>
	<div class="container card">
		<div class="form-group">
			<a class="btn btn-info float-right" role="button" href="">Crear un Pariente Nuevo</a>
		</div>
		<table class="table" data-filtering="true">
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
				    		echo '<td>' . $row['padre_id'] . '</td>';
				    		echo '<td>' . $row['nacimiento'] . '</td>';
				    		echo '<td><a class="btn btn-primary" href="">Ver/Editar</a></td>';
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