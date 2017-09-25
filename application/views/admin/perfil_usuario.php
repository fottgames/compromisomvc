<div class="row">
	<div class="col-sm-12">
		<form action='<?php echo base_url()."Admin/EditarUsuario"; ?>' method="POST">
			<div class="row">
				<div class="col-xs-6">
					<h4>Nombre usuario: <?php echo $userdata['nombre_usuario']." ".$userdata['apellido_paterno']." ".$userdata['apellido_materno']; ?></h4>
					<h4>Rut: <?php echo $userdata['rut_usuario']."-".$userdata['dv']; ?></h4>
					<input type="hidden" name="rut" value="<?php echo $userdata['rut_usuario']; ?>">
					<h4>Estado usuario: <?php echo $userdata['estado_usuario']; ?></h4>
					<h4>Usuario esperado:
					<select name="esperado">
							<?php  
								if ($userdata['usuario_esperado']) {
									echo '<option value="1">Si</option>';
									echo '<option value="0">No</option>';
								}else{
									echo '<option value="0">No</option>';
									echo '<option value="1">Si</option>';
								}
							?>
						</select>
					</h4>
				</div>

				<div class="col-xs-6">
					<center>
						<input type="submit" value="Editar usuario" class="btn btn-primary">
					</center>
				</div>
				
			</div>
			<div class="row">
				<div class="col-xs-6">
					<b style="font-size: 20px;">Facultades</b>
					<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
						<thead>
							<tr>
							  <th>Nombre Facultad</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($userdata['facultades'] as $key => $value): ?>
								<tr>
									<td><?php echo $value['nombre_facultad'] ?></td>
								</tr>
							<?php endforeach ?>
							<?php if (empty($userdata['facultades'])): ?>
								<tr>
									<td>No hay facultades asignadas</td>
								</tr>
							<?php endif ?>
						</tbody>
					</table>
				</div>

				<div class="col-xs-6">
					<b style="font-size: 20px;">Asignar nueva facultad</b>
					<br>
						<select name="facultad">
							<?php
								echo '<option value="No">No hay ninguna facultad seleccionada</option>';
								foreach ($facultades as $key => $value) {
									echo '<option value="'.$value['id_facultad'].'">'.$value['nombre_facultad'].'</option>';
								} ?>
						</select>
				</div>
			</div>

		</form>
	</div>
</div>
					