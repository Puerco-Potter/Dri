<?php
class NodosController extends AppController {
	var $name = 'Pariente';
	var $components = array('RequestHandler');

	function index() {
		$this -> layout = false;
		$pariente = $this -> Pariente -> find('all');
		$this -> set(compact('pariente'));
	}

	function view($id) {
		$this -> layout = false;
		$pariente = $this -> Pariente -> findById($id);
		$this -> set(compact('pariente'));
	}

	function form($id) {
		$this -> layout = false;
		$this -> loadModel("Pariente");
		$this -> loadModel("Ubicacion");
		$pariente = $this -> Pariente -> findById($id);
		$ubicaciones = $this -> Ubicacion -> find('all');
		$this -> set(compact('pariente','ubicaciones'));
	}

	function nuevohijo($id) {
		$this -> layout = false;
		$this -> loadModel("Ubicacion");
		$pariente = $this -> Pariente -> findById($id);
		$ubicaciones = $this -> Ubicacion -> find('all');
		$this -> set(compact('pariente','ubicaciones'));
	}

	function hijoscolor($idp, $color1, $color2) {
		$this -> loadModel("Pariente");
		$parientes = $this -> Pariente -> find('all', 
		array('conditions' => array('Pariente.padre_id' => $idp)),
		array('order' => array('Pariente.orden' => 'asc')));
		$color1tmp=$color1;
		$color2tmp=$color2;
		$colorS='';
		
		foreach ($parientes as $pariente) {
			$this -> Pariente -> id = $pariente["Pariente"]["id"];
			$this -> Pariente -> saveField('colorlink', $color1tmp);
			$this -> Pariente -> saveField('colorfill', $color2tmp);	
			$this ->hijoscolor($pariente["Pariente"]["id"], $color1, $color2);
			$colorS=$color1tmp;
			$color1tmp=$color2tmp;
			$color2tmp=$colorS;
		}
		
	}

	function edit($id = null) {
		$this -> layout = false;

		if (isset($id)) {
			$this -> Pariente -> id = $id;
		}
		//error_log(json_encode($this -> params['form']));

        if (isset($this -> params['form']['actcolor'])){
		  // error_log(json_encode($this -> params['form']));
		    $idpadre=$this -> params['form']['id'];
		    $color1=$this -> params['form']['colorlink'];
		    $color2=$this -> params['form']['colorfill'];
        	$this ->hijoscolor($idpadre, $color1, $color2) ;
        }

		if ($this -> Pariente -> save($this -> params['form'])) {
			$message = 'Saved'.json_encode($this -> params['form']);
		} else {
			$message = 'Error';

		}
		$this -> set(compact("message"));
	}




	function move($id, $padre) {
		$this -> layout = false;

		if (isset($id)) {
			$this -> Pariente -> id = $id;
			if ($padre==-1){
				$this->Pariente->saveField('padre_id', null);
			}else{
				$this->Pariente->saveField('padre_id', $padre);
			}
			/*
			if ($this -> Pariente -> save(array('padre_id' => $padreloc))) {
				$message = 'Saved';
			} else {
				$message = 'Error';

			}*/
			$message = $id.' '.$padre;
		}

		$this -> set(compact("message"));
	}

	function delete($id) {
		$this -> layout = false;
		if ($this -> Pariente -> delete($id)) {
			$message = 'Deleted';
		} else {
			$message = 'Error';
		}
		$this -> set(compact("message"));
	}

	function hijos($id, $ubicar) {
		$nodopar = [];
		$this -> loadModel("Pariente");
		$parientes = $this -> Pariente -> find('all', 
		array('conditions' => array('Pariente.padre_id' => $id)),
		array('order' => array('Pariente.orden' => 'asc')));


		if ($ubicar){
				$ubicaciones=[];
				$ubicaciones[0]="Sin información";

				//Listado de ubicaciones en este nivel de la rama
				foreach ($parientes as $pariente) {
					if (!array_key_exists($pariente["Radicado"]["id"], $ubicaciones)) {
						if ($pariente["Radicado"]["id"] !=null ){
					    	$ubicaciones[$pariente["Radicado"]["id"]]=$pariente["Radicado"]["nombre"];					
						}
					}
				}
				//

				//Listado de ubicaciones a formato de nodos

				foreach ($ubicaciones as $clave => $valor) {
					    $clavebusca=$clave;

						$nodoparu = [];
					    if ($clavebusca==0){
					    	$clavebusca=null;
					    }

						$parientes = $this -> Pariente -> find('all', 
						array('conditions' => array('Pariente.padre_id' => $id, 
							                        'Pariente.radicado_id' => $clavebusca)));

						foreach ($parientes as $pariente) {
							$hijospar = $this -> hijos($pariente["Pariente"]["id"],$ubicar);
							$nodo = array("name" => $pariente["Pariente"]["nombre"], 
										  "id" => $pariente["Pariente"]["id"], 
										  "nacimiento" => $pariente["Pariente"]["nacimiento"], 
										  "muerte" => $pariente["Pariente"]["muerte"], 
										  "radicado" => $pariente["Radicado"]["nombre"], 
										  "children" => $hijospar, 
										  "tipo" => "nodo", 
										  "comentario" => $pariente["Pariente"]["comentario"], 
										  "colorlink" => $pariente["Pariente"]["colorlink"], 
										  "colorfill" => $pariente["Pariente"]["colorfill"], 
										  "orden" => $pariente["Pariente"]["orden"]);
							$nodoparu[] = $nodo;
						}

						if (count($nodoparu)>0){
							$nodopar[] = array("name" => $valor, 
									  "id" => ($id*100000)+$clave+1000000, 
									  "nacimiento" => "", 
									  "muerte" => "", 
									  "radicado" => "", 
									  "children" => $nodoparu, 
									  "tipo" => "ubicacion", 
									  "comentario" => "");
						}
				}
		}else{

				//Listado sin ubicaciones

				foreach ($parientes as $pariente) {
					$hijospar = $this -> hijos($pariente["Pariente"]["id"],$ubicar);
					$nodo = array("name" => $pariente["Pariente"]["nombre"], 
								  "id" => $pariente["Pariente"]["id"], 
								  "nacimiento" => $pariente["Pariente"]["nacimiento"], 
								  "muerte" => $pariente["Pariente"]["muerte"], 
								  "radicado" => $pariente["Radicado"]["nombre"], 
								  "children" => $hijospar, 
								  "tipo" => "nodo", 
								  "comentario" => $pariente["Pariente"]["comentario"], 
								  "colorlink" => $pariente["Pariente"]["colorlink"], 
								  "colorfill" => $pariente["Pariente"]["colorfill"], 
									"orden" => $pariente["Pariente"]["orden"]);
					$nodopar[] = $nodo;
				}
		        //

		}

		return $nodopar;
	}

	function origen($id = null, $ubicar=0) {
		$ubicarpar=true;
		if ($ubicar==0){
			$ubicarpar=false;
		}
		if ($id == 0){
			$id = null;
		}
		$this -> layout = false;
		$this->RequestHandler->respondAs('json');
		$this -> autoRender = false;
		$this -> loadModel("Pariente");

		$jsonformato = [];

		$parientes = [];
		$padre = [];
		if ($id == null){
			$parientes = $this -> Pariente -> find('all', array('conditions' => array('Pariente.padre_id' => null)),
		array('order' => array('Pariente.orden' => 'asc')));
			$padre = array("name" => "Dri", "id" => -1, "comentario" => "");
		}else{
			$parientes = $this -> Pariente -> find('all', array('conditions' => array('Pariente.padre_id' => $id)),
		array('order' => array('Pariente.orden' => 'asc')));
		    $padrearray = $this -> Pariente -> findById($id);
			$padre = array("name" => $padrearray["Pariente"]["nombre"], 
				"id" => $padrearray["Pariente"]["id"], 
				"radicado" => $padrearray["Radicado"]["nombre"], 
				"nacimiento" => $padrearray["Pariente"]["nacimiento"], 
				"muerte" => $padrearray["Pariente"]["muerte"], 
				"comentario" => $padrearray["Pariente"]["comentario"], 
				"colorlink" => $pariente["Pariente"]["colorlink"],
				"colorfill" => $pariente["Pariente"]["colorfill"], 
				"orden" => $pariente["Pariente"]["orden"]);
		}

		$children = [];

		if ($ubicar){
				$ubicaciones=[];
				$ubicaciones[0]="Sin información";

				//Listado de ubicaciones en este nivel de la rama
				foreach ($parientes as $pariente) {
					if (!array_key_exists($pariente["Radicado"]["id"], $ubicaciones)) {
						if ($pariente["Radicado"]["id"] !=null ){
					    	$ubicaciones[$pariente["Radicado"]["id"]]=$pariente["Radicado"]["nombre"];					
						}
					}
				}
				//
				foreach ($ubicaciones as $clave => $valor) {
					    $clavebusca=$clave;

						$nodoparu = [];
					    if ($clavebusca==0){
					    	$clavebusca=null;
					    }

						$parientes = $this -> Pariente -> find('all', 
						array('conditions' => array('Pariente.padre_id' => $id, 
							                        'Pariente.radicado_id' => $clavebusca)));

						foreach ($parientes as $pariente) {
							$hijospar = $this -> hijos($pariente["Pariente"]["id"],$ubicar);
							$nodo = array("name" => $pariente["Pariente"]["nombre"], 
										  "id" => $pariente["Pariente"]["id"], 
										  "nacimiento" => $pariente["Pariente"]["nacimiento"], 
										  "muerte" => $pariente["Pariente"]["muerte"], 
										  "radicado" => $pariente["Radicado"]["nombre"], 
										  "children" => $hijospar, 
										  "tipo" => "nodo", 
										  "comentario" => $pariente["Pariente"]["comentario"], 
										  "colorlink" => $pariente["Pariente"]["colorlink"], 
										  "colorfill" => $pariente["Pariente"]["colorfill"],
										  "orden" => $pariente["Pariente"]["orden"]);
							$nodoparu[] = $nodo;
						}

						if (count($nodoparu)>0){
							$children[] = array("name" => $valor, 
									  "id" => ($id*100000)+$clave+10000, 
									  "nacimiento" => "", 
									  "muerte" => "", 
									  "radicado" => "", 
									  "children" => $nodoparu, 
									  "tipo" => "ubicacion", 
									  "comentario" => "");
						}
				}

        }else{


				foreach ($parientes as $pariente) {
					$hijospar = $this -> hijos($pariente["Pariente"]["id"],$ubicarpar);
					$children[] = array("name" => $pariente["Pariente"]["nombre"], 
						"id" => $pariente["Pariente"]["id"], 
						"radicado" => $pariente["Radicado"]["nombre"], 
						"nacimiento" => $pariente["Pariente"]["nacimiento"], 
						"muerte" => $pariente["Pariente"]["muerte"], 
						"comentario" => $pariente["Pariente"]["comentario"], 
						"colorlink" => $pariente["Pariente"]["colorlink"], 
						"colorfill" => $pariente["Pariente"]["colorfill"],
						"orden" => $pariente["Pariente"]["orden"],
						"children" => $hijospar, "tipo" => "nodo");
				}
		}

		$jsonformato = array("name" => $padre["name"], "id" => $padre["id"], 
			"children" => $children, "nacimiento" => "", "muerte" => "", "tipo" => "ubicacion", "comentario" => $padre["comentario"]);
		return json_encode($jsonformato, JSON_PRETTY_PRINT);

	}

	function ubicaciones(){
		$this -> layout = false;
		$this->RequestHandler->respondAs('json');
		$this -> autoRender = false;
		$this -> loadModel("Ubicacion");
		$ubicaciones = $this -> Ubicacion -> find('all');
		$jsonformato = [];
		foreach ($ubicaciones as $ubicacion) {
			$jsonformato[] = array("name" => $ubicacion["Ubicacion"]["nombre"], "id" => $ubicacion["Ubicacion"]["id"], "tipo" => "ubicacion");
		}
		return json_encode($jsonformato, JSON_PRETTY_PRINT);
	}

	function generacion($id){
		$this -> layout = false;
		$this->RequestHandler->respondAs('json');
		$this -> autoRender = false;
		$this -> loadModel("Pariente");
		if ($id == null){
			$parientes = $this -> Pariente -> find('all', array('conditions' => array('Pariente.padre_id' => null)), array('order' => array('Pariente.orden' => 'asc')));
		}else{
			$parientes = $this -> Pariente -> find('all', array('conditions' => array('Pariente.padre_id' => $id)), array('order' => array('Pariente.orden' => 'asc')));
		}
		$jsonformato = [];
		//foreach ($ubicaciones as $ubicacion) {
			$jsonformato[] = array("parientes" => $parientes);
		//}
		return json_encode($jsonformato, JSON_PRETTY_PRINT);
	}

	function listapadres($id){
		$this -> layout = false;
		$this->RequestHandler->respondAs('json');
		$this -> autoRender = false;
		$this -> loadModel("Pariente");
		$listaparientes=[];
		$idpadre=$id;
		if ($id == null){
			$parientes = [];
		}else{
		
			do {
				$parientes = $this -> Pariente -> find('all', array('conditions' => array('Pariente.id' => $idpadre)));
				$encontro=count($parientes);
				if ($encontro>0){
					$listaparientes[] =$parientes[0]["Pariente"];
					$idpadre=$parientes[0]["Padre"]["id"];
				}
			}while($encontro>0);
		}
		$jsonformato = [];
		$listaparientes=array_reverse($listaparientes);
		//foreach ($ubicaciones as $ubicacion) {
		$jsonformato[] = array("parientes" => $listaparientes);
		//}
		return json_encode($jsonformato, JSON_PRETTY_PRINT);
	}

	function parametros(){
		$this -> layout = false;
		$this -> autoRender = false;
		$this->RequestHandler->respondAs('css');
		$this -> loadModel("Parametro");
		$parametros = $this -> Parametro -> find('all');
		$jsonformato = ".fondo {\r\n";
		foreach ($parametros as $parametro) {
			$jsonformato=$jsonformato.$parametro["Parametro"]["nombre"]." : ".$parametro["Parametro"]["valor"];
		}
		$jsonformato=$jsonformato."\r\n}";
		
		return $jsonformato;
	}


	function editcolor($color) {
		$this -> layout = false;
		$this -> autoRender = false;
		$this -> loadModel("Parametro");
		$color = $this->params['url']['color'];

		//if (isset($id)) {
			$this -> Parametro -> id = 1;
			$this->Parametro->saveField('valor', '#'.$color);
		//}
		
		return $color;
	}

}
?>
