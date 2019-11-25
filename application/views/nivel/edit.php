<h3 class="box-title">Editar</h3>

<?php echo form_open('nivel/edit/' . $nivel['id_cat_nivel']); ?>
<label for="nivel" class="control-label">Nivel</label>
<div class="form-group">
    <input type="text" name="nivel"
        value="<?php echo ($this->input->post('nivel') ? $this->input->post('nivel') : $nivel['nivel']); ?>"
        class="form-control" id="nivel" />
</div>
<button type="submit" class="btn btn-success">
    <i class="fa fa-check"></i> Guardar
</button>
<?php echo form_close(); ?>