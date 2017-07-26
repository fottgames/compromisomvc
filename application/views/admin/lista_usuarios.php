<?php
	/*
	|----------------------------------------------------
	| Lista de usuarios
	|----------------------------------------------------
	*/
	//Valores formulario de filtro de facultades.
	$attributes = array
	(
		'method' => 'POST', 
		'id'     => 'filtrador',
	);
	//Valores para los optiones del select filtrador de facultades.
	$optionsfacultades = array();
	foreach ($facultades as $key => $value) 
	{
		$optionsfacultades[$value['id_facultad']] = $value['nombre_facultad'];
	}
	$attributesfacultades = array
	(
		'class' => 'form-control',
	);
?>
<div class="row">
	<div class="container">
		<h1><?php echo $titulo; ?></h1>
		<hr>
		<div class="row">
			<div class="col-xs-6">
				<?php
					echo form_open('Admin/listaUsuarios', $attributes);
					echo form_label('Facultad: ', 'facultades');
					echo form_dropdown('facultades', $optionsfacultades, '', $attributesfacultades);
					echo form_submit('botonSubmit', 'Filtrar');
					echo form_close() 
				?>
			</div>
			<div class="col-xs-6">
				
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="container">
		<pre>
			<?php print_r($usuariosfiltrados) ?>
		</pre>
	</div>
</div>