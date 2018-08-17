<!DOCTYPE html>
<meta charset="utf-8">

<!-- Latest compiled and minified CSS -->

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

<link rel="stylesheet" href="/dri/nodos/parametros/?<?php echo date('Ymdhis'); ?>" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="js/utiles.js?<?php echo date('Ymdhis'); ?>"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>

<script src="js/dndTree.js??<?php echo date('Ymdhis'); ?>"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/arbol.css?<?php echo date('Ymdhis'); ?>"/>
<style>
    #imgContainer { height: 600px; line-height: 600px; text-align: center }
    #imgContainer img { vertical-align: middle }
</style>
<body>
	<div id="tree-container"></div>
<div id="imgContainer" style="position:relative;">
    <img src="img/loader.gif"/>
</div>
	
</body>
</html>