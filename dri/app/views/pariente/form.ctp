<form id="nodofrm">
	<input type='hidden' name='id' value='<?php echo $pariente['Pariente']['id'] ?>'/>
	<input type='hidden' name='padre_id' value='<?php echo $pariente['Pariente']['padre_id'] ?>'/>
	<span class='label label-default' onclick='permanente(<?php echo $pariente['Pariente']['id'] ?>)'>Usar como base</span>
	<table class='table table-bordered'>
		<tr>
			<td class='text-right'><label>Nombre: </label></td>
			<td class='text-left'>
			<input type='text' name='nombre' value='<?php echo $pariente['Pariente']['nombre'] ?>'/>
			</td>
		</tr>

		<tr>
			<td class='text-right'><label>Nacimiento: </label></td>
			<td class='text-left'>
			<input type='text' name='nacimiento' size='15' value='<?php echo $pariente['Pariente']['nacimiento'] ?>'/>
			</td>
		</tr>

		<tr>
			<td class='text-right'><label>Muerte: </label></td>
			<td class='text-left'>
			<input type='text' name='muerte' size='15' value='<?php echo $pariente['Pariente']['muerte'] ?>'/>
			</td>
		</tr>
		<tr>
			<td class='text-right'><label>Color: </label></td>
			<td class='text-left'>
				    <input type="color" value='<?php echo $pariente['Pariente']['colorlink'] ?>' name="colorlink"/>
			</td>
		</tr>

		<tr>
			<td class='text-right'><label>Color 2: </label></td>
			<td class='text-left'>
				    <input type="color" value='<?php echo $pariente['Pariente']['colorfill'] ?>' name="colorfill"/>
			</td>
		</tr>

		<tr>
			<td class='text-right'><label>Actualizar color en toda la descendencia: </label></td>
			<td class='text-left'>
				    <input type="checkbox" value='0' name="actcolor"/>
			</td>
		</tr>
		
		<tr>
			<td class='text-right'><label>Orden: </label></td>			
			<td class='text-left'>
				    <input type="number" value='<?php echo $pariente['Pariente']['orden'] ?>' name="orden"/>
			</td>
		</tr>
		
		<tr>
			<td class='text-right'><label>Comentario: </label></td>
			<td class='text-left'><textarea name='comentario' rows='5' cols="30" form='nodofrm'><?php echo $pariente['Pariente']['comentario'] ?></textarea></td>
		</tr>

		<tr>
			<td class='text-right'><label>Radicado: </label>
			</td>
			<td class='text-left'>
				<select name='radicado_id' form='nodofrm'>
					<option disabled selected value> -- seleccione una ubicación -- </option>
					<?php foreach ($ubicaciones as $ubicacion) { ?>
					<option value='<?php echo $ubicacion["Ubicacion"]["id"] ?>' <?php if ($ubicacion["Ubicacion"]["id"] == $pariente['Pariente']['radicado_id'] ) echo 'selected' ; ?>>
						<?php echo $ubicacion['Ubicacion']['nombre'] ?>
					</option>
					<?php } ?>
				</select>
			</td>
		</tr>
	</table>
</form>
<button class='btn btn-default btn-xs' onclick='nuevohijo(<?php echo $pariente['Pariente']['id'] ?>)'>
	Nuevo hijo
</button>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<button class='btn btn-default btn-xs btn-danger' onclick='eliminarNodo(<?php echo $pariente['Pariente']['id'] ?>)'>
	Eliminar
</button>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<button class='btn btn-default btn-xs' onclick='ocultarDivInfo()'>
	Cerrar
</button>
&nbsp;
<button class='btn btn-default btn-xs btn-success' onclick='enviarNodo()'>
	Guardar
</button>

