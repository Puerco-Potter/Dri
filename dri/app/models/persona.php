<?php
class Persona extends AppModel {
   var $name = 'Persona';
   var $useTable = 'persona';
   var $displayField = 'nombre';
   var $belongsTo = array('Nivelnac' =>
           array('className' => 'Nivelfecha',
                 'conditions' => '',
                 'order'      => '',
                 'foreignKey' => 'nivelnac_id'
                ),
                         'Nivelfallec' =>
           array('className' => 'Nivelfecha',
                 'conditions' => '',
                 'order'      => '',
                 'foreignKey' => 'nivelfallec_id'
                )
       );

}
?>
