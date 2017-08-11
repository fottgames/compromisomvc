El numero de usuarios que han ingresado al sistema es: <b><?php echo $total[0]['total']; ?></b><br>
<b>X</b> Han completado el curriculum.<br>
<b>X</b> Han llenado parcialmente el curriculum.<br>
<b>X</b> No han llenado nada del curriculum.<br>

<div><b>Busqueda por Nombre, Rut, Apellido: <a href="<?php base_url()?>BuscarUsuario">Busqueda</a></b></div><br>
<div class="row">
			<div class="form-group">
				<div class="col-md-12 table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
							  <th>Rut</th>
							  <th>Nombre</th>
							  <th width="120px">Acciones</th>
							  
							</tr>
						</thead>
						<tbody>
							<?php foreach ($searchlist as $key => $value): ?>
								<tr>
									<td><?php echo $value['rut']." - ".$value['dv']; ?></td>
									<td><?php echo $value['nombre']." ".$value['ap_pat']." ".$value['ap_mat']; ?></td>
									<td><a href="<?php echo base_url().'Admin/Curriculum/'.$value['rut']; ?>">Ver Curriculum</a></td>
									
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>