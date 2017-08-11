
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
	<div class="col-xs-6" style="margin-top: 10px;">
		<b style="font-size: 20px;">Pantallas disponibles:</b>
		<li><b><a href="<?php echo base_url()."Admin/ListaCompleta" ?>">Lista completa de usuarios</a></b></li>
		<li><b><a href="<?php echo base_url()."Admin/BuscarUsuario" ?>">Busqueda de usuario</a></b></li>
	</div>
</div>
<hr>
<?php if ($tipoAdmin[0]['tipo'] == 'ADMINISTRADOR'): ?>
	<div class="row">
		<div class="col-xs-12" style="margin-top: 10px;">
			<b style="font-size: 20px;">Estado del sistema de compromiso academico:</b>
			<li><b style="font-size: 18px">Estado modulos:</b></li>
			<div class="col-xs-6">
				<ul>
					<li style="margin-bottom: 10px;">
						<b class="text-success">Curriculum academico:</b>
						<ul>
							<li><b>Estado desarrollo:</b> Marcha blanca - Detectando errores</li>
							<li><b>Estado actual:</b> Funcionando</li>
							<li><b>Pantalla revision:</b> En desarrollo</li>
							<li><b>Estadisticas generales:</b> No implementado</li>
							<li><b>Detalles:</b></li>
						</ul>
					</li>
					<li style="margin-bottom: 10px;">
						<b class="text-success">Formulario convenio anual de desempeño:</b>
						<ul>
							<li><b>Estado desarrollo:</b> No implementado</li>
							<li><b>Estado actual:</b> No implementado</li>
							<li><b>Pantalla revision:</b> No implementado</li>
							<li><b>Estadisticas generales:</b> No implementado</li>
							<li><b>Detalles:</b></li>
						</ul>
					</li>	
				</ul>
			</div>

			<div class="col-xs-6">
				<ul>
					<li style="margin-bottom: 10px;">
						<b class="text-success">Evaluacion docente:</b>
						<ul>
							<li><b>Estado desarrollo:</b> No implementado</li>
							<li><b>Estado actual:</b> No implementado</li>
							<li><b>Pantalla revision:</b>  No implementado</li>
							<li><b>Estadisticas generales:</b> No implementado</li>
							<li><b>Detalles:</b></li>
						</ul>
					</li>
					<li style="margin-bottom: 10px;">
						<b class="text-success">Estadisticas generales:</b>
						<ul>
							<li><b>Estado desarrollo:</b> No implementado</li>
							<li><b>Estado actual:</b> No implementado</li>
							<li><b>Pantalla revision:</b> No implementado</li>
							<li><b>Estadisticas generales:</b> No implementado</li>
							<li><b>Detalles:</b></li>
						</ul>
					</li>	
				</ul>
			</div>
		</div>
	</div>
<?php endif ?>