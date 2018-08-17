<?php
class Relacionciudad extends AppModel {
   var $name = 'Relacionciudad';
   var $useTable = 'relacionciudad';
//   var $displayField = 'nombre';
   var $belongsTo = array('Persona' =>
           array('className' => 'Persona',
                 'conditions' => '',
                 'order'      => '',
                 'foreignKey' => 'desde_id'
                ),
                         'Ciudad' =>
           array('className' => 'Ciudad',
                 'conditions' => '',
                 'order'      => '',
                 'foreignKey' => 'hasta_id'
                ),
                         'Tiporelciudad' =>
           array('className' => 'Tiporelciudad',
                 'conditions' => '',
                 'order'      => '',
                 'foreignKey' => 'rel_id'
                )
       );

}
?>
