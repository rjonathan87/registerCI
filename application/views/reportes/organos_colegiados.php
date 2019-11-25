<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped table-hover table-responsive table-border" id="tbl_OrganosColegiados">
                    <thead>
                        <tr>
                            <td colspan="4"></td>
                            <td colspan="3" style="text-align: right;">
                                <label>Consulta por rangos:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="reservation">
                                </div>
                            </td>
                            <td style="text-align: right;"><button class="btn btn-primary" id="print_organos_colegiados">Imprimir</button>
                        </td></tr>
                        <tr>
                            <th>&Oacute;rgano Colegiado</th>
                            <th>Comit&eacute;s</th>
                            <th>Sesiones</th>
                            <th>Acuerdos</th>
                            <th>Concluido</th>
                            <th>Proceso</th>
                            <th>Cancelado</th>
                            <th>Sesiones sin asuntos SAF</th>
                        </tr>
                    </thead>
                    <!-- <tbody>
                    <?php foreach($reporte_organos_colegiados as $roc){ ?>
                        <tr>
                            <td><?php echo $roc['nombreOC']; ?></td>
                            <td><?php echo ($roc['cuentaComites'] != 0) ? $roc['cuentaComites'] : ''; ?></td>
                            <td><?php echo ($roc['cuentaSesiones'] != 0) ? $roc['cuentaSesiones'] : ''; ?></td>
                            <td><?php echo ($roc['cuentaAcuerdos'] != 0) ? $roc['cuentaAcuerdos'] : ''; ?></td>
                            <td><?php echo ($roc['cuentaConcluido'] != 0) ? $roc['cuentaConcluido'] : ''; ?></td>
                            <td><?php echo ($roc['cuentaProceso'] != 0) ? $roc['cuentaProceso'] : ''; ?></td>
                            <td><?php echo ($roc['cuentaCancelado'] != 0) ? $roc['cuentaCancelado'] : ''; ?></td>
                            <td><?php echo ($roc['cuentaSinAcuerdos'] != 0) ? $roc['cuentaSinAcuerdos'] : ''; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total: </th>
                            <th></th>
                            <th><?php echo ($sumaCuentaSesiones != 0) ? $sumaCuentaSesiones : ''; ?></th>
                            <th><?php echo ($sumaCuentaAcuerdos != 0) ? $sumaCuentaAcuerdos : ''; ?></th>
                            <th><?php echo ($sumaCuentaConcluido != 0) ? $sumaCuentaConcluido : ''; ?></th>
                            <th><?php echo ($sumaCuentaProceso != 0) ? $sumaCuentaProceso : ''; ?></th>
                            <th><?php echo ($sumaCuentaCancelado != 0) ? $sumaCuentaCancelado : ''; ?></th>
                            <th><?php echo ($sumaCuentaSinAcuerdos != 0) ? $sumaCuentaSinAcuerdos : ''; ?></th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <canvas id="myChart" style="height: 229px; width: 470px;" height="229" width="470"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <canvas id="myChart2" style="height: 229px; width: 470px;" height="229" width="470"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- <div>
    <pre>
    <?php print_r($reporte_organos_colegiados); ?>
    </pre>
</div> -->