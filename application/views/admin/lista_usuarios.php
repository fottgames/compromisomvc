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
		<div class="row">
			<div class="form-group">
				<div class="col-md-12 table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
							  <th>Rut</th>
							  <th>Nombre</th>
							  <th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($usuariosfiltrados as $key => $value): ?>
								<tr>
									<td><?php echo $value['rut_usuario']." - ".$value['dv']; ?></td>
									<td><?php echo $value['nombre_usuario']." ".$value['apellido_paterno']." ".$value['apellido_materno']; ?></td>
									<td></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
			<?php //echo '<pre>'; print_r($usuariosfiltrados); echo '</pre>'; ?>
	</div>
</div>