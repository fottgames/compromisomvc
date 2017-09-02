
<div class="row">
	<div class="col-xs-12">
		Bienvenido a la pantalla de administracion del Sistema de Compromiso Academico, desde aqui puede acceder a todas las funcionalidades que dispone como administrador.
	</div>
</div>
<div class="row">
	<div class="col-xs-6" style="margin-top: 10px;">
		<b style="font-size: 20px;">Datos de administracion:</b>
		<li><b>Nombre: </b><?php echo $adminData[0]['nombre_usuario']." ". $adminData[0]['apellido_paterno']." ".$adminData[0]['apellido_materno'] ?></li>
		<li><b>Nivel de ingreso: </b><?php echo $adminData[0]['tipo']; ?></li>
	</div>
	<!--<div class="col-xs-6" style="margin-top: 10px;">
		<b style="font-size: 20px;">Pantallas disponibles:</b>
		<li><b><a href="<?php echo base_url()."Admin/ListaCompleta" ?>">Lista completa de usuarios</a></b></li>
		<li><b><a href="<?php echo base_url()."Admin/BuscarUsuario" ?>">Busqueda de usuario</a></b></li>
	</div>-->
</div>
<hr>
<?php if ($tipoAdmin[0]['tipo'] == 'ADMINISTRADOR'): ?>
	<div class="row">
		<div class="col-xs-12">
			<b style="font-size: 20px;">Estado del sistema de compromiso academico:</b>
			<table id="example14" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Modulo</th>
					  <th>Estado actual</th>
					  <th>Pantalla de revision</th>
					  <th>Estadisticas</th>
					  <th>Acciones</th>
					</tr>
				</thead>

				<tbody">
					<tr>
						<td>Curriculum</td>
						<td>Marcha blanca - Detectando errores</td>
						<td>En desarrollo</td>
						<td>En desarrollo</td>
						<td></td>
					</tr>
					<tr>
						<td>Formulario convenio anual de desempeño</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Evaluacion docente</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
<?php endif ?>

<?php if ($tipoAdmin[0]['tipo'] == 'ADMINISTRADOR'): ?>
	<div class="row">
		<div class="col-xs-12">
			<b style="font-size: 20px;">Pantallas disponibles:</b>
			<table id="example14" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Nombre</th>
					  <th>Funcion</th>
					  <th>Acciones</th>
					</tr>
				</thead>

				<tbody">
					<tr>
						<td>Lista completa de usuarios</td>
						<td>Permite listar a todos los usuarios que han ingresado por lo menos 1 vez al sistema.</td>
						<td><b><a href="<?php echo base_url()."Admin/ListaCompleta" ?>">Acceder a la pantalla</a></b></td>
					</tr>
					<tr>
						<td>Busqueda de usuario</td>
						<td>Permite buscar a un usuario por su Rut (sin guion ni dv), nombre, apellido paterno y acceder a su perfil.</td>
						<td><b><a href="<?php echo base_url()."Admin/BuscarUsuario" ?>">Acceder a la pantalla</a></b></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
<?php endif ?>