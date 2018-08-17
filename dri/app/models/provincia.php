<?php
class Provincia extends AppModel {
   var $name = 'Provincia';
   var $useTable = 'provincia';
   var $displayField = 'nombre';
   var $belongsTo = array('Pais' =>
           array('className' => 'Pais',
                 'conditions' => '',
                 'order'      => '',
                 'foreignKey' => 'pais_id'
                )
       );

}
?>
