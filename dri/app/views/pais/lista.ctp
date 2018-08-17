<?php echo $paisesjson ?>
<hr>
<?php echo $paisesjson2 ?>
<hr>
<?php if(empty($paises)): ?>
No hay tareas
<?php else: ?>
<ul>
<?php foreach($paises as $pais): ?>
<li>
<?php echo $pais['Pais']['nombre'] ?>
</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
