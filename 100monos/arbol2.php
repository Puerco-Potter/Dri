<?php
		require('conexion.php');
		require('redireccion.php');
        
?>
<!DOCTYPE html>
<html class="h-100" lang="es">
<head>
<title>DRI</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<LINK href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="mousewheel/jquery.mousewheel.min.js"></script>
	<script src="panzoom/dist/jquery.panzoom.min.js"></script>
	<LINK href="fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	

	<?php
		//$sql = "SELECT p1.id, p2.nombre, p2.nacimiento, p2.id as pequeno, p2.nombre FROM pariente p1 INNER JOIN pariente p2 ON p1.id = p2.padre_id ORDER BY p1.id";
		$sql = "SELECT p1.id, p2.nombre, p2.nacimiento, p2.id as pequeno, p2.orden , p2.origen_id, u.colorlinea, p2.tamano, u.texto, p2.galeria FROM pariente p1 INNER JOIN (pariente p2 left JOIN ubicacion u ON p2.origen_id = u.id) ON p1.id = p2.padre_id ORDER BY p1.id, p2.orden";
		$result = $conn->query($sql);

		$sql2 = "SELECT p1.id, p1.nombre, p1.nacimiento, p1.padre_id, p1.id as pequeno, u.colorlinea, p1.tamano, u.texto, p1.galeria FROM pariente p1 left JOIN ubicacion u ON p1.origen_id = u.id WHERE p1.padre_id IS NULL ORDER BY p1.id";
		$raices = $conn->query($sql2);

		$sql3 = "SELECT * FROM pariente";
		$todos = $conn->query($sql3);

		$sql4 = "SELECT * FROM lugares";
		$lugares = $conn->query($sql4);

		$sql5 = "SELECT * FROM personalizacion";
		$personalizacion = $conn->query($sql5);
		$colores = mysqli_fetch_assoc($personalizacion);
		$colorcuadro = $colores["cuadro"];
		$colortexto = $colores["texto"];
		$largo_linea= $colores["largo_linea"] * 100;
		
		$sql6 = "SELECT p.id, p.nombre, p.nacimiento, p.muerte, p.comentario, o.nombre as origen, r.nombre as ubicacion, p.galeria FROM (pariente p left join ubicacion o ON o.id = origen_id) left join ubicacion r ON r.id = origen_id";
		$todosmodal = $conn->query($sql6);
	?>
    <style>
        body{
            width: 100vw !important;
            height: 100vh !important;
			color: <?php echo $colores["texto"]; ?>;
			background: <?php echo $colores["fondo"]; ?>;
			overflow-x: hidden;
    		overflow-y: hidden;
        }

        #wrapper {
		width:1000%;
		}

		.h2Grande p {
			font-size: 10rem;
			font-weight: 400 !important;
		}
		.h2Grande h1 {
			font-size: 19rem;
			font-weight: 400 !important;
		}
		.h2Grande h2 {
			font-size: 16rem;
			font-weight: 400 !important;
		}
		.h2Grande h3 {
			font-size: 13.5rem;
			font-weight: 400 !important;
		}
		.h2Grande {
			font-size: 10rem;
			font-weight: 400 !important;
		}

		.x {
			font-size: 4rem;
			font-weight: 400 !important;
		}
		.x p{
			font-size: 4rem;
			font-weight: 400 !important;
		}
		.x h1{
			font-size: 10rem;
			font-weight: 400 !important;
		}
		.x h2{
			font-size: 8rem;
			font-weight: 400 !important;
		}
		.x h3{
			font-size: 6rem;
			font-weight: 400 !important;
		}

        .hijos{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .nombre{
            border: 3px solid black;
            margin-top:5px;
            margin-bottom:5px;
            background-color: <?php echo $colores["cuadro"]; ?>;
        }
		
		.cajitaNombre{
            width: <?php echo $largo_linea ?>px;
			align-items: center !important;
            justify-content: flex-start !important;
            display: flex !important;
			flex-shrink: 0;
        }

        .cajon::before{
            height: 15px;
            content: "";
			width: 200px;
            border-bottom: 15px solid <?php echo $colores["lineas"]; ?>;
            top:0;
            bottom:0;
            left:0;
        }

        

        .hijos > .cajon:first-child{
            border-left: 15px solid <?php echo $colores["lineas"]; ?>;
            border-image: linear-gradient(to top, <?php echo $colores["lineas"]; ?> calc(50% + 7.5px),rgba(1,1,1,0) calc(50% + 7.5px));
            border-image-slice: 1;
            overflow-x: auto;
        }

        .hijos > .cajon:last-child{
            border-left: 15px solid <?php echo $colores["lineas"]; ?>;
            border-image: linear-gradient(to bottom, <?php echo $colores["lineas"]; ?> calc(50% + 7.5px),rgba(1,1,1,0) calc(50% + 7.5px));
            border-image-slice: 1;
            overflow-x: auto;
        }

        .hijos > .cajon:only-child{
            border-left: none;
            border-image: none;
        }

        .hijos > .cajon:only-child::before{
			width: 215px;
        }

        .delante{
            min-width: 200px;
            border-bottom: 15px solid <?php echo $colores["lineas"]; ?>;
			flex-grow: 1;
        }

        .cajon{
            /*flex-basis:1;*/
            flex-grow: 1;
            border-left: 15px solid <?php echo $colores["lineas"]; ?>;
            align-items: center !important;
            justify-content: flex-start !important;
            display: flex !important;
        }

        .cajitaNombre:last-child > .delante{
            width: 0 !important;
            min-width: 0 !important;
            flex-grow: 0 !important;
        }

        .raiz > .cajon::before{
			width: 0px;
        }

        .raiz > .cajon{
            border-left: none;
            border-image: none;
        }


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



<body>

    <!-- Aca empieza en serio -->
    <nav class="navbar fixed-top navbar-light bg-light">
  		<a class="navbar-brand" href="../">DRI</a>
  		<div class="form-inline w-75">
    		<input id="selected" list="gente" type="text" name="busqueda" class="form-control mr-sm-2 w-75 nombreGente" placeholder="Nombre / Nome / Name">
			<datalist id="gente">

			<?php
				while( $persona = mysqli_fetch_assoc( $todos)){
					echo '<option data-value="' . $persona["id"] . '" value="';
					if ($persona["nacimiento"] == ""){
						$linea_nombre = trim(strip_tags(str_replace (array("\r\n", "\n", "\r", "\""), '', $persona["nombre"])));
					}else{
						$linea_nombre = trim(strip_tags(str_replace (array("\r\n", "\n", "\r", "\""), '', $persona["nombre"] . "(" . $persona["nacimiento"] . ")")));
					}
					echo $linea_nombre;
					echo '"></option>';
				} 
			?>
			</datalist>
			<button id="boton" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i>
			</button>
    		<!-- <span class="btn btn-outline-success my-2 my-sm-0 botonDeBusqueda">Search</span> -->
  		</div>
	</nav>

    <div id="wrapper" class="panzoom-elements">

	<?php

	while( $row = mysqli_fetch_assoc($result)){
    	$resguardo[$row["id"]][] = $row;
	}

	while( $raiz = mysqli_fetch_assoc( $raices)){
        $tree = hacer_arbol($resguardo, $raiz);
        echo '<div class="raiz">';
        preorder2($tree);
        echo '</div>';
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
					global $colorcuadro;
					global $colortexto;
			    if ($root) {
					if (isset($root["tamano"]) and $root["tamano"]==1){
						$clase= "h2Grande";
					}else{
						$clase = "";
					}
					if (isset($root["colorlinea"])){
						$colorlinea = $root["colorlinea"];
					}else{
					$colorlinea = $colorcuadro;
					}
					if (isset($root["texto"]) and $root["texto"]!=""){
						$texto = $root["texto"];
					}else{
					$texto = $colortexto;
					}

					if ($root["nacimiento"] == ""){
						$linea_nombre = $root["nombre"];
					}else{
						if (substr($root["nombre"], -3)== "p> "){
							$linea_nombre = str_replace ("</p> <ano>", ' ', $root["nombre"] . "<ano>(" . $root["nacimiento"] . ")</p>");
						}else if (substr($root["nombre"], -2)== "> ")
						{
							$linea_nombre = $root["nombre"] . "<p>(" . $root["nacimiento"] . ")</p>";
						}else{
							$linea_nombre =  $root["nombre"] . " (" . $root["nacimiento"] . ")";
						}
						
					}

					echo "<div class='cajon'>";
					echo "<div class='cajitaNombre'>";
					echo '<div class="nombre" id="pariente' . $root["pequeno"] . '" style="background-color:' . $colorlinea  . ';color:' . $texto .'"><a onmouseover="" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal' . $root["pequeno"] . '">';
			        echo  "<div class='x ". $clase . "'>" . $linea_nombre . "</div>";
                    echo "</a></div>";
					echo '<div class="delante"></div>';
					echo "</div>";
					

			        if (array_key_exists("children", $root)) { 
			            echo "<div class='hijos'>";
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
					<div class="modal fade" id="exampleModal<?php echo $persona["id"]  ?>" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog text-dark" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<div class="modal-title"><?php echo $persona["nombre"] ?></div>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<?php if ($persona["nacimiento"]){ ?>
								<p><b>Nacimiento: </b><?php echo $persona["nacimiento"] ?></p>
								<?php } ?>
								<?php if ($persona["muerte"]){ ?>
								<p><b>Muerte: </b><?php echo $persona["muerte"] ?></p>
								<?php } ?>
								<p><b>Origen: </b><?php echo $persona["origen"] ?></p>
								<p><b>Ubicación Final: </b><?php echo $persona["ubicacion"] ?></p>
								<?php if ($persona["comentario"]){ ?>
								<p><b>Comentario: </b></p>
								<p><?php echo $persona["comentario"] ?></p>
								<?php } ?>
								<p><b>Numero Interno: </b><?php echo $persona["id"] ?></p>
								<?php if ($persona["galeria"]){ ?>
                                <p><b>Galeria de Fotos: </b>
									<a target="_blank" rel="noopener noreferrer" class="btn btn-success" href="<?php echo $persona["galeria"] ?>">Abrir Galeria</a>
								</p>
								<?php } ?>
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


		<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Buscando" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-dark text-center">
	  	<img src="lupa.gif" class="img-fluid" alt="Responsive image">
		<h2>Buscando Pariente</h2>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="NoExiste" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content alert-danger">
	<div class="modal-header alert-danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark text-center alert-danger">
	  	<img src="noExiste.png" class="img-fluid" alt="Responsive image">
		<h2>Pariente No Encontrado</h2>
      </div>
    </div>
  </div>
</div>

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
			$('#Buscando').modal({
				backdrop: 'static',
				keyboard: false
			});
	    	$("#wrapper").panzoom("reset");
			//Agregar cartelito de buscando
	        var value = $('#selected').val();
	        var valor = "" + $('#gente [value="' + value + '"]').data('value');
	        var ancla = "#pariente" + valor;
	        var anclajs = "pariente" + valor;
	        //$('html, body').animate({
    		//	scrollTop: $(ancla).offset().top -100
	    	//}, 1000);
	    	
	    	setTimeout(function () { 
                console.log($(ancla).offset().top);
			    var y = $(ancla).offset().top - 100;
	    		var x = $(ancla).offset().left;
	    		$("#wrapper").panzoom("setMatrix", [ 1, 0, 0, 1, -x, -y ])
			}, 2500);
			var $el = document.getElementById(anclajs);
			if (!$el) {
				setTimeout(function () { 
					$('#Buscando').modal('hide');
					$('#NoExiste').modal({});
				}, 2500);
				
			}else{
				$el.classList.add("cambio");
				setTimeout(function () { 
					$('#Buscando').modal('hide');
				}, 2500);
				setTimeout(function () { 
					$el.classList.remove("cambio");
				}, 6000);
			}
			
	    	
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