<div class="row">
	<div class="col-xs-12">
		<b style="font-size: 20px;">1. Datos personales</b>
		<li><b>Rut: </b><?php echo $allData['personalData'][0]['rut_usuario']." - ".$allData['personalData'][0]['dv']; ?></li>
		<li><b>Nombres: </b><?php echo $allData['personalData'][0]['nombre_usuario']; ?></li>
		<li><b>Fecha nacimiento: </b><?php echo $allData['personalData'][0]['fecha_nacimiento']; ?></li>
		<li><b>Nacionalidad: </b><?php echo $allData['personalData'][0]['nacionalidad']; ?></li>
		<?php if ($allData['personalData'][0]['nacionalidad'] != 'CHILENO'): ?>
			<li><b>Detalle nacionalidad: </b><?php echo $allData['personalData'][0]['nacionalidad_otro']; ?></li>
		<?php endif ?>
		<li><b>Correo personal: </b><?php echo $allData['personalData'][0]['correo_personal']; ?></li>
		<li><b>Direccion: </b><?php echo $allData['personalData'][0]['direccion_particular']; ?></li>
		<li><b>Celular: </b><?php echo $allData['personalData'][0]['celular']; ?></li>
	</div>
</div>
<hr>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">2. Principal actividad academica desarrollada actualmente</b>
		<li><b>Correo institucional: </b><?php echo $allData['personalData'][0]['correo_institucional']; ?></li>
		<li><b>Anexo: </b><?php echo $allData['personalData'][0]['telefono_laboral']; ?></li>
		<li><b>Jerarquia: </b><?php echo $allData['personalData'][0]['jerarquia_academica']; ?></li>
		<li><b>Decreto de jerarquia: </b><span class="btn btn-info btn-xs">Descarga</span></li>
		<li><b>Numero de acta: </b><?php echo $allData['personalData'][0]['numero_acta']; ?></li>
		<li><b>Tipo contrato: </b><?php echo $allData['personalData'][0]['tipo_contrato']; ?></li>
		<?php if ($allData['personalData'][0]['tipo_contrato'] == 'HORAS'): ?>
			<li><b>Horas: </b><?php echo $allData['personalData'][0]['horas']; ?></li>
		<?php endif ?>
		<li><b>Ciudad: </b><?php echo $allData['personalData'][0]['ciudad_region']; ?></li>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-6">
		<b style="font-size: 20px;">Facultades</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Nombre facultad</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['facultades'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre_facultad'] ?></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['facultades'])): ?>
						<tr>
							<td>No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-xs-6">
		<b style="font-size: 20px;">Departamentos</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Nombre departamento</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['departamentos'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre_departamento'] ?></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['departamentos'])): ?>
						<tr>
							<td>No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">Otras instituciones</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Nombre</th>
					  <th>Cargo</th>
					  <th>Horas</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['instituciones'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre'] ?></td>
							<td><?php echo $value['cargo'] ?></td>
							<td><?php echo $value['horas'] ?></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['instituciones'])): ?>
						<tr>
							<td colspan="3">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">3. Formacion academica</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Titulo</th>
					  <th>Universidad</th>
					  <th>Año obtencion</th>
					  <th>Tipo</th>
					  <th>Evidencia</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['formacion_academica'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['titulo_grado'] ?></td>
							<td><?php echo $value['universidad'] ?></td>
							<td><?php echo $value['ano_obtencion'] ?></td>
							<td><?php echo $value['tipo'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['formacion_academica'])): ?>
						<tr>
							<td colspan="5">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">4. Otros compromisos academicos o profesionales actuales</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Titulo</th>
					  <th>Universidad</th>
					  <th>Año obtencion</th>
					  <th>Tipo</th>
					  <th>Evidencia</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['otros_compromisos'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre'] ?></td>
							<td><?php echo $value['lugar'] ?></td>
							<td><?php echo $value['ano'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
						</tr>
					<?php endforeach ?>

					<?php if (empty($allData['otros_compromisos'])): ?>
						<tr>
							<td colspan="5">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">5. Experiencia docente</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Asignatura</th>
					  <th>Tipo</th>
					  <th>Años experiencia</th>
					  <th>Evidencia</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['experiencia_docente'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['asignatura'] ?></td>
							<td><?php echo $value['tipo'] ?></td>
							<td><?php echo $value['anos'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['experiencia_docente'])): ?>
						<tr>
							<td colspan="4">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">6. Experiencia profesional</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Cargo</th>
					  <th>Organizacion</th>
					  <th>Año inicio</th>
					  <th>Año termino</th>
					  <th>Correo o numero de contacto de la organizacion</th>
					  <th>Evidencia</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['experiencia_profesional'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['cargo'] ?></td>
							<td><?php echo $value['empresa_institucion'] ?></td>
							<td><?php echo $value['ano_inicio'] ?></td>
							<td><?php echo $value['ano_termino'] ?></td>
							<td><?php echo $value['contacto'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['experiencia_docente'])): ?>
						<tr>
							<td colspan="6">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>