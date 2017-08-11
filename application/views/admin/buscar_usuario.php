<div><b>Lista completa de usuarios: <a href="<?php base_url()?>ListaCompleta">Click aqui</a></b></div><br>
<div class="row">
	<div class="col-xs-12">
		<p>Se puede buscar por <b>Rut (sin guion), nombre, apellido paterno.</b><br>Los criterios de busqueda deben de tener almenos 3 caracteres.</p>
		<form action="<?php base_url()."Admin/BuscarUsuario" ?>" method="POST">
			<input type="text" name="searchdata">
			<input type="submit">
		</form>
	</div>
</div>
<?php if (isset($filtro) && strlen($filtro) < 3): ?>
	La busqueda <b>"<?php echo $filtro; ?>"</b> es demasiado corta.
<?php endif ?>
<div class="row" style="margin-top: 15px;">
	<div class="col-xs-12">
		<?php if (isset($searchlist) and empty($searchlist)): ?>
			<div class="row">
				<div class="col-xs-6">
					No se encontro ningun usuario con los siguientes criterios de busqueda. <br>
					<b>"<?php echo $filtro; ?>"</b>
				</div>
			</div>
		<?php endif ?>

		<?php if (isset($searchlist) and !empty($searchlist)): ?>
			<b style="font-size: 20px;">Usuarios encontrados</b>
			<div class="form-group">
				<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
					<thead>
						<tr>
						  	<th>Rut</th>
						  	<th>Nombre</th>
						  	<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($searchlist as $key => $value): ?>
							<tr>
								<td><?php echo $value['rut'] ?></td>
								<td><?php echo $value['nombre']." ".$value['ap_pat']." ".$value['ap_mat']; ?></td>
								<td><a href="<?php echo base_url().'Admin/Curriculum/'.$value['rut']; ?>">Ver Curriculum</a></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		<?php endif ?>
	</div>
</div>