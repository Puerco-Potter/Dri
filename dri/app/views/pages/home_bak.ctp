<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" media="all" href="css/diagrama.css" />
		<script src="//d3js.org/d3.v3.min.js"></script>
		<script src="http://d3.geotheory.co.uk/d3-transform.js"></script>
		<script src="js/utiles.js"></script>
		<script src="js/nodos.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	</head>
	<body></body>

	<script>
		//d3.select(self.frameElement).style("height", diameter - 150 + "px");
		var divtip = d3.select("body").append("div").attr("class", "tooltip").style("opacity", 0);
		var divtip2 = d3.select("body").append("div").attr("class", "tooltip2").style("opacity", 0);

		// Define the div for the tooltip
		var divinfo = d3.select("body").append("div").attr("class", "info").attr("z-order", "2000").style("opacity", 0);

		var arc = d3.svg.arc().innerRadius(90).outerRadius(180).startAngle(0);

		var diameter = 960;
		var px = 450;
		var py = 320;
		var width = "100%", //960,
		    height = "100%", //500,
		    τ = 2 * Math.PI;
		// http://tauday.com/tau-manifesto

		var tree = d3.layout.tree()
		/* .size([360, diameter / 2 - 120])*/.size([360, diameter / 2 - 0]).separation(function(a, b) {
			return (a.parent == b.parent ? 1 : 2) / a.depth;
		});

		var diagonal = d3.svg.diagonal.radial().projection(function(d) {
			return [d.y, d.x / 180 * Math.PI];
		});

		var zoompan = "";
		
		var svg;
		
		creaSVG();

		buscarNodos();

	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</html>