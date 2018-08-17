function creaSVG() {

	svg = d3.select("body").append("svg").attr("width", width).attr("height", height).call(d3.behavior.zoom().on("zoom", function() {
		cx = d3.event.translate[0] + px * d3.event.scale;
		cy = d3.event.translate[1] + py * d3.event.scale;
		zoompan = "translate(" + [cx, cy] + ")" + " scale(" + d3.event.scale + ")";
		svg.attr("transform", zoompan);
	})).append("g").attr("transform", "translate(" + px + "," + py + ")");
	//   .attr("transform", "translate(" + diameter / 2 + "," + diameter / 2 + ")");

}

function buscarNodos() {
	d3.json("nodos/origen/1", function(error, root) {
		if (error)
			throw error;

		nodes = tree.nodes(root),
		links = tree.links(nodes);

		calculaarcos();
		arcocentral();

		var link = svg.selectAll(".link").data(links).enter().append("path").attr("class", function(d) {
			return d.source.depth == 1 ? "link2" : "link"
		}).attr("d", diagonal);

		var node = svg.selectAll(".node").data(nodes).enter().append("g").attr("class", "node").attr("nivel", function(d) {
			return d.depth;
		}).attr("transform", function(d) {
			if (d.y != 0) {
				return "rotate(" + (d.x - 90) + ")translate(" + d.y + ")";
			} else {
				return ""
			}
		})

		node.append("circle").attr("r", 1);

		node.append("text").attr("dy", ".31em").on("mouseover", function(d) {
			divtip.transition().duration(200).style("opacity", .9);
			divtip.html(d.name + "<br/> " + d.nacimiento + " - " + d.muerte).style("left", (d3.event.pageX) + "px").style("top", (d3.event.pageY - 28) + "px");
		}).on("mouseout", function(d) {
			divtip.transition().duration(500).style("opacity", 0);
		}).on("click", function(d) {
			if (event.ctrlKey) {
				divtip2.transition().duration(200).style("opacity", .9);
				divtip2.html(d.name).style("left", (d3.event.pageX) + "px").style("top", (d3.event.pageY - 28) + "px");

				if (!(ismousedown)) {
					fromNode = d.id;
					ismousedown = true;
				}
				tipmove();
			} else {
				if (ismousedown) {
					ismousedown = false;
					divtip2.transition().duration(500).style("opacity", 0);
					console.log(fromNode + " => " + d.id);
					idto = d.id;
					if (d.depth==0){
						idto=0;
					}	
					moverNodo(fromNode, idto);
				} else {
					divinfo.transition().duration(200).style("opacity", .9);
					informacion = nodoToform(d.id);
					divinfo.html(informacion).style("left", (10) + "px").style("top", (10) + "px");
				}
			}

		}).attr("text-anchor", function(d) {
			return d.x < 180 ? "start" : "end";
		}).attr("transform", function(d) {
			nodetrans = d.x < 181 ? "translate(8)" : "rotate(180)translate(-8)";
			if (d.depth==0){
				nodetrans = "translate(-50,-10)";
			}
			return nodetrans;
		}).text(function(d) {
			return d.name;
		});
		// .text(function(d) { return d.name+" ("+Math.round(d.x)+","+Math.round(d.y)+")"; });

	});
}

var ismousedown = false;
var fromNode;

function tipmove() {
	$(document).bind('mousemove', function(e) {
		if (ismousedown) {
			divtip2.style('left', e.clientX + 'px');
			divtip2.style('top', e.clientY + 'px');

		}
	});

	$(document).bind('keydown', function(e) {
		if (ismousedown) {
			ismousedown = false;
			divtip2.transition().duration(500).style("opacity", 0);
		}
	});
}

function actualizaNodos() {
	location.reload();
};

