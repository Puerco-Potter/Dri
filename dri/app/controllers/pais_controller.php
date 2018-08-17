<?php
class PaisController extends AppController {
  var $name = 'Pais';
  var $scaffold;
  var $components = array('RequestHandler');
  
  function lista(){
    $this->layout = false;
   // Configure::write('debug', 0);
    $this->RequestHandler->respondAs('text');
    $this->loadModel("Pais");
    $paises = $this->Pais->find('all');
    $jsonformato=[];
    foreach($paises as $pais){
        $jsonformato[]=array("label" => $pais["Pais"]["nombre"],
        "id" => $pais["Pais"]["id"]);
    }
    $this->set('paises', $paises);
    $this->set('paisesjson', json_encode($paises));
    $this->set('paisesjson2', json_encode($jsonformato));
  }

  function listajson(){
    $fontpais = array("size"=>24, "color"=>'red', "face"=>'sans');
    $fontprovincia = array("size"=>18, "color"=>'blue', "face"=>'sans');
    $fontciudad = array("size"=>14, "color"=>'yellow', "face"=>'sans');
    $this->layout = false;
   // Configure::write('debug', 0);
    $this->RequestHandler->respondAs('text');
    $this->loadModel("Pais");
    $this->loadModel("Provincia");
    $this->loadModel("Ciudad");
    $this->loadModel("Relacionciudad");
    $this->loadModel("Persona");
    $paises = $this->Pais->find('all');
    $jsonformato=[];
    $relacionjson=[];
    foreach($paises as $pais){
        $jsonformato[]=array("label" => $pais["Pais"]["nombre"],
                             "id" => (int)$pais["Pais"]["id"],
                             "level"=>1, "color"=> 'lime', "font"=> $fontpais);
        
        $provincias = $this->Provincia->find('all', 
                                             array('conditions' => array('Provincia.pais_id' => $pais["Pais"]["id"])));
        foreach($provincias as $provincia){
            $jsonformato[]=array("label" => $provincia["Provincia"]["nombre"],
                                "id" => (int)$provincia["Provincia"]["id"]+1000,
                                "level"=>2, "color"=> 'yellow');
            $relacionjson[]=array("from" => (int)$pais["Pais"]["id"],
                                  "to" => (int)$provincia["Provincia"]["id"]+1000,
                                  "arrows"=>"to");
            
            $ciudades = $this->Ciudad->find('all', 
                                             array('conditions' => array('Ciudad.provincia_id' => $provincia["Provincia"]["id"])));
            foreach($ciudades as $ciudad){
                $jsonformato[]=array("label" => $ciudad["Ciudad"]["nombre"],
                                     "id" => (int)$ciudad["Ciudad"]["id"]+2000,
                                     "level"=>3, "color"=> 'purple');
                $relacionjson[]=array("from" => (int)$provincia["Provincia"]["id"]+1000,
                                      "to" => (int)$ciudad["Ciudad"]["id"]+2000,
                                      "arrows"=>"to");
                
                $relacionc = $this->Relacionciudad->find('all', 
                                                         array('conditions' => array('Relacionciudad.hasta_id' => $ciudad["Ciudad"]["id"])));
                foreach($relacionc as $relacion){
                    $jsonformato[]=array("label" => $relacion["Persona"]["nombre"]." \n ".$relacion["Persona"]["apellido"],
                                         "id" => (int)$relacion["Persona"]["id"]+3000,
                                         "level"=>4);
                    $relacionjson[]=array("from" => (int)$ciudad["Ciudad"]["id"]+2000,
                                          "to" => (int)$relacion["Persona"]["id"]+3000,
                                          "arrows"=>"to", 
                                          "label"=>$relacion["Tiporelciudad"]["descripcion"]);
                    
                }
            }
        }

        
    }
    $this->set('paisesjson', json_encode(array("nodes"=> $jsonformato, "edges"=>$relacionjson), JSON_PRETTY_PRINT));
//    $this->set('paisesjson', json_encode($relacionc));
  }


}
?>
