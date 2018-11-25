<!DOCTYPE html>
<html>
<head>
	<title>prueba zoom</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="panzoom/dist/jquery.panzoom.js"></script>
	<script src="wheel/jquery.mousewheel.js"></script>
	<style>
		 /* The animation code */
		@keyframes example {
		    from {background-color: red;}
		    to {background-color: yellow;}
		}

		/* The element to apply the animation to */
		.cambio {
		    animation-name: example;
		    animation-duration: 4s;
		} 
	</style>
</head>
<body>
	<h1>Titulooooo1</h1>
	<button id="boton">Reset</button>
	<div id="panzoom" class="panzoom-elements blink-div">
		<h1>Titulooooo</h1>
		<h3>Titulo</h3>
	</div>

</body>

<section id="focal">
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

        $( "#boton" ).click(function() {
	  		$(".panzoom-elements").panzoom("panzoom");
			var $el = document.getElementById("panzoom");
			$el.classList.add("cambio");
			setTimeout(function () { 
			    $el.classList.remove("cambio");
			}, 4000);

			;
		});
      </script>
    </section>

</html>