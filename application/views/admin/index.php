
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
		<li><b><a href="<?php echo base_url()."Admin/ListaUsuarios" ?>">Lista de usuarios</a></b></li>
	</div>
</div>
<div class="row">
</div>