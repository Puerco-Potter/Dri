<!DOCTYPE html>
<html>
<head>
	<title>DRI</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<LINK href="bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="//code.jquery.com/jquery.min.js"></script>

	<?php
		$servername="localhost";
		$username="drinelmo_arbol";
		$password="Osiris09!";
		$dbname="drinelmo_arbol";
		$conn = new mysqli($servername, $username, $password, $dbname);

		$sql = "SELECT p1.id, p2.nombre, p2.nacimiento, p2.id as pequeno, p2.nombre FROM pariente p1 INNER JOIN pariente p2 ON p1.id = p2.padre_id ORDER BY p1.id";
		$result = $conn->query($sql);

		$sql2 = "SELECT p1.id, p1.nombre, p1.nacimiento, p1.padre_id, p1.id as pequeno FROM pariente p1 WHERE p1.padre_id IS NULL ORDER BY p1.id";
		$raices = $conn->query($sql2);

		$sql3 = "SELECT * FROM pariente";
		$todos = $conn->query($sql3);
	?>

		<style type="text/css">
				/*Now the CSS*/
		* {margin: 0; padding: 0;}

		.tree ul {
			padding-top: 20px; position: relative;
			
			transition: all 0.5s;
			-webkit-transition: all 0.5s;
			-moz-transition: all 0.5s;
		}

		.tree li {
			float: left; text-align: center;
			list-style-type: none;
			position: relative;
			padding: 20px 5px 0 5px;
			
			transition: all 0.5s;
			-webkit-transition: all 0.5s;
			-moz-transition: all 0.5s;
		}

		/*We will use ::before and ::after to draw the connectors*/

		.tree li::before, .tree li::after{
			content: '';
			position: absolute; top: 0; right: 50%;
			border-top: 1px solid white;
			width: 50%; height: 20px;
		}
		.tree li::after{
			right: auto; left: 50%;
			border-left: 1px solid white;
		}

		/*We need to remove left-right connectors from elements without 
		any siblings*/
		.tree li:only-child::after, .tree li:only-child::before {
			display: none;
		}

		/*Remove space from the top of single children*/
		.tree li:only-child{ padding-top: 0;}

		/*Remove left connector from first child and 
		right connector from last child*/
		.tree li:first-child::before, .tree li:last-child::after{
			border: 0 none;
		}
		/*Adding back the vertical connector to the last nodes*/
		.tree li:last-child::before{
			border-right: 1px solid white;
			border-radius: 0 5px 0 0;
			-webkit-border-radius: 0 5px 0 0;
			-moz-border-radius: 0 5px 0 0;
		}
		.tree li:first-child::after{
			border-radius: 5px 0 0 0;
			-webkit-border-radius: 5px 0 0 0;
			-moz-border-radius: 5px 0 0 0;
		}

		/*Time to add downward connectors from parents*/
		.tree ul ul::before{
			content: '';
			position: absolute; top: 0; left: 50%;
			border-left: 1px solid white;
			width: 0; height: 20px;
		}

		.tree li a{
			border: 1px solid white;
			padding: 5px 10px;
			text-decoration: none;
			color: white;
			font-family: arial, verdana, tahoma;
			font-size: 11px;
			display: inline-block;
			
			border-radius: 5px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			
			transition: all 0.5s;
			-webkit-transition: all 0.5s;
			-moz-transition: all 0.5s;
		}


		/*red*/
		.red li::before, .red li::after{
			border-top: 1px solid red;
		}
		.red li::after{
			border-left: 1px solid red;
		}
		/*Adding back the vertical connector to the last nodes*/
		.red li:last-child::before{
			border-right: 1px solid red;
		}
		.red li:first-child::after{
		}

		/*Time to add downward connectors from parents*/
		.red ul ul::before{
			border-left: 1px solid red;
		}

		.red li a{
			border: 1px solid red;
		}

		.tree ul.red ul::before{
			border-left: 1px solid red;
		}
		/*red*/

		/*blue*/
		.blue li::before, .blue li::after{
			border-top: 1px solid blue;
		}
		.blue li::after{
			border-left: 1px solid blue;
		}
		/*Adding back the vertical connector to the last nodes*/
		.blue li:last-child::before{
			border-right: 1px solid blue;
		}
		.blue li:first-child::after{
		}

		/*Time to add downward connectors from parents*/
		.blue ul ul::before{
			border-left: 1px solid blue;
		}

		.blue li a{
			border: 1px solid blue;
		}

		.tree ul.blue ul::before{
			border-left: 1px solid blue;
		}
		/*blue*/

		/*Time for some hover effects*/
		/*We will apply the hover effect the the lineage of the element also*/
		.tree li a:hover, .tree li a:hover+ul li a {
			background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
		}
		/*Connector styles on hover*/
		.tree li a:hover+ul li::after, 
		.tree li a:hover+ul li::before, 
		.tree li a:hover+ul::before, 
		.tree li a:hover+ul ul::before{
			border-color:  #94a0b4;
		}

		/*Thats all. I hope you enjoyed it.
		Thanks :)*/
		
		.anchor{
		display: block;
		height: 115px; /*same height as header*/
		margin-top: -115px; /*same height as header*/
		margin-left: -215px;
		margin-right: -215px;
		visibility: hidden;
		}
		
		
			</style>

</head>
<body class="bg-dark">
	<nav class="navbar fixed-top navbar-light bg-light">
  		<a class="navbar-brand" href="#">DRI</a>
  		<form action="/action_page.php" class="form-inline w-75">
    		<input onSelect="yesnoCheck(this)" list="gente" class="form-control mr-sm-2 w-75 nombreGente" type="search" placeholder="Nombre/Nome/Name" aria-label="Buscar"  autocomplete=off>
			<datalist id="gente">
			<?php
				while( $persona = mysqli_fetch_assoc( $todos)){
					echo '<option value="' . $persona["id"] . '">';
						echo $persona["nombre"] . "(" . $persona["nacimiento"] . ")";
					echo "</option>";
				} 
			?>
			</datalist>
    		<!-- <span class="btn btn-outline-success my-2 my-sm-0 botonDeBusqueda">Search</span> -->
  		</form>
	</nav>
	<div>
		
	<div>

	<div>
		<div style="height: 100px;"></div>

<div class="tree zoomable" style="display: inline-flex; width: 210000px;">

	<?php

	while( $row = mysqli_fetch_assoc($result)){
    	$resguardo[$row["id"]][] = $row;
	}

	while( $raiz = mysqli_fetch_assoc( $raices)){
    	echo '<ul>';
    	$tree = hacer_arbol($resguardo, $raiz);
		preorder2($tree);
		echo "</ul>";
	} 
	?>
</div>

		<?php
			
			function hacer_arbol($resguardo, $raiz){
				$tree = [];
				$tree = $raiz;
				foreach ($resguardo[$raiz["id"]] as $node) {
		    		agregar($tree, $node, $resguardo);
		    	}
		    	return $tree;
			}

			function agregar(&$root, &$children, $resguardo){
				$root["children"][$children["pequeno"]] = $children;
				
				$bandera= false;
				if (isset($resguardo[$children["pequeno"]])) {
		    		$bandera = true;
		    	}

				if ($bandera == false){
					return;
				} else {
					foreach ($resguardo[$children["pequeno"]] as $child) {
		    			agregar($root["children"][$children["pequeno"]], $child, $resguardo);
		    		}
				}
			}

			function preorder2(&$root) {
			    if ($root) {
					echo "<li>";
					echo '<span class="anchor" id="invisible' . $root["pequeno"] . '"></span>';
			    	echo '<a class="clickable" href="#invisible' . $root["pequeno"] . '">';
			        echo str_replace(" ", "<br>",  $root["nombre"]) . "<br>" . str_replace(" ", "<br>",  $root["nacimiento"]);
			    	echo "</a>";

			        if (array_key_exists("children", $root)) {
			            echo "<ul>";
			            foreach ($root["children"] as $c) {
			                preorder2($c);
			            }
			            echo "</ul>";
			        }
			    	echo "</li>";
			    }
			}


		?>
</body>

<script src='https://cdn.rawgit.com/anvaka/panzoom/v6.1.3/dist/panzoom.min.js'></script>
<script>
	var area = document.querySelector('.zoomable')
	panzoom(area, {
		zoomDoubleClickSpeed: 1, 
	})

	//$(".botonDeBusqueda").click(function(event){
	//	
	//});

	$(".clickable").click(function(event){
		event.stopPropagation();
	});
</script>
<script>
    function yesnoCheck(that) {
        var bla = $('.nombreGente').val();
		location.hash = "invisible" + bla;
    }
</script>
</html>