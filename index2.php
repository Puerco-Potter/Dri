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
	<style>
	#boton, #botonmas, #botonmenos{
		font-size: 16px;
	}
	.nav-mas{
		right: inherit;
	}
	.nav-menos{
		left: inherit;
	}
	.btn{
		border: solid;
		border-width: 2px black;
	}
	@font-face {
		font-family: familia;
		src: url(fuente.ttf);
		font-weight: bold;
	}
	.familia {
		font-family: familia;
	}
	a.button4{
		display:inline-block;
		padding:0.3em 1.2em;
		margin:0 0.1em 0.1em 0;
		border:0.16em solid rgba(255,255,255,0);
		border-radius:2em;
		box-sizing: border-box;
		text-decoration:none;
		font-family:'Roboto',sans-serif;
		font-weight:300;
		color:#FFFFFF;
		text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);
		text-align:center;
		transition: all 0.2s;
	}
	a.button4:hover{
		border-color: rgba(255,255,255,1);
	}
	@media all and (max-width:30em){
	 a.button4{
		display:block;
		margin:0.2em auto;
	 }
	}
	body{
		font-size:1.5rem;
	}
	</style>
</head>
<body class="w-100" style="background: #FEF9ED; height: 100vh;">
<!-- <h1 class="bg-light text-center font-weight-bold" style="padding-bottom:5px;">&#x1F333; DRI &#x1F333;</h1> -->
	<div class="container d-flex flex-column justify-content-center align-items-center">
		<div>
			<br>
		</div>
		
		<div class="d-flex justify-content-center d-md-none">
			<img style="height:300px;" src="arbol.png">
		</div>
		<div class="d-none d-md-block w-100">
			<div class= "row w-100 d-flex justify-content-center align-items-center" style="height:90vh">
				<div class="col-sm-4">
					<div class="d-flex align-items-center" style="height:100px">
						<a class="button4" style="background-color:#f14e4e" href="100monos/videosESP.php"><span class="flag-icon flag-icon-es"></span> Árbol genealógico</a>
					</div>
					<div class="d-flex align-items-center justify-content-end" style="height:100px">
						<a class="button4" style="background-color:#f1bb4e" href="benvenuti.htm"><span class="flag-icon flag-icon-it"></span> L`Albero Genealógico</a>
					</div>
					<!-- <div class="d-flex align-items-center" style="height:100px">
						<a class="button4" style="background-color:#84f14e" href="Benvindos.htm"><span class="flag-icon flag-icon-pt"></span> Árvore Genealógica</a>
					</div> -->
				</div>
				<div class="col-sm-4 d-flex flex-column justify-content-center p-0">
					<div class="d-flex align-items-center justify-content-center" style="height:100px">
						<a class="button4" style="background-color:#84f14e" href="Benvindos.htm"><span class="flag-icon flag-icon-pt"></span> Árvore Genealógica</a>
					</div>
					<img class="img-fluid" src="arbol.png">
					<div class="d-flex justify-content-center w-100">
						<big><big><h1 class="familia">DRI</h1></big></big>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="d-flex align-items-center justify-content-end" style="height:100px">
						<a class="button4" style="background-color:#4ef18f" href="WELCOME.HTM"><span class="flag-icon flag-icon-gb"></span> Family Tree</a>
					</div>
					<div class="d-flex align-items-center" style="height:100px">
						<a class="button4" style="background-color:#4e9af1" href="WELCOME.HTM"><span class="flag-icon flag-icon-fr"></span> L'arbre généalogique</a>
					</div>
					<!-- <div class="d-flex align-items-center justify-content-end" style="height:100px">
						<a href="something" class="button4" style="background-color:#9a4ef1">Button 6</a>
					</div> -->
				</div>
			<br>
			<!-- <div class="d-flex justify-content-center w-100">
				<h5 class="text-muted">Proyecto iniciado el 30
			de enero de 2001. Con actualizacion constante desde entonces.</h5>
			</div> -->
			
			
			</div>
		</div>
		<div class= "row d-md-none">
			<div class="w-100">
				<div class="d-flex w-100 flex-column justify-content-center" style="height:100px">
					<a class="button4" style="background-color:#84f14e" href="Benvindos.htm"><span class="flag-icon flag-icon-pt"></span> Árvore Genealógica</a>
				</div>
				<div class="d-flex w-100 flex-column justify-content-center" style="height:100px">
					<a class="button4" style="background-color:#f14e4e" href="Bienve_cast.htm"><span class="flag-icon flag-icon-es"></span> Árbol genealógico</a>
				</div>
				<div class="d-flex w-100 flex-column justify-content-center" style="height:100px">
					<a class="button4" style="background-color:#f1bb4e" href="benvenuti.htm"><span class="flag-icon flag-icon-it"></span> L` Albero Genealógico</a>
				</div>
				<div class="d-flex w-100 flex-column justify-content-center" style="height:100px">
					<a class="button4" style="background-color:#4ef18f" href="WELCOME.HTM"><span class="flag-icon flag-icon-gb"></span> Family Tree</a>
				</div>
				<div class="d-flex w-100 flex-column justify-content-center" style="height:100px">
					<a class="button4" style="background-color:#4e9af1" href="WELCOME.HTM"><span class="flag-icon flag-icon-fr"></span> L 'arbre généalogique</a>
				</div>
				<div class="d-flex w-100 flex-column justify-content-center" style="height:100px">
					<!--<a href="something" class="button4" style="background-color:#9a4ef1">Button 6</a>-->
				</div>
			</div>
		<br>
		<!-- <div class="d-flex justify-content-center w-100">
			<h5 class="text-muted">Proyecto iniciado el 30
        de enero de 2001. Con actualizacion constante desde entonces.</h5>
		</div> -->
		<div class="d-flex justify-content-center w-100 d-md-none">
			<big><big><h1 class="familia">DRI</h1></big></big>
		</div>
		
		</div>
		<div class="d-flex justify-content-around">
			<!-- <a href="dri/" class="btn btn-success btn-lg">Arbol Genealogico Interactivo</a>
			<a href="100monos/arbol2.php" class="btn btn-danger btn-lg">Arbol Genealogico Interactivo 2.0 Beta</a> -->
		</div>
		<hr>
	</div>
	<nav class="navbar fixed-bottom nav-mas">
		<img style="width: 100px; height:100px;" src="bordehome.png">
	</nav>
	<nav class="navbar fixed-bottom nav-menos">
		<img style="width: 100px; height:100px;transform: rotate(270deg);" src="bordehome.png">
	</nav>
	<nav class="navbar fixed-top nav-mas">
		<img style="width: 100px; height:100px;transform: rotate(90deg);" src="bordehome.png">
	</nav>
	<nav class="navbar fixed-top nav-menos">
		<img style="width: 100px; height:100px;transform: rotate(180deg);" src="bordehome.png">
	</nav>
</body>
</html>