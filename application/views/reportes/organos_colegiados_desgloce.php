<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <?php foreach ($reporte_organos_colegiados_desgloce as $rocd) { ?>
        <li role="presentation" 
            <?php if ($rocd['idOC'] == 1) {
                ?>
                class="active"
                <?php
            } ?>
        >
            <a href="#<?php echo $rocd['idOC']; ?>" 
                aria-controls="<?php echo $rocd['idOC']; ?>" 
                role="tab" 
                data-toggle="tab"><?php echo $rocd['nombreOC']; ?>
            </a>
        </li>
    <?php } ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <?php foreach ($reporte_organos_colegiados_desgloce as $rocd) { ?>
        <div role="tabpanel" class="tab-pane 
                <?php echo ($rocd['idOC'] == 1) ? 'active' : ''; ?>" id="<?php echo $rocd['idOC']; ?>">
            

            <!-- Contenidos -->

            <div class="row">
                <div class="col-md-12">
                    <?php foreach ($reporte_organos_colegiados_desgloce as $rocd2) { ?>
                        <?php if ($rocd['idOC'] == $rocd2['idOC']) { ?>
                                <div class="box">
                                    <div class="box-body">
                                        <table class="table table-striped table-hover table-responsive" id="tbl_OrganosColegiados">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $rocd2['nombreOC']; ?></th>
                                                    <th>Dependencia</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($rocd2['comites'] as $rocdc) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $rocdc['comites']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rocdc['dependencia']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>No. Oficio</th>
                                                                    <th>Acuerdos</th>
                                                                    <th>Concluido</th>
                                                                    <th>Proceso</th>
                                                                    <th>Fecha y Hora de Sesi&oacute;n</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach ($rocdc['sesiones'] as $rocdcs) { ?>
                                                                    <tr>
                                                                        <!-- FOLIOS de la sesión -->
                                                                        <td><?php echo $rocdcs['folio']; ?></td>

                                                                        <!-- Total de ACUERDOS -->
                                                                        <td><?php echo ($rocdcs['cuentaAcuerdos'] != 0 ) ? $rocdcs['cuentaAcuerdos'] : ''; ?></td>
                                                                        <!-- <td><?php echo ($rocdcs['cuentaAcuerdos'] != 0 ) ? $rocdcs['cuentaAcuerdos'] : ''; ?></td> -->
                                                                        
                                                                        <!-- ACUERDOS Concluidos -->
                                                                        <td 
                                                                            <?php echo ($rocdcs['cuentaConcluido'] >= 1) ? "style='background-color:#dff0d8;'" : ""; ?> 
                                                                        >
                                                                            <?php echo ($rocdcs['cuentaConcluido'] != 0 ) ? $rocdcs['cuentaConcluido'] : ''; ?>
                                                                        </td>
                                                                        
                                                                        <!-- ACUERDOS en Proceso -->
                                                                        <td 
                                                                            <?php 
                                                                            //ROJOS
                                                                            if (    $rocdcs['folio'] != '' 
                                                                                    && $rocdcs['cuentaAcuerdos'] != 0
                                                                                    && $rocdcs['cuentaConcluido'] == 0 
                                                                                    && $rocdcs['cuentaProceso'] != 0
                                                                                    ) {
                                                                                
                                                                                echo "style='background-color:#f2dede;'"; 
                                                                            }
                                                                            //AZULES
                                                                            if (    $rocdcs['folio'] != '' 
                                                                                    && $rocdcs['cuentaAcuerdos'] == 0
                                                                                    && $rocdcs['cuentaConcluido'] == 0 
                                                                                    && $rocdcs['cuentaProceso'] == 0
                                                                                    ) {
                                                                                
                                                                                echo "style='background-color:#d9edf7;'"; 
                                                                            }
                                                                            ?> 
                                                                        >
                                                                            <?php echo $rocdcs['cuentaProceso']; ?>
                                                                        </td>
                                                                        
                                                                        <td><?php echo $rocdcs['fecha_sesion']; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            <?php
                        } ?>
                    <?php } ?>

                    <hr>

                </div>
            </div>


        </div>
    <?php } ?>
  </div>

</div>




<!-- <div>
    <pre>
        <?php print_r($organos_colegiados_datos_integral); ?>
    </pre>
</div>

<?php foreach ($organos_colegiados_datos_integral as $key => $value) {
    echo $value['idOC'] . " " . $value['nombreOC'] . "<br>";
} ?> -->
