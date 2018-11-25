<?php
		require('conexion.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>DRI</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<LINK href="bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="mousewheel/jquery.mousewheel.min.js"></script>
	<script src="panzoom/dist/jquery.panzoom.min.js"></script>
	<LINK href="fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	

	<?php
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
			border-top: 3px solid white;
			width: 50%; height: 20px;
		}
		.tree li::after{
			right: auto; left: 50%;
			border-left: 3px solid white;
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
			border-right: 3px solid white;
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
			border-left: 3px solid white;
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
		
		 /* The animation code */
		@keyframes example {
		    0%   {background-color: green;}  
			100% {background-color: green;}
		    
		}

		/* The element to apply the animation to */
		.cambio {
		    animation-name: example;
		    animation-duration: 6s;
		} 
		
		
		
			</style>

</head>
<body class="bg-dark">
	<nav class="navbar fixed-top navbar-light bg-light">
  		<a class="navbar-brand" href="#">DRI</a>
  		<div class="form-inline w-75">
    		<input id="selected" list="gente" type="" name="" class="form-control mr-sm-2 w-75 nombreGente" placeholder="Nombre / Nome / Name">
			<datalist id="gente">

			<?php
				while( $persona = mysqli_fetch_assoc( $todos)){
					echo '<option data-value="' . $persona["id"] . '" value="';
						echo $persona["nombre"] . "(" . $persona["nacimiento"] . ")";
					echo '"></option>';
				} 
			?>
			</datalist>
			<btn id="boton" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i>
</btn>
    		<!-- <span class="btn btn-outline-success my-2 my-sm-0 botonDeBusqueda">Search</span> -->
  		</div>
	</nav>
	<div>
		
	<div>

	<div>
		<div style="height: 100px;"></div>

<div id="arbol" class="tree panzoom-elements" style="display: inline-flex; width: 210000px;">

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
			    	echo '<a class="clickable" id="pariente' . $root["pequeno"] . '" href="#invisible' . $root["pequeno"] . '">';
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


<script>
	$(document).ready(function() {
		//esto es para que los nombres permanezcan sin borrarse del imput
	var data = {}; 
	$("#gente option").each(function(i,el) {  
	   data[$(el).data("value")] = $(el).val();
	});
	// `data` : object of `data-value` : `value`
	console.log(data, $("#gente option").val());


	    $('#boton').click(function()
	    {	
	    	$("#arbol").panzoom("reset");
	        var value = $('#selected').val();
	        var valor = "" + $('#gente [value="' + value + '"]').data('value');
	        var ancla = "#pariente" + valor;
	        var anclajs = "pariente" + valor;
	        //$('html, body').animate({
    		//	scrollTop: $(ancla).offset().top -100
	    	//}, 1000);
	    	
	    	setTimeout(function () { 
			    var y = $(ancla).offset().top -100;
	    		var x = $(ancla).offset().left -100;
	    		$("#arbol").panzoom("setMatrix", [ 1, 0, 0, 1, -x, -y ])
			}, 1000);
			var $el = document.getElementById(anclajs);
			$el.classList.add("cambio");
			setTimeout(function () { 
			    $el.classList.remove("cambio");
			}, 4000);
	    	
		});
	});
    
</script>
<script>
        (function() {
          var $panzoom = $(".panzoom-elements").panzoom();
          $panzoom.parent().on('mousewheel.focal', function( e ) {
            e.preventDefault();
            var delta = e.delta || e.originalEvent.wheelDelta;
            var zoomOut = delta ? delta < 0 : e.originalEvent.deltaY > 0;
            $panzoom.panzoom('zoom', zoomOut, {
              increment: 0.1,
              animate: false,
              focal: e
            });
          });
        })();

        $( "#boton2" ).click(function() {
	  		
			var $el = document.getElementById("panzoom");
			$el.classList.add("cambio");
			setTimeout(function () { 
			    $el.classList.remove("cambio");
			}, 4000);

			;
		});
      </script>
</html>