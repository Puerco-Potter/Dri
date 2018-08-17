<?php  if (isset($pariente['Pariente']['nombre'])) { ?>
<span>Descendiente de <?php echo $pariente['Pariente']['nombre'] ?></span>
<?php } ?>
<form id="nodofrm">
	<input type='hidden' name='id' value=''/>
	<input type='hidden' name='padre_id' value='<?php echo $pariente['Pariente']['id'] ?>'/>
	
	<table class='table table-bordered'>
		<tr>
			<td class='text-right'><label>Nombre: </label></td>
			<td class='text-left'>
			<input type='text' name='nombre' value=''/>
			</td>
		</tr>

		<tr>
			<td class='text-right'><label>Nacimiento: </label></td>
			<td class='text-left'>
			<input type='text' name='nacimiento' size='15' value=''/>
			</td>
		</tr>

		<tr>
			<td class='text-right'><label>Muerte: </label></td>
			<td class='text-left'>
			<input type='text' name='muerte' size='15' value=''/>
			</td>
		</tr>
		<tr>
			<td class='text-right'><label>Color: </label></td>
			<td class='text-left'>
				    <input type="color" value='#c0c0c0' name="colorlink"/>
			</td>
		</tr>

		<tr>
			<td class='text-right'><label>Color 2: </label></td>
			<td class='text-left'>
				    <input type="color" value='#ffffff' name="colorfill"/>
			</td>
		</tr>


		<tr>
			<td class='text-right'><label>Orden: </label></td>			
			<td class='text-left'>
				    <input type="number" value='1' name="orden"/>
			</td>
		</tr>
		
		<tr>
			<td class='text-right'><label>Comentario: </label></td>
			<td class='text-left'>			<textarea name='comentario' form='nodofrm'></textarea></td>
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
<button class='btn btn-default btn-xs' onclick='ocultarDivInfo()'>
	Cerrar
</button>
&nbsp;
<button class='btn btn-default btn-xs' onclick='enviarNodo()'>
	Guardar
</button>
