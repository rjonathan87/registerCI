<!-- Modal -->
<div class="modal fade btnModalUsuario" id="btnModalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<?php echo form_open('sistema/usuarios/agregarUsuario', 'id="frm_add_usuario"');?>
				<input id="id_usuario" name="id_usuario" type="hidden">

				<div class="modal-header">
					<button type="button" class="close" id="btnClsModalUsuario" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="idusuario">ID</label><input id="idusuario" name="idusuario" class="form-control" placeholder="idusuario" type="text" >
					</div>
					<div class="form-group">
						<label for="nombre">Nombre</label><input id="nombre" name="nombre" class="form-control" placeholder="nombre" type="text">
					</div>
					<div class="form-group">
						<label for="ap_patern">Apellido Paterno</label><input id="ap_patern" name="ap_patern" class="form-control" placeholder="ap_patern" type="text">
					</div>
					<div class="form-group">
						<label for="ap_matern">Apellido Materno</label><input id="ap_matern" name="ap_matern" class="form-control" placeholder="ap_matern" type="text">
					</div>
					<div class="form-group">
						<label for="email">Correo Electr&oacute;nico</label><input id="email" name="email" class="form-control" placeholder="email" type="text">
					</div>
					<div class="form-group">
						<label for="tel1">Tel&eacute;fono 1</label><input id="tel1" name="tel1" class="form-control" placeholder="tel1" type="text">
					</div>
					<div class="form-group">
						<label for="tel2">Tel&eacute;fono  2</label><input id="tel2" name="tel2" class="form-control" placeholder="tel2" type="text">
					</div>
					 
					<div class="form-group">
						<label for="usuario">Usuario</label><input id="usuario" name="usuario" class="form-control" placeholder="usuario" type="text">
					</div>
					<div class="form-group">
						<label for="password">Password</label><input id="password" name="password" class="form-control" placeholder="password" type="password">
					</div>
					<div class="form-group">
						<label for="password2">Confirmar Password</label><input id="password2" name="password2" class="form-control" placeholder="password" type="password">
					</div>
					<div class="form-group">
						<label>Nivel</label>
						<select class="form-control" id="nivel" name="nivel">
							<option value="0">::Selecciona::</option>
							<?php foreach ($listaNivel as $nivel) { ?>
								<option value="<?php echo $nivel->id_cat_nivel; ?>" ><?php echo $nivel->nivel; ?></option>
							<?php } ?>
						</select>
					</div>
					
				</div>
				<div class="modal-footer">

					<div id="the-message" style="display: inline;"></div>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btn_add_usuario">Agregar</button>
					<button type="button" class="btn btn-info" id="btn_save_usuario">Guardar</button>
				</div>
			<?php echo form_close(); ?>
			<!--Close Form -->
		</div>
	</div>
</div>