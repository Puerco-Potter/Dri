<?php
class UbicacionesController extends AppController {
  var $name = 'Ubicacion';

    var $components = array('RequestHandler');

    function index() {
        $this->layout = false;
        $ubicacion = $this->Ubicacion->find('all');
        $this->set(compact('ubicacion'));
    }

    function view($id) {
        $this->layout = false;
        $ubicacion = $this->Ubicacion->findById($id);
        $this->set(compact('ubicacion'));
    }

    function edit($id=null) {
        $this->layout = false;

        if (isset($id)){
        	$this->Ubicacion->id = $id;
        }
        error_log(json_encode($this->params['form']));

        if ($this->Ubicacion->save($this->params['form'])) {
            $message = 'Saved';
        } else {
            $message = 'Error';

        }
        $this->set(compact("message"));
    }

    function delete($id) {
        $this->layout = false;
        if($this->Ubicacion->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(compact("message"));
    }

	function lista(){
	    $this->layout = false;
	    $this->autoRender = false;
	    $this->loadModel("Pariente");
	    $ubicacion = $this->Ubicacion->findById($id);
	    $jsonformato=[];
        $parientes = $this->Pariente->find('all', 
                                     array('conditions' => array('Pariente.origen_id' => $id)));
		$children=[]
	    foreach($parientes as $pariente){
	        $children[]=array(
	        	"name" => $pariente["Pariente"]["nombre"],
	        	"id" => $pariente["Pariente"]["id"],
	        	"radicado" => $pariente["Pariente"]["Radicado"]["nombre"]
	        	);
	    }

	    $jsonformato=array(
	        	"name" => $ubicacion["Ubicacion"]["nombre"],
	        	"children" => $children);
	    return  json_encode($jsonformato);

	  }

}
?>
