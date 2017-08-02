<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $titulo; ?></h3>
				</div>
				<div class="panel-body">
					<form role="form" method="POST" action="<?php echo base_url() ?>Login/valida/">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="rut" type="text" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>