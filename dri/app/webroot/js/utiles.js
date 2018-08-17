function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function searchNode(currentNode, value ) {

	var objetos = [];
	var objetosret = [];
    if (value.length<2) {
        return objetos;
    }
	if (currentNode.name.toLowerCase().indexOf(value.toLowerCase()) != -1){
		if (currentNode.tipo=="nodo"){
		//	console.log(currentNode);
			objetos.push(currentNode);
		}
	}

	if (!(currentNode.children === undefined)) {
		for (var nnodo = 0; nnodo < currentNode.children.length; nnodo++) {

			objetosret = searchNode(currentNode.children[nnodo],value);
			objetosret.forEach(function(item){
					objetos.push(item);
			});

		}

	}



	return objetos;



}

function maxNode(currentNode) {

	var result = 0;

	for (var ipariente = 0; ipariente < currentNode.children.length; ipariente++) {

		var currentX = currentNode.children[ipariente].x;

		if (currentX > result) {
			result = currentX;
		}

		if (!(currentNode.children[ipariente].children === undefined)) {
			currentX = maxNode(currentNode.children[ipariente]);
		}

		if (currentX > result) {
			result = currentX;
		}

	}

	return result;

}



function minNode(currentNode) {

	var result = 360;



	for (var ipariente = 0; ipariente < currentNode.children.length; ipariente++) {

		var currentX = currentNode.children[ipariente].x;



		if (currentX < result) {

			result = currentX;

		}

		if (!(currentNode.children[ipariente].children === undefined)) {

			currentX = minNode(currentNode.children[ipariente]);

		}

		if (currentX < result) {

			result = currentX;

		}

	}



	return result;



}



var nodes,

    links;

var tituloanterior = "";

var arcos = [];

var iniarconodo = 0;



function calculaarcos() {



	for ( index = 0; index < nodes.length; ++index) {

		if (nodes[index].depth == 1) {

			d = nodes[index];

			if (d.depth == 1) {

				maxChld = maxNode(d);

				minChld = minNode(d);



				if (d.radicado != tituloanterior) {

					arcos.push({

						radicado : d.radicado,

						desde : minChld,

						hasta : maxChld,

						x : maxChld

					});

					tituloanterior = d.radicado;

				} else {

					if (arcos[arcos.length - 1].x < maxChld) {

						arcos[arcos.length - 1].x = maxChld;

						arcos[arcos.length - 1].hasta = maxChld;

					}

				}

				iniarconodo = maxChld;

			}

		}

	}



}



function arcocentral() {

	var iniciaarco = 0;

	var finarco = 0;

	var t = Math.PI;

	var arcoanterior = 0;

	tituloanterior = "";

	for ( i = 0; i < arcos.length; i++) {

		if (tituloanterior != arcos[i].radicado) {

			if (i == 0) {

				iniciaarco = 0;

			} else {

				iniciaarco = arcos[i].desde + ((arcos[i - 1].hasta - arcos[i].desde) / 2);

			}



			if (arcos.length - 1 == i) {

				finarco = 360;

			} else {

				finarco = arcos[i].hasta - ((arcos[i].hasta - arcos[i + 1].desde) / 2);

			}



			relleno = ((i % 2) == 0 ? "none" : "yellow");



			tarco = (iniciaarco / 360) * t * 2;



			tfinarco = (finarco / 360) * t * 2;



			var arcP = d3.svg.arc().innerRadius(160).outerRadius(320).startAngle(tarco);



			svg.append("path").datum({

				endAngle : tfinarco

			}).style("fill", relleno).style("stroke", "black").style('stroke-width', 1).attr("fill-opacity", 0.5).attr("id", "arco" + i).attr("d", arcP);



			// Add a text label.

			var text = svg.append("text").attr("class", "arcotxt").attr("x", 50).attr("dy", 60);



			text.append("textPath").attr("stroke", "black").attr("xlink:href", "#arco" + i).text(arcos[i].radicado);

		}

	}

};



function nodoTohtml(root) {

	var htmlnodo = '';

	htmlnodo += "<p>" + root.Pariente.nombre + "</p>";

	htmlnodo += "<input type='hidden' value='" + root.Pariente.id + "'/>";

	htmlnodo += "<p>";

	if (root.Pariente.nacimiento != null) {

		htmlnodo += root.Pariente.nacimiento + "</p>";

	}

	htmlnodo += " - ";

	if (root.Pariente.muerte != null) {

		htmlnodo += root.Pariente.muerte;

	}

	htmlnodo += "</p>";

	if (root.Pariente.comentario != null) {

		htmlnodo += "<p>" + root.Pariente.comentario + "</p>";

	}

	return htmlnodo;

}



function nodoToform(root) {

	var htmlnodo = '';

	$.ajax({

		url : "nodos/form/" + root,

		success : function(data) {

			htmlnodo = data;

		},

		async : false

	});

	return htmlnodo;

}



function enviarNodo() {

	$.post('nodos/edit', $('#nodofrm').serialize(), function(data) {

		actualizaNodos();

	});



}



function eliminarNodo(id) {

	

	var r = confirm("¿Desea eliminar el nodo?");

	if (r == true) {

		$.post('nodos/delete/'+id, function(data) {

			actualizaNodos();

		});

	} 



}



function moverNodo(id, padre) {


	var r = confirm("¿Desea mover el nodo?");

	if (r == true) {

		$.post('nodos/move/'+id+'/'+padre, function(data) {

			actualizaNodos();

		});

	} 
	return r;


}





function nuevohijo(id){

	$.ajax({

		url : "nodos/nuevohijo/" + id,

		success : function(data) {

	        informacion = data;

			d3.select(".formulario").html(informacion)

		},

		async : false

	});

}



function ocultarDivInfo() {

	d3.select(".formulario").transition().duration(500).style("opacity", 0);
	d3.select(".formulario").html('');

}


function actualizaNodos() {
	location.reload();
};

function permanente(idp){
        window.location.href = window.location.href.split('?')[0]+'?id='+idp+'&ubicacion='+ubicacion;
}

function componentToHex(c) {
    var hex = c.toString(16);
    return hex.length == 1 ? "0" + hex : hex;
}

function rgbToHex(r, g, b) {
    return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
}