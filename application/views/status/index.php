<h3 class="box-title">Status Lista</h3>
<div class="box-tools">
    <a href="<?php echo site_url('status/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
</div>

<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Status</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($status as $s) {?>
    <tr>
        <td><?php echo $s['idstatus']; ?></td>
        <td><?php echo $s['status']; ?></td>
        <td>
            <a href="<?php echo site_url('status/edit/' . $s['idstatus']); ?>" class="btn btn-info btn-xs"><span
                    class="fa fa-pencil"></span> Editar</a>
            <a href="<?php echo site_url('status/remove/' . $s['idstatus']); ?>" class="btn btn-danger btn-xs"><span
                    class="fa fa-trash"></span> Eliminar</a>
        </td>
    </tr>
    <?php }?>
</table>