<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, user-scalable=yes">
	<title>DRI</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css" integrity="sha256-YjcCvXkdRVOucibC9I4mBS41lXPrWfqY2BnpskhZPnw=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
	<style>
		#boton,
		#botonmas,
		#botonmenos {
			font-size: 16px;
		}

		.nav-mas {
			right: inherit;
		}

		.nav-menos {
			left: inherit;
		}

		.btn {
			border: solid;
			border-width: 2px black;
		}

		@font-face {
			font-family: familia;
			src: url(../fuente.ttf);
			font-weight: bold;
		}

		.familia {
			font-family: familia;
		}

		a.button4 {
			display: inline-block;
			padding: 0.3em 1.2em;
			margin: 0 0.1em 0.1em 0;
			border: 0.16em solid rgba(255, 255, 255, 0);
			border-radius: 2em;
			box-sizing: border-box;
			text-decoration: none;
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			color: #FFFFFF;
			text-shadow: 0 0.04em 0.04em rgba(0, 0, 0, 0.35);
			text-align: center;
			transition: all 0.2s;
		}

		a.button4:hover {
			border-color: rgba(255, 255, 255, 1);
		}

		@media all and (max-width:30em) {
			a.button4 {
				display: block;
				margin: 0.2em auto;
			}
		}

		.video-container {
			position: relative;
			padding-bottom: 56.25%;
			/* 16:9 */
			height: 0;
		}

		.video-container iframe {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}

		.nav-pills .nav-link.active,
		.nav-pills .show>.nav-link {
			background-color: #f14e4e;
		}
	</style>
</head>

<body class="w-100" style="background: #FEF9ED; height: 100vh;">
	<!-- <h1 class="bg-light text-center font-weight-bold" style="padding-bottom:5px;">&#x1F333; DRI &#x1F333;</h1> -->
	<div class="container">
		<div class="d-flex justify-content-center align-items-center">
			<img style="height:100px;" src="../arbol.png"><big><big>
					<h1 class="familia">DRI</h1>
				</big></big>
		</div>
		<div class="d-flex justify-content-center w-100">
			
		</div>
		<h1>Videos Tutoriales:</h1>
		<div class="row">
			<div class="col-lg-2 col-xs-12">
				<div class="nav flex-column nav-pills border" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Pesentación del autor</a>
					<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">¿De dónde proviene el apellido Dri?</a>
					<a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">¿Por qué y cómo emigraron los Dri del Friuli?</a>
					<a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Tutorial: Cómo recorrer y encontrar nombres en el árbol 1</a>
					<a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Tutorial: Cómo recorrer y encontrar nombres en el árbol 2</a>
				</div>
			</div>
			<div class="col-lg-10 col-xs-12">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active video-container" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab"><iframe width="100%" height="auto" src="https://www.youtube.com/embed/aE2NrzOckik" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
					<div class="tab-pane fade video-container" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab"><iframe width="100%" height="500" src="https://www.youtube.com/embed/aDmN9WUaCl8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
					<div class="tab-pane fade video-container" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab"><iframe width="100%" height="500" src="https://www.youtube.com/embed/-0paKshOVmw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
					<div class="tab-pane fade video-container" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab"><iframe width="100%" height="500" src="https://www.youtube.com/embed/R7cCooayxPo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
					<div class="tab-pane fade video-container" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab"><iframe width="100%" height="500" src="https://www.youtube.com/embed/ob2utZBiLMc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
				</div>
			</div>
		</div>

		<hr>
		<a href="arbol2.php" style="background-color: #4ef18f;" class="btn btn-warning btn-lg btn-block"><i class="fas fa-list-ul"></i> Ingreso al Arbol Interactivo</a>
		<h1>Comentarios:</h1>
		<div id="disqus_thread"></div>
	</div>
	<nav class="navbar fixed-bottom nav-mas">
		<img style="width: 100px; height:100px;" src="../bordehome.png">
	</nav>
	<nav class="navbar fixed-bottom nav-menos">
		<img style="width: 100px; height:100px;transform: rotate(270deg);" src="../bordehome.png">
	</nav>
	<nav class="navbar fixed-top nav-mas">
		<img style="width: 100px; height:100px;transform: rotate(90deg);" src="../bordehome.png">
	</nav>
	<nav class="navbar fixed-top nav-menos">
		<img style="width: 100px; height:100px;transform: rotate(180deg);" src="../bordehome.png">
	</nav>


	<script>
		/**
		 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
		 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
		/*
		var disqus_config = function () {
		this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
		this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
		};
		*/
		(function() { // DON'T EDIT BELOW THIS LINE
			var d = document,
				s = d.createElement('script');
			s.src = 'https://dri-nelmondo-com.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
		})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

</body>

</html>