<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Correos Editar</h3>
            </div>
			<?php echo form_open('correos/edit/'.$correo['idcorreos']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="idcorreos" class="control-label">ID</label>
						<div class="form-group">
							<input type="text" name="idcorreos" value="<?php echo ($this->input->post('idcorreos') ? $this->input->post('idcorreos') : $correo['idcorreos']); ?>" class="form-control" id="idcorreos" readonly />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nombre" class="control-label">Nombres</label>
						<div class="form-group">
							<input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $correo['nombre']); ?>" class="form-control" id="nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label">e-Mail</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $correo['email']); ?>" class="form-control" id="email" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>