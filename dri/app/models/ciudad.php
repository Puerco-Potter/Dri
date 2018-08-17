<?php
class Ciudad extends AppModel {
   var $name = 'Ciudad';
   var $displayField = 'nombre';
   var $useTable = 'ciudad';
   var $belongsTo = array('Provincia' =>
           array('className' => 'Provincia',
                 'conditions' => '',
                 'order'      => '',
                 'foreignKey' => 'provincia_id'
                )
       );

}
?>
