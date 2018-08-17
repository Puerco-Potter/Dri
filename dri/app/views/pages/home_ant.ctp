<!doctype html>
<html>
<head>
  <title>DRI</title>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.15.0/vis.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.15.0/vis.css" rel="stylesheet" type="text/css" />

  <style type="text/css">
    #mynetwork {
      width: 75%;
      height: 90%;
      border: 1px solid lightgray;
      margin:0 auto;
      float: right;
    }
    #panelmain {
      width: 100%;
      height: 100%;
      border: 0px solid lightgray;
      margin:0 auto;
    }

    #panelder {
      float: left;
      width: 25%;
      margin-right: -50px;
      /*background-color: #FFA;*/
    }

    html,body { height: 100%; margin: 0px; padding: 0px; }
      #full { background: #0f0; height: 100% }
  </style>
</head>
<body>
  <!--
<p>
    <input type="button" id="btn-UD" value="Up-Down">
    <input type="button" id="btn-DU" value="Down-Up">
    <input type="button" id="btn-LR" value="Left-Right">
    <input type="button" id="btn-RL" value="Right-Left">
</p>
-->

<input type="hidden" id='direction' value="DU">
<div id='panelmain'>
  <div id="panelder">
    <input type="checkbox" id="niveles" name="niveles" value="niveles" checked="checked">Niveles<br>
    <p id="seleccion">nada seleccionado</p>
  </div>

  <div id="mynetwork"></div>

  <p id="selection"></p>
</div>
<script type="text/javascript" src="js/diagrama.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
      $('#niveles').change(function () {
             vn=$('#niveles').is(':checked');
             if (vn){
                niveles('H');
             }else{
                niveles('C');
             }
        refresca();
       });

        refresca();
        
        network.on("click", function (params) {
            params.event = "[original event]";
            document.getElementById('seleccion').innerHTML = '<h2>Click event:</h2>' + JSON.stringify(params, null, 4);
        });
     });
</script>
</body>
</html>
