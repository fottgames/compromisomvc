<div class="row">
	<div class="col-xs-12">
		<h3>Se han hecho: <?php echo $status['cantidad_cambios']; ?> cambios.</h3>
		<?php //print_r($status) ?>
		<br>
		<h3>Lista de cambios: </h3>
		<?php foreach ($status as $key => $value) {
			if (!is_numeric($value)) {
				echo $value;
				echo "<br>";
			}
		} ?>
		<br>
		<a href="<?php echo base_url()."Admin/Perfil/".$postdata['rut']; ?>">Volver</a>
	</div>
</div>