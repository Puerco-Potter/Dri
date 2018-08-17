

  var directionInput = document.getElementById("direction");

  // create an array with nodes
  var nodes;
  // create an array with edges
  var edges;

  // create a network
  var container = document.getElementById('mynetwork');
      var data = {
        nodes: nodes,
        edges: edges
      };
      
    var optionsh = {
        edges: {
            smooth: {
                type: 'cubicBezier',
                forceDirection: (directionInput.value == "UD" || directionInput.value == "DU") ? 'vertical' : 'horizontal',
                roundness: 0.4
            }
        },
        layout: {
            hierarchical: {
                direction: directionInput.value
            }
        },
        physics:false
    };
    
    var optionsc = {}

    var options = optionsh;

    var network;

    function refresca(){
        $.getJSON( "/dri/pais/listajson", function( datar ) {
            nodes = new vis.DataSet( 
              datar["nodes"]
            );
            edges = new vis.DataSet( 
              datar["edges"]
            );
            data = {
            nodes: nodes,
            edges: edges
          };
          //var options = {};
            network = new vis.Network(container, data, options);
            initevent();

        });
    }

    function initevent(){

        network.on("click", function (params) {
            params.event = "[original event]";
         //   document.getElementById('seleccion').innerHTML = '<h2>Click event:</h2>' + JSON.stringify(params, null, 4);
        });
    }

    function niveles(vtipo){
       if (vtipo=='H'){
          options=optionsh;
       }else{
          options=optionsc;
       }
    }