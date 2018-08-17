<?php

class UbicacionsController extends AppController {
  var $name = 'Ubicacion';
  var $scaffold;

    var $components = array('RequestHandler');
public function beforeRender() {
    $this->set('title_for_layout', 'Dri');
}

function lista(){
    $this->layout = false;
    $this->autoRender = false;
    $this->loadModel("Ubicacion");
    $ubicaciones = $this->Ubicacion->find('all');
    $jsonformato=[];
    foreach($ubicaciones as $ubicacion){
        $jsonformato[]=array("label" => $ubicacion["Ubicacion"]["nombre"],
        "id" => $ubicacion["Ubicacion"]["id"]);
    }

    return  json_encode($jsonformato);

  }

}
?>
