<h3 class="box-title">Agregar</h3>

<?php echo form_open('status/add'); ?>

<label for="status" class="control-label">Status</label>
<div class="form-group">
    <input type="text" name="status" value="<?php echo $this->input->post('status'); ?>" class="form-control"
        id="status" />
</div>

<button type="submit" class="btn btn-success">
    <i class="fa fa-check"></i> Guardar
</button>

<?php echo form_close(); ?>