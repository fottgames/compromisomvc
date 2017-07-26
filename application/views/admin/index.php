
<?php  
	/*echo '<pre>';
	print_r($facultades);
	echo '</pre>';*/
?>
<div class="col-xs-12">
	<div class="row">
		<div class="col-xs-5">
			<div class="form-group">
				<select name="" id="" class="form-control">
					<?php foreach ($facultades as $key => $value): ?>
						<option class=""><?php echo $value['nombre_facultad']; ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
	</div>
</div>