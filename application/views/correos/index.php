<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Correos Lista</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('correos/add'); ?>" class="btn btn-success btn-sm">Agregar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id</th>
						<th>Nombres</th>
						<th>Correo</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($correos as $c){ ?>
                    <tr>
						<td><?php echo $c['idcorreos']; ?></td>
						<td><?php echo $c['nombre']; ?></td>
						<td><?php echo $c['email']; ?></td>
						<td>
                            <a href="<?php echo site_url('correos/edit/'.$c['idcorreos']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> 
                            <a href="<?php echo site_url('correos/remove/'.$c['idcorreos']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
