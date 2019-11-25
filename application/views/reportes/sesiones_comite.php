<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Reporte Seguimiento de Acuerdos</h3>
                <div class="box-tools">
                    <!-- <a href="<?php echo site_url('acuerdo/add'); ?>" class="btn btn-success btn-sm">Agregar</a>  -->
                    <!-- <div class="form-group">
						<input type="text" id="date-print-start" class="datepicker" placeholder="Fecha inicio">
						<input type="text" id="date-print-end" class="datepicker" placeholder="Fecha fin">
						<button type="button" class="btn btn-info" id="print_dia" title="Imprimir">Acuerdos</button>
						<button type="button" class="btn btn-info" id="print_sesiones" title="Imprimir">Sesiones</button>
					</div> -->

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" 
                                data-toggle="dropdown" aria-haspopup="true" 
                                aria-expanded="false">
                            <span class="fa fa-print"> </span>
                            Formatos de Impresi&oacute;n 
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="print_sesiones" data-val="1">Concluido</a></li>
                            <li><a href="#" class="print_sesiones" data-val="2">En Proceso</a></li>
                            <li><a href="#" class="print_sesiones" data-val="3">Sin Proceso</a></li>
                            <li><a href="#" class="print_sesiones" data-val="4">Todas</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" id="print_dia">Acuerdos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-hover table-responsive" id="tbl_Productos">
                    <thead>
                        <tr>
                            <th>Nombre del Comit&eacute;</th>
                            <th>N&uacute;mero de Sesi&oacute;n</th>
                            <th>Nombre de la Dependencia</th>
                            <th>Acuerdos</th>
                        </tr>
                    </thead>
                    <?php foreach($acuerdos as $a){ ?>
                    <tr>
                        <td><?php echo $a['comites']; ?></td>
                        <td>
                            <?php echo $a['nombre_sesion']; ?>
                            <br>
                            <b>Folio: </b>
                            <?php echo $a['folio']; ?>
                        </td>
                        <td><?php echo $a['dependencia']; ?></td>

                        <td>
                            <table>
                                <?php foreach($a['acuerdos'] as $ac){ ?>
                                <tr>
                                    <td valign='top'>
                                        <?php  
                                            echo nl2br($ac['texto_acuerdo']) . "<br>"; 
                                        ?>
                                    </td>
                                    <td valign='top'>
                                        <?php
                                        echo nl2br($ac['comentario']) . "<br>";
                                    ?>
                                    </td>
                                    <td valign='top'>
                                        <?php
                                        if ($ac['status'] == 'Cumplido') {
                                            echo "<span style='color:green; font-weight:bold;'>" . $ac['status'] . "</span>";
                                        }
                                        else if ($ac['status'] == 'En proceso') {
                                            echo "<span style='color:orange; font-weight:bold;'>" . $ac['status'] . "</span>";
                                        }
                                        else if ($ac['status'] == 'No cumplido') {
                                            echo "<span style='color:red; font-weight:bold;'>" . $ac['status'] . "</span>";
                                        }
                                    ?>
                                    </td>
                                    <td valign='top'>
                                        <?php    
                                        echo $ac['fecha_acuerdo'];
                                    ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </td>

                    </tr>
                    <?php } ?>
                </table>

                <?php
                // foreach($acuerdos as $a){
                //     echo $a['comites'];

                //     foreach($a['acuerdos'] as $ac){
                //         echo $ac['texto_acuerdo'];
                //         echo "<br>";
                //     }

                //     echo "<br>";echo "<br>";
                // }
                ?>
            </div>
        </div>
    </div>
</div>