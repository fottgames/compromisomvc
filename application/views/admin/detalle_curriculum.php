<div class="row">
	<div class="col-xs-6">
		<b style="font-size: 20px;">1. Datos personales</b>
		<li><b>Rut: </b><?php echo $allData['personalData'][0]['rut_usuario']." - ".$allData['personalData'][0]['dv']; ?></li>
		<li><b>Nombres: </b><?php echo $allData['personalData'][0]['nombre_usuario']." ".$allData['personalData'][0]['apellido_paterno']." ".$allData['personalData'][0]['apellido_materno']; ?></li>
		<li><b>Fecha nacimiento: </b><?php echo $allData['personalData'][0]['fecha_nacimiento']; ?></li>
		<li><b>Nacionalidad: </b><?php echo $allData['personalData'][0]['nacionalidad']; ?></li>
		<?php if ($allData['personalData'][0]['nacionalidad'] != 'CHILENO'): ?>
			<li><b>Detalle nacionalidad: </b><?php echo $allData['personalData'][0]['nacionalidad_otro']; ?></li>
		<?php endif ?>
		<li><b>Correo personal: </b><?php echo $allData['personalData'][0]['correo_personal']; ?></li>
		<li><b>Direccion: </b><?php echo $allData['personalData'][0]['direccion_particular']; ?></li>
		<li><b>Celular: </b><?php echo $allData['personalData'][0]['celular']; ?></li>
	</div>
	<div class="col-xs-6">
		<b style="font-size: 20px;">2. Principal actividad academica actual</b>
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
<div class="row">
	<div class="col-xs-6">
		<span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion Item 1</span>
	</div>
	<div class="col-xs-6">
		<span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion Item 2</span>
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
<hr>
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
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
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
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['formacion_academica'])): ?>
						<tr>
							<td colspan="6">No hay datos disponibles</td>
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
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['otros_compromisos'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre'] ?></td>
							<td><?php echo $value['lugar'] ?></td>
							<td><?php echo $value['ano'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
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
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['experiencia_docente'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['asignatura'] ?></td>
							<td><?php echo $value['tipo'] ?></td>
							<td><?php echo $value['anos'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['experiencia_docente'])): ?>
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
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
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
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['experiencia_profesional'])): ?>
						<tr>
							<td colspan="7">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">7. Publicaciones</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Tipo</th>
					  <th>Nombre</th>
					  <th>Titulo Revista</th>
					  <th>Numero Revista</th>
					  <th>Año Revista</th>
					  <th>Estado Revista</th>
					  <th>Indexacion</th>
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['publicaciones'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['tipo'] ?></td>
							<td><?php echo $value['nombre'] ?></td>
							<td><?php echo $value['titulo_revista'] ?></td>
							<td><?php echo $value['numero_revista'] ?></td>
							<td><?php echo $value['ano_revista'] ?></td>
							<td><?php echo $value['estado_revista'] ?></td>
							<td><?php echo $value['indexacion'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['publicaciones'])): ?>
						<tr>
							<td colspan="9">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">8. Presentaciones de ponencias en congresos, seminarios o cursos</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Nombre de la actividad</th>
					  <th>Tipo</th>
					  <th>Lugar</th>
					  <th>Contexto</th>
					  <th>Año</th>
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['presentaciones'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre_actividad'] ?></td>
							<td><?php echo $value['ano_presentacion'] ?></td>
							<td><?php echo $value['tipo'] ?></td>
							<td><?php echo $value['lugar'] ?></td>
							<td><?php echo $value['contexto'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['presentaciones'])): ?>
						<tr>
							<td colspan="7">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">9. Participación en actividades de actualización</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Nombre de la actividad</th>
					  <th>Lugar</th>
					  <th>Contexto</th>
					  <th>Año inicio</th>
					  <th>Año termino</th>
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['actividades_actualizacion'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre_actividad'] ?></td>
							<td><?php echo $value['lugar'] ?></td>
							<td><?php echo $value['contexto'] ?></td>
							<td><?php echo $value['ano_inicio'] ?></td>
							<td><?php echo $value['ano_termino'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['actividades_actualizacion'])): ?>
						<tr>
							<td colspan="7">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">10. Postítulos, pasantías de perfeccionamientos o becas</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Nombre de la actividad</th>
					  <th>Lugar</th>
					  <th>Año inicio</th>
					  <th>Año termino</th>
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['postitulo_pasantias'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre_actividad'] ?></td>
							<td><?php echo $value['lugar'] ?></td>
							<td><?php echo $value['ano_inicio'] ?></td>
							<td><?php echo $value['ano_termino'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['postitulo_pasantias'])): ?>
						<tr>
							<td colspan="6">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">11. Dirección de tesis</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Titulo</th>
					  <th>Tipo</th>
					  <th>Año inicio</th>
					  <th>Año termino</th>
					  <th width="50px;">Evidencia</th>
					  <th width="150px;">Revision</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['direccion_tesis'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['titulo'] ?></td>
							<td><?php echo $value['tipo'] ?></td>
							<td><?php echo $value['ano_inicio'] ?></td>
							<td><?php echo $value['ano_termino'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['direccion_tesis'])): ?>
						<tr>
							<td colspan="6">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">12. Proyectos de investigación o creación artística</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Nombre</th>
					  <th>Tipo</th>
					  <th>Financiamiento</th>
					  <th>Estado</th>
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['investigacion'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre_proyecto'] ?></td>
							<td><?php echo $value['tipo'] ?></td>
							<td><?php echo $value['financiamiento'] ?></td>
							<td><?php echo $value['estado'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['investigacion'])): ?>
						<tr>
							<td colspan="6">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">13. Conferencias dictadas</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Nombre</th>
					  <th>Tipo</th>
					  <th>Lugar</th>
					  <th>Año</th>
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['conferencias'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre'] ?></td>
							<td><?php echo $value['tipo'] ?></td>
							<td><?php echo $value['lugar'] ?></td>
							<td><?php echo $value['ano'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['conferencias'])): ?>
						<tr>
							<td colspan="6">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">14. Otras actividades</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Nombre</th>
					  <th>Tipo</th>
					  <th>Lugar</th>
					  <th>Año</th>
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['otros_curriculum'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['nombre_actividad'] ?></td>
							<td><?php echo $value['tipo'] ?></td>
							<td><?php echo $value['lugar'] ?></td>
							<td><?php echo $value['ano'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['otros_curriculum'])): ?>
						<tr>
							<td colspan="6">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div class="col-xs-12">
		<b style="font-size: 20px;">15.Actividades sobre el aseguramiento de la calidad.</b>
		<div class="form-group">
			<table id="example1" class="table table-responsive table-striped table-bordered table-condensed">
				<thead>
					<tr>
					  <th>Experiencia</th>
					  <th>Cargo</th>
					  <th>Año</th>
					  <th>Semestre</th>
					  <th width="50px;">Evidencia</th>
					  <th width="150px">Revision</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($allData['aseguramiento_calidad'] as $key => $value): ?>
						<tr>
							<td><?php echo $value['experiencia'] ?></td>
							<td><?php echo $value['cargo'] ?></td>
							<td><?php echo $value['anio'] ?></td>
							<td><?php echo $value['semestre'] ?></td>
							<td><span class="btn btn-info btn-xs">Descarga</span></td>
							<td>Correcto: <input type="checkbox" >Si <input type="checkbox">No <span class="text-center btn btn-warning btn-block btn-xs" data-toggle="modal" data-target="#ModalED"><i class="fa fa-plus"></i> Observacion</span></td>
						</tr>
					<?php endforeach ?>
					<?php if (empty($allData['aseguramiento_calidad'])): ?>
						<tr>
							<td colspan="6">No hay datos disponibles</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>





<?php //MODALS ?>
<div class="modal" id="ModalED" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog " role="document">
    	<div class="modal-content panel-orange">
      		<div class="modal-header panel-heading">
        		<h4 class="modal-title text-center">Agregar Observacion</h4>
      		</div>
      	<form id="formuario_facultad" name="formuario_facultad" class="form-horizontal" method="POST" action="#" onsubmit="return false" enctype="multipart/form-data">
    		<div class="modal-body">
    			<div class="form-group alert alert-success">
					<label class="col-md-12 text-center alert-link" for="textinput">Esta informacion sera visualizada por el usuario.</label>
				</div>
    			<div class="form-group">
					<div class="col-md-12">
						<textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Inserte observacion aqui..."></textarea>
					</div>
				</div>
				<input type="hidden" name="action" value="insertarFacultad">
    		</div>
    		<div class="modal-footer">
    			<span class="btn btn-default" onclick="" data-dismiss="modal" >Cerrar</span>
    			<span class="btn btn-success" onclick="">Agregar</span>
    		</div>
    	</form>
    	</div>
  	</div>
</div>