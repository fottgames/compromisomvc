<?php  
	//print_r($registro_conexion);
?>

<div class="row">
	<div class="col-xs-12">
		<li><?php echo $userData[0]['nombre_usuario']." ".$userData[0]['apellido_paterno']." ".$userData[0]['apellido_materno']; ?></li>
		<li><?php echo $userData[0]['rut_usuario']."-".$userData[0]['dv']; ?></li>
	</div>
</div>

<div class="row">
	<div class="form-group">
		<div class="col-md-12 table-responsive">
			<table id="example1" class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
					  <th>Fecha</th>
					  <th>Hora</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($registro_conexion as $key => $value): ?>
						<tr>
							<td><?php echo $value['fecha_hora']; ?></td>
							<td></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>