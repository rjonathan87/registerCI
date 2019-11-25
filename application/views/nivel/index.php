<h3 class="box-title">Niveles para Usuarios</h3>
<div class="box-tools">
    <a href="<?php echo site_url('nivel/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
</div>

<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Nivel</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($niveles as $item) {?>
    <tr>
        <td><?php echo $item['id_cat_nivel']; ?></td>
        <td><?php echo $item['nivel']; ?></td>
        <td>
            <a href="<?php echo site_url('nivel/edit/' . $item['id_cat_nivel']); ?>" class="btn btn-info btn-xs">
                <span class="fa fa-pencil"></span> Editar</a>
            <a href="<?php echo site_url('nivel/delete/' . $item['id_cat_nivel']); ?>" class="btn btn-danger btn-xs">
                <span class="fa fa-trash"></span> Eliminar</a>
        </td>
    </tr>
    <?php }?>
</table>