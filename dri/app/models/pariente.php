<?php
class Pariente extends AppModel {
   var $name = 'Pariente';
   var $useTable = 'pariente';
   var $displayField = 'nombre';

   var $belongsTo = array(
          'Padre' =>
             array('className' => 'Pariente',
                   'conditions' => '',
                   'order'      => '',
                   'foreignKey' => 'padre_id'
                  ),
           'Origen' =>
             array('className' => 'Ubicacion',
                   'conditions' => '',
                   'order'      => '',
                   'foreignKey' => 'origen_id'
                  ),
           'Radicado' =>
             array('className' => 'Ubicacion',
                   'conditions' => '',
                   'order'      => '',
                   'foreignKey' => 'radicado_id'
                  )
       );

}
?>
