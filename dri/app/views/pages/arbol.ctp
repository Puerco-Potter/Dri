<!DOCTYPE html>
<meta charset="utf-8">
<html ng-app="driApp">
<!--
<link rel="stylesheet" type="text/css" media="all" href="css/arbol.css"/>
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
<script src="js/app.js"></script>
<!--
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="js/dndtreebox.js"></script>
-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<body  ng-controller="parientesController">
<div class="panel panel-default">
  <div class="panel-heading">
  	<span ng-click="atras(rutapadres[rutapadres.length-1])" class="glyphicon glyphicon-zoom-out" aria-hidden="true"></span>
  	<ol class="breadcrumb">
  	<li ng-repeat="ruta in rutapadres">{{ ruta.nombre }}</li> 
	</ol>
  	</div>
  <div class="panel-body">
  	
      <table class="table table-bordered table-striped" >
      	<tr>
      	    <th>&nbsp;</th>
      	    <th>&nbsp;</th>
      	    <th>&nbsp;</th>
      	    <th>Nombre</th>
      		<th>Radicado</th>
      		<th>Comentario</th>
      	    <th>&nbsp;</th>
      	</tr>
      	<tr  ng-repeat="pariente in parientes">
      	    <td>
      	    	<span ng-click="ver(pariente.Pariente)" class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
      	    </td>
      	    <td>
      	    	<a href="/dri/?id={{ pariente.Pariente.id }}&ubicacion=0"><span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span></a>
      	    </td>
      	    <td>
      	    	<a href="/dri/?id={{ pariente.Pariente.id }}&ubicacion=0&editable=1"><span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span></a>
      	    </td>
      	    <td>{{pariente.Pariente.nombre}}</td>
      		<td>{{pariente.Radicado.nombre}}</td>
      	    <td>{{pariente.Pariente.comentario}}</td>
      	    <td>{{pariente.Pariente.orden}}</td>
      	</tr>
      </table>
  </div>
</div>
</body>
</html>