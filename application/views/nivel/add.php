<h3 class="box-title">Agregar</h3>

<?php echo form_open('nivel/add'); ?>

<label for="nivel" class="control-label">Nivel</label>
<div class="form-group">
    <input type="text" name="nivel" value="<?php echo $this->input->post('nivel'); ?>" class="form-control"
        id="nivel" />
</div>

<button type="submit" class="btn btn-success">
    <i class="fa fa-check"></i> Guardar
</button>

<?php echo form_close(); ?>