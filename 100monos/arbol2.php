<?php
		require('conexion.php');
		require('redireccion.php');
        
?>
<!DOCTYPE html>
<html>
<head>
	<title>DRI</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<LINK href="bootstrap\css\bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="mousewheel/jquery.mousewheel.min.js"></script>
	<script src="panzoom/dist/jquery.panzoom.min.js"></script>
	<LINK href="fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	

	<?php
		//$sql = "SELECT p1.id, p2.nombre, p2.nacimiento, p2.id as pequeno, p2.nombre FROM pariente p1 INNER JOIN pariente p2 ON p1.id = p2.padre_id ORDER BY p1.id";
		$sql = "SELECT p1.id, p2.nombre, p2.nacimiento, p2.id as pequeno, p2.orden , p2.origen_id, u.colorlinea FROM pariente p1 INNER JOIN (pariente p2 left JOIN ubicacion u ON p2.origen_id = u.id) ON p1.id = p2.padre_id ORDER BY p1.id, p2.orden";
		$result = $conn->query($sql);

		$sql2 = "SELECT p1.id, p1.nombre, p1.nacimiento, p1.padre_id, p1.id as pequeno, u.colorlinea FROM pariente p1 left JOIN ubicacion u ON p1.origen_id = u.id WHERE p1.padre_id IS NULL ORDER BY p1.id";
		$raices = $conn->query($sql2);

		$sql3 = "SELECT * FROM pariente";
		$todos = $conn->query($sql3);

		$sql4 = "SELECT * FROM lugares";
		$lugares = $conn->query($sql4);

		$todosmodal = $conn->query($sql3);
	?>

		<style type="text/css">

		body {
		min-width: 100%;
		margin: 0;
		color: white;
		font: 16px Verdana, sans-serif;
		background: black;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		overflow: hidden;
		}

		#wrapper {
		position: relative;
		width:100000%;
		}

		.branch {
		position: relative;
		margin-left: 4800px;
		padding-bottom: 40px;
		padding-top: 40px;
		}
		
		#wrapper >.entry::before {
		display: none;
		}
		#wrapper >.entry::after {
		display: none;
		}

		.branch:before{
			content: "";
			width: 2000px;
			border-top: 35px solid lightgrey;
			position: absolute;
			left: -4000px;
			top: 50%;
			margin-top: 1px;
		}
		
		.entry:before {
			content: "";
			height: 100%;
			border-left: 70px solid lightgrey;
			position: absolute;
			left: -2000px;
		}
		
		.entry:after {
			content: "";
			width: 2000px;
			border-top: 35px solid lightgrey;
			position: absolute;
			left: -2000px;
			top: 50%;
			margin-top: 1px;
		}

		.entry:first-child:before {
			width: 10px;
			height: 50%;
			top: 50%;
			margin-top: 2px;
			border-radius: 10px 0 0 0;
		}

		.entry:first-child:after {
			height: 10px;
			border-radius: 10px 0 0 0;
			}

		.entry:last-child:before {
			width: 10px;
			height: 50%;
			border-radius: 0 0 0 10px;
		}

		.entry:last-child:after {
		height: 10px;
		border-top: none;
		border-bottom: 35px solid lightgrey;
		border-radius: 0 0 0 10px;
		margin-top: -9px;
		}

		.entry {
		position: relative;
		min-height: 80px;
		}
		
		.entry:only-child:before {
		display: none !important;
		}
		.entry:only-child:after {
		width: 2000px;
		height: 0;
		margin-top: 1px;
		border-radius: 0;
		}

		.label {
		display: block;
		min-width: 800px;
		padding: 5px 10px;
		line-height: 20px;
		text-align: center;
		border: 2px solid white;
		border-radius: 5px;
		position: absolute;
		left: 0;
		top: 50%;
		margin-top: -15px;
		background-color: darkblue;
		z-index:2;
		}

		/*Thats all. I hope you enjoyed it.
		Thanks :)*/
		
		 /* The animation code */
		@keyframes example {
			0%   {background-color: darkblue; font-size:large;}
			5%   {background-color: green;}
			10%   {background-color: darkblue;}
			15%   {background-color: green;}
			20%   {background-color: darkblue;}
			25%   {background-color: green;}
			30%   {background-color: darkblue;}
			35%   {background-color: green;}
			40%   {background-color: darkblue;}
			45%   {background-color: green;}
			50%   {background-color: darkblue;}
			55%   {background-color: green;}
			70%   {background-color: darkblue;}
			85%   {background-color: green;}
		    100%   {background-color: darkblue;font-size:large;}
		}

		/* The element to apply the animation to */
		.cambio {
		    animation-name: example;
		    animation-duration: 3s;
		} 
		
		
		
			</style>

</head>
<body class="bg-dark">
	<nav class="navbar fixed-top navbar-light bg-light">
  		<a class="navbar-brand" href="../">DRI</a>
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

<div id="wrapper" class="panzoom-elements">

	<?php

	while( $row = mysqli_fetch_assoc($result)){
    	$resguardo[$row["id"]][] = $row;
	}

	while( $raiz = mysqli_fetch_assoc( $raices)){
    	$tree = hacer_arbol($resguardo, $raiz);
		preorder2($tree);
	} 
	?>
</div>

		<?php
			
			function hacer_arbol($resguardo, $raiz){
				$tree = [];
				$tree = $raiz;
				if(array_key_exists($raiz["id"], $resguardo)){
					foreach ($resguardo[$raiz["id"]] as $node) {
						agregar($tree, $node, $resguardo);
					}
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
					echo "<div class='entry'>";
						if (isset($root["colorlinea"])){
							$colorlinea = $root["colorlinea"];
						}else{
						$colorlinea = "darkblue";
						}
			    	echo '<span style="background-color:' . $colorlinea  . ';" class="label" id="pariente' . $root["pequeno"] . '"><a onmouseover="" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal' . $root["pequeno"] . '">';
			        echo  "<h2>" .$root["nombre"] . " (" .  $root["nacimiento"] . ")</h2>";
					echo "</a></span>";
					

			        if (array_key_exists("children", $root)) { 
			            echo "<div class='branch'>";
			            foreach ($root["children"] as $c) {
							preorder2($c);
			            }
						echo "</div>";
					}
					
			    	echo "</div>";
			    }
			}


		?>

		<?php
			while( $persona = mysqli_fetch_assoc( $todosmodal)){
				?>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal<?php echo $persona["id"]  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog text-dark" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"><?php echo $persona["nombre"] ?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p><b>Nacimiento: </b><?php echo $persona["nacimiento"] ?></p>
								<p><b>Muerte: </b><?php echo $persona["muerte"] ?></p>
								<p><b>Comentario: </b></p>
								<p><?php echo $persona["comentario"] ?></p>
								</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</div>
							</div>
						</div>
					</div>
				<?php
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
	    	$("#wrapper").panzoom("reset");
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
	    		$("#wrapper").panzoom("setMatrix", [ 1, 0, 0, 1, -x, -y ])
			}, 1000);
			var $el = document.getElementById(anclajs);
			$el.classList.add("cambio");
			setTimeout(function () { 
			    $el.classList.remove("cambio");
			}, 6000);
	    	
		});
	});
    
</script>
<script>
        (function() {
          var $panzoom = $(".panzoom-elements").panzoom();
		  $panzoom.panzoom("option", {
			minScale: 0.005,
			});
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
      </script>
</html>