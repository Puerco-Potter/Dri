<?php
$lang = $_GET['lang'];
switch ($lang) {
	case 'ESP':
		$video1 = "aE2NrzOckik";
		$video2 = "aDmN9WUaCl8";
		$video3 = "-0paKshOVmw";
		$video4 = "R7cCooayxPo";
		$video5 = "ob2utZBiLMc";
		$videotitulo1 = "Presentación del autor";
		$videotitulo2 = "¿De dónde proviene el apellido Dri? ";
		$videotitulo3 = "¿Por qué  y  cómo emigraron los Dri del Friuli?";
		$videotitulo4 = "Tutorial: Cómo recorrer y encontrar nombres en el árbol 1 ";
		$videotitulo5 = "Tutorial: Cómo recorrer y encontrar nombres en el árbol 2 ";
		$comentarios = "Comentarios";
		$contador = "Contador de Visitas";
		$ingreso = "Acceso al árbol genealógico";
		$idiomaJS = "esp";
		$contacto= "Email de contacto";
		break;
	case 'ITA':
		$video1 = "uD8M2a_VS3Y";
		$video2 = "WqIKHzgQBNk";
		$video3 = "hsnTlMHxowU";
		$video4 = "rP7crw6_VJo";
		$video5 = "mOPHU72ditQ";
		$videotitulo1 = "Presentazione personale  dell´ autore. ¿Come è nata l'idea dell'albero genealógico dei Dri?";
		$videotitulo2 = "Qual è l'origine del cognome Dri?";
		$videotitulo3 = "Perché i friulani sono emigrati?";
		$videotitulo4 = "Come percorrere l´albero genealógico 1";
		$videotitulo5 = "Come percorrere l´albero genealógico 2";
		$comentarios = "Commenti";
		$contador = "Visite";
		$ingreso = "Accedere all´albero";
		$idiomaJS = "it";
		$contacto= "Contatto email";
		break;
	case 'POR':
		$video1 = "muIpIddmZH0";
		$video2 = "ft_pj0KlzsY";
		$video3 = "PChx1zMWitI";
		$video4 = "Tsi5fSav54Q";
		$video5 = "NOBWtlqseAc";
		$videotitulo1 = "Apresentação pessoal do autor";
		$videotitulo2 = "Quál é a origem do sobrenome Dri?";
		$videotitulo3 = "Por que emigraram nossos antepassados de Friuli?";
		$videotitulo4 = "Como percorrer a árvore e encontrar um nome 1";
		$videotitulo5 = "Como percorrer a árvore e encontrar um nome 2";
		$comentarios = "Comentários";
		$contador = "Visitas";
		$ingreso = "Acessar a árvore genealógica dos Dri";
		$idiomaJS = "pt";
		$contacto= "Email de contato";
		break;
	case 'ING':
		$video1 = "mwLODNVMzg0";
		$video2 = "WkSCMhD2P2M";
		$video3 = "RPKIPGACRYk";
		$video4 = "xGF6RLbuOk8";
		$video5 = "bGBVGwgi6uE";
		$videotitulo1 = "Author's personal presentation. How did the idea of the genealogy tree come about?";
		$videotitulo2 = "Where does the ‘Dri’ surname come from?";
		$videotitulo3 = "Migration from Friuli";
		$videotitulo4 = "Genealogy tree tutorial 1";
		$videotitulo5 = "Genealogy tree tutorial 2";
		$comentarios = "comments";
		$contador = "Visits";
		$ingreso = "Access to the family tree";
		$idiomaJS = "en";
		$contacto= "Contact email";
		break;
	case 'FRA':
		$video1 = "XxzW2DG3Fho";
		$video2 = "OlxIXAGShQE";
		$video3 = "j97IsNdwUjg";
		$video4 = "biQVFNjU1XM";
		$video5 = "mOPHU72ditQ";
		$videotitulo1 = "Présentation personnelle de l'auteur";
		$videotitulo2 = "Comment l´idée de l´arbre généalogique est-elle née?  D´où vient le nom DRI?";
		$videotitulo3 = "TUTORIEL pour l´arbre généalogique 1";
		$videotitulo4 = "TUTORIEL pour l´arbre généalogique 2";
		$videotitulo5 = "Come percorrere l´albero genealógico 2";
		$comentarios = "Commentaires";
		$contador = "Visites";
		$ingreso = "Accéder  à l'arbre généalogique";
		$idiomaJS = "fr";
		$contacto= "Email du contact";
		break;
}
?>

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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


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

		.nav-pills .nav-link {
			border-radius: .25rem;
			border: 1px solid black;
			background: white;
			color: red;
		}
	</style>
</head>

<body class="w-100" style="background: #F4EAD0; height: 100vh;">
	<!-- <h1 class="bg-light text-center font-weight-bold" style="padding-bottom:5px;">&#x1F333; DRI &#x1F333;</h1> -->
	<div class="container">
		<div class="d-flex justify-content-center align-items-center">
			<img style="height:100px;" src="../arbol.png"><big><big>
					<h1 class="familia">DRI</h1>
				</big></big>
		</div>
		<div class="d-flex justify-content-center w-100">

		</div>
		<br />
		<!-- <h1>Videos Tutoriales:</h1> -->
		<div class="row">
			<div class="col-lg-2 col-xs-12">
				<div class="nav flex-column nav-pills border" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true"><?php echo $videotitulo1 ?></a>
					<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false"><?php echo $videotitulo2 ?></a>
					<a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false"><?php echo $videotitulo3 ?></a>
					<a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false"><?php echo $videotitulo4 ?></a>
					<a class="nav-link <?php if($_GET['lang'] == 'FRA'){ echo 'd-none'; } ?>" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false"><?php echo $videotitulo5 ?></a>
				</div>
			</div>
			<div class="col-lg-10 col-xs-12">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active video-container myVideoClass" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab"><iframe id="video1" width="100%" height="auto" src="https://www.youtube.com/embed/<?php echo $video1 ?>?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
					<div class="tab-pane fade video-container myVideoClass" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab"><iframe id="video2" width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $video2 ?>?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
					<div class="tab-pane fade video-container myVideoClass" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab"><iframe id="video3" width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $video3 ?>?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
					<div class="tab-pane fade video-container myVideoClass" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab"><iframe id="video4" width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $video4 ?>?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
					<div class="tab-pane fade video-container myVideoClass <?php if($_GET['lang'] == 'FRA'){ echo 'd-none'; } ?>" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab"><iframe id="video5" width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $video5 ?>?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
				</div>
			</div>
		</div>

		<hr>
		<div class="d-flex justify-content-center align-items-center w-100">
			<a href="arbol2.php" style='background-color: #4ef18f; color:black;' class="button4 btn-lg btn-lg">🌳 <?php echo $ingreso ?></a>
		</div>
		<div class="d-flex justify-content-center align-items-center w-100">
			<p class="text-muted"><?php echo $contacto ?>: roberto-dri@hotmail.com</p>
		</div>
		<h1><?php echo $contador ?>:</h1>
		<!-- Start of CuterCounter Code -->
		<a href="https://www.webfreecounter.com/" target="_blank"><img src="https://www.cutercounter.com/hits.php?id=hemxxaqpc&nd=6&style=9" border="0" alt="hit counter"></a>
		<!-- End of CuterCounter Code -->
		<h1><?php echo $comentarios ?>:</h1>
		<div id="disqus-wrapper">
			<div id="disqus_thread"></div>
		</div>
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
		// RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
		// LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

		var disqus_config = function() {
			this.language = "<?php echo $idiomaJS ?>";
		};

		(function() { // DON'T EDIT BELOW THIS LINE
			var d = document,
				s = d.createElement('script');
			s.src = 'https://dri-nelmondo-com.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
		})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	<script>
		var player;

		// this function gets called when API is ready to use
		function onYouTubePlayerAPIReady() {
			// create the global player from the specific iframe (#video)
			player1 = new YT.Player('video1', {
				events: {
					// call this function when player is ready to use
					'onReady': onPlayerReady
				}
			});
			player2 = new YT.Player('video2', {
				events: {
					// call this function when player is ready to use
					'onReady': onPlayerReady
				}
			});
			player3 = new YT.Player('video3', {
				events: {
					// call this function when player is ready to use
					'onReady': onPlayerReady
				}
			});
			player4 = new YT.Player('video4', {
				events: {
					// call this function when player is ready to use
					'onReady': onPlayerReady
				}
			});
			player5 = new YT.Player('video5', {
				events: {
					// call this function when player is ready to use
					'onReady': onPlayerReady
				}
			});
		}

		function onPlayerReady(event) {

			// bind events

		}
		// Inject YouTube API script
		var tag = document.createElement('script');
		tag.src = "//www.youtube.com/player_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		$('.nav-link').click(function() {
			player1.pauseVideo();
			player2.pauseVideo();
			player3.pauseVideo();
			player4.pauseVideo();
			player5.pauseVideo();
		});
	</script>

</body>

</html>