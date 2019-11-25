<h1>Usuarios lista</h1>
<table class="table table-hover" id="tbl_list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Teléfonos</th>
            <th>E-Mail</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!-- Modal Editar -->
<div class="modal fade" id="ModalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="frmEdit" method="post">
                    <input type="hidden" name="id_usuario" id="id_usuario" />
                    <div class="form-group">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre"
                            required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="ap_patern" id="ap_patern" class="form-control"
                            placeholder="Apellido Paterno" required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="ap_matern" id="ap_matern" class="form-control"
                            placeholder="Apellido Materno" required />
                    </div>
                    <div class="form-group">
                        <input type="number" name="tel1" id="tel1" class="form-control" placeholder="Teléfono Casa"
                            required />
                    </div>
                    <div class="form-group">
                        <input type="number" name="tel2" id="tel2" class="form-control" placeholder="Teléfono Móvil"
                            required />
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Correo Electrónico" required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario"
                            required readonly />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Nuevo Password" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password-confirm" id="password-confirm" class="form-control"
                            placeholder="Confirmar Nuevo Password" />
                    </div>

                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="">Status</option>
                            <?php
foreach ($all_status as $status) {
    echo '<option value="' . $status['idstatus'] . '">' . $status['status'] . '</option>';
}
?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="nivel" id="nivel" class="form-control">
                            <option value="">Nivel</option>
                            <?php
foreach ($all_nivel as $nivel) {
    echo '<option value="' . $nivel['id_cat_nivel'] . '">' . $nivel['nivel'] . '</option>';
}
?>
                        </select>
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="fotografia" name="fotografia">
                        <label class="custom-file-label" for="fotografia">Fotografía</label>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onClick="save()">Guardar</button>
            </div>
        </div>
    </div>
</div>