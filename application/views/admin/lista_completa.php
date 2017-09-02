El numero de usuarios que han ingresado al sistema es: <b><?php echo $total[0]['total']; ?></b><br>
<b>X</b> Han completado el curriculum.<br>
<b>X</b> Han llenado parcialmente el curriculum.<br>
<b>X</b> No han llenado nada del curriculum.<br>

<div><b>Busqueda por Nombre, Rut, Apellido: <a href="<?php base_url()?>BuscarUsuario">Busqueda</a></b></div><br>
<div class="row">
	<div class="form-group">
		<div class="col-md-12 table-responsive">
			<b style="font-size: 20px;" class="text-success">Usuarios esperados que han ingresado:</b>
			<p>Esta lista muestra los usuarios que han accedido al sistema y se encuentran dentro de las listas de usuarios que deberian haber ingresado.</p>
			<table id="example1" class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
					  <th>Rut</th>
					  <th>Nombre</th>
					  <th>Facultades</th>
					  <th>Ultima conexion</th>
					  <th width="120px">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($searchlist_esperados as $key => $value): ?>
						<tr>
							<td><?php echo $value['rut']."-".$value['dv']; ?></td>
							<td><?php echo $value['nombre']." ".$value['ap_pat']." ".$value['ap_mat']; ?></td>
							<td><?php foreach ($value['facultades'] as $key2 => $value2) {
								echo $value2['nombre_facultad'];
								echo '<br>';
							} ?></td>
							<td></td>
							<td><a href="<?php echo base_url().'Admin/Curriculum/'.$value['rut']; ?>">Ver Curriculum</a></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group">
		<div class="col-md-12 table-responsive">
			<b style="font-size: 20px;" class="text-warning">Usuarios <b>NO</b> esperados:</b>
			<p>Esta lista muestra los usuarios que han accedido al sistema y <b>NO</b> se encuentran dentro de las listas de usuarios esperados.</p>
			<table id="example1" class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
					  <th>Rut</th>
					  <th>Nombre</th>
					  <th>Facultades</th>
					  <th>Ultima conexion</th>
					  <th width="120px">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($searchlist_no_esperados as $key => $value): ?>
						<tr>
							<td><?php echo $value['rut']."-".$value['dv']; ?></td>
							<td><?php echo $value['nombre']." ".$value['ap_pat']." ".$value['ap_mat']; ?></td>
							<td><?php foreach ($value['facultades'] as $key2 => $value2) {
								echo $value2['nombre_facultad'];
								echo '<br>';
							} ?></td>
							<td></td>
							<td><a href="<?php echo base_url().'Admin/Curriculum/'.$value['rut']; ?>">Ver Curriculum</a></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group">
		<div class="col-md-12 table-responsive">
			<b style="font-size: 20px;" class="text-danger">Usuarios esperados que NO han ingresado:</b>
			<p>Esta lista muestra los usuarios que <b>NO</b> han accedido al sistema y se encuentran dentro de las listas de usuarios que deberian haber ingresado.</p>
			<table id="example1" class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
					  <th>Rut</th>
					  <th>Nombre</th>
					  <th>Facultades</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($searchlist_esperados_no_ingresado as $key => $value): ?>
						<tr>
							<td><?php echo $value['rut']."-".$value['dv']; ?></td>
							<td><?php echo $value['nombre']." ".$value['ap_pat']." ".$value['ap_mat']; ?></td>
							<td><?php foreach ($value['facultades'] as $key2 => $value2) {
								echo $value2['nombre_facultad'];
								echo '<br>';
							} ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>