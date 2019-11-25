<?php
class Reportes extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Acuerdo_model');
        $this->load->model('Sesione_model');
        $this->load->model('OrganoColegiado_model');
    } 
    function acuerdos()
    {
        // $data['acuerdos'] = $this->Acuerdo_model->get_all_acuerdos();
        if ( $this->session->userdata('nivel') == 1 ) {
            $data['acuerdos'] = $this->Sesione_model->sesiones_comite();
            $data['_view'] = 'reportes/sesiones_comite';
            
            $this->load->view('layouts/main',$data);
        }else{
            $data['_view'] = "accessdenied";
            $this->load->view('layouts/main', $data);
        } 

        // echo "<pre>";
        // echo json_encode(print_r($data));
        // echo "</pre>";
    }
    function lista()
    {
        // $data['acuerdos'] = $this->Acuerdo_model->get_all_acuerdos();
        if ( $this->session->userdata('nivel') == 1 ) {
            $data['acuerdos'] = $this->Sesione_model->sesiones_comite();
            $data['_view'] = 'reportes/sesiones_comite';
            
            $this->load->view('layouts/main',$data);
        }else{
            $data['_view'] = "accessdenied";
            $this->load->view('layouts/main', $data);
        } 

        // echo "<pre>";
        // echo json_encode(print_r($data));
        // echo "</pre>";
    }

    function print_acuerdos()
    {
        $this->load->library('excel');
        $acuerdos = $this->Sesione_model->acuerdos_print();

        // foreach ($acuerdos as $value) {
        //     echo "<pre>";
        //     print_r($value);
        //     echo "</pre>";
        // }

        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        //ENCABEZADOS
        $table_columns = array("Nombre del Comité","Número de Sesión", "Folio", "Fecha Ingreso", "Dependencia", "Acuerdos", "Comentarios", "Status", "Fecha de Acuerdo");
        $blueBold = array(
		    "font" => array(
		        "bold" => true,
		        "color" => array("rgb" => "000000"),
		    ),
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'CCCCCC')
            ),
        );
        $backRed = array(
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'ff4d4d')
            ),
        );
        $backGreen = array(
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '9fff80')
            ),
        );
        $backBlue = array(
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '80ccff')
            ),
		);
		$column = 0;
		foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
        $object->getActiveSheet()->getStyle('A1:I1')->applyFromArray($blueBold);
        //END ENCABEZADOS

        //CONTENIDO
        
		$excel_row = 2;
		$count = 1;

		foreach ($acuerdos as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['comites']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['nombre_sesion']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['folio']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['fecha_ingreso']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['dependencia']);

            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['texto_acuerdo']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['comentario']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['status']);
            if ($row['status'] == 'Cumplido') {
                $object->getActiveSheet()->getStyle('F'.$excel_row)->applyFromArray($backBlue);
            }else if ($row['status'] == 'En proceso') {
                $object->getActiveSheet()->getStyle('F'.$excel_row)->applyFromArray($backGreen);
            }else if ($row['status'] == 'No cumplido') {
                $object->getActiveSheet()->getStyle('F'.$excel_row)->applyFromArray($backRed);
            }
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['fecha_acuerdo']);
            

            $excel_row++;
            $count++;
        
		}
        //END  CONTENIDO


        //Ejecución del Excel
        $objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5');

		$filename="Reporte_de_Acuerdos.xls"; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
    }
    
    function print_sesiones()
    {
        //status 
        $status = $this->input->get("status");
        $acuerdos = $this->Sesione_model->sesiones_print($status);

        $this->load->library('excel');

        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        //ENCABEZADOS
        $table_columns = array("Nombre del Comité","Número de Sesión", "Folio", "Fecha Ingreso", "Dependencia", "Acuerdos", "Comentarios", "Status", "Fecha de Acuerdo");
        $blueBold = array(
		    "font" => array(
		        "bold" => true,
		        "color" => array("rgb" => "000000"),
		    ),
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'CCCCCC')
            ),
        );
        $backRed = array(
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'ff4d4d')
            ),
        );
        $backGreen = array(
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '9fff80')
            ),
        );
        $backBlue = array(
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '80ccff')
            ),
		);
		$column = 0;
		foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
        $object->getActiveSheet()->getStyle('A1:I1')->applyFromArray($blueBold);
        //END ENCABEZADOS

        //CONTENIDO
        
		$excel_row = 2;
		$count = 1;

		foreach ($acuerdos as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['comites']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['nombre_sesion']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['folio']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['fecha_ingreso']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['dependencia']);

            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['texto_acuerdo']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['comentario']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['status']);
            if ($row['status'] == 'Cumplido') {
                $object->getActiveSheet()->getStyle('F'.$excel_row)->applyFromArray($backBlue);
            }else if ($row['status'] == 'En proceso') {
                $object->getActiveSheet()->getStyle('F'.$excel_row)->applyFromArray($backGreen);
            }else if ($row['status'] == 'No cumplido') {
                $object->getActiveSheet()->getStyle('F'.$excel_row)->applyFromArray($backRed);
            }
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['fecha_acuerdo']);
            

            $excel_row++;
            $count++;
        
		}
        //END  CONTENIDO


        //Ejecución del Excel
        $objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5');

		$filename="Reporte_de_Acuerdos.xls"; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
    }

    // Organos colegiados
    function organos_colegiados(){
        
        if ( $this->session->userdata('nivel') == 1 ) {
            $data['sumaCuentaSesiones'] = 0;
            $data['sumaCuentaAcuerdos'] = 0;
            $data['sumaCuentaConcluido'] = 0;
            $data['sumaCuentaProceso'] = 0;
            $data['sumaCuentaCancelado'] = 0;
            $data['sumaCuentaSinAcuerdos'] = 0;
            
            $data['reporte_organos_colegiados'] = $this->OrganoColegiado_model->reporte_organos_colegiados();
            $data['_view'] = 'reportes/organos_colegiados';
            
            foreach ($data['reporte_organos_colegiados'] as $key => $value) {
                $data['sumaCuentaSesiones'] += $value['cuentaSesiones'];
                $data['sumaCuentaAcuerdos'] += $value['cuentaAcuerdos'];
                $data['sumaCuentaConcluido'] += $value['cuentaConcluido'];
                $data['sumaCuentaProceso'] += $value['cuentaProceso'];
                $data['sumaCuentaCancelado'] += $value['cuentaCancelado'];
                $data['sumaCuentaSinAcuerdos'] += $value['cuentaSinAcuerdos'];
            }
            
            // echo $this->db->last_query();
            
            $this->load->view('layouts/main',$data);
        }else{
            $data['_view'] = "accessdenied";
            $this->load->view('layouts/main', $data);
        } 
    }

    //Range Organos Colegiados
    function organos_colegiados_range(){
        
        if ( $this->session->userdata('nivel') == 1 ) {
            if ($this->input->post('start') != '' && $this->input->post('end') != '') {
                $start = $this->input->post('start');
                $end = $this->input->post('end');
                $data = $this->OrganoColegiado_model->reporte_organos_colegiados_range($start, $end);
                echo json_encode($data);
            }
            else{
                $data = $this->OrganoColegiado_model->reporte_organos_colegiados();
                echo json_encode($data);
            }
            
        }else{
            $data['_view'] = "accessdenied";
            $this->load->view('layouts/main', $data);
        } 
    }

    function organos_colegiados_datos() 
    {
        $data = $this->OrganoColegiado_model->reporte_organos_colegiados();
        echo json_encode($data);
    }

    //Imprimir Organos Colegiados Resumen
    function print_organos_colegiados()
    {
        $organos_colegiados = $this->OrganoColegiado_model->reporte_organos_colegiados();

        $this->load->library('excel');

        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        //ENCABEZADOS
        $table_columns = array("Órgano Colegiado", "Comités", "Sesiones", "Acuerdos", "Concluidos", "Proceso", "Cancelado", "Sesiones sin asuntos SAF");
        $blueBold = array(
		    "font" => array(
		        "bold" => true,
		        "color" => array("rgb" => "000000"),
		    ),
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'CCCCCC')
            ),
        );
        $backRed = array(
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'ff4d4d')
            ),
        );
        $backGreen = array(
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '9fff80')
            ),
        );
        $backBlue = array(
		    'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '80ccff')
            ),
		);
		$column = 0;
		foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
        $object->getActiveSheet()->getStyle('A1:H1')->applyFromArray($blueBold);
        //END ENCABEZADOS

        //CONTENIDO
        $sumaCuentaComites = 0;
        $sumaCuentaSesiones = 0;
        $sumaCuentaAcuerdos = 0;
        $sumaCuentaConcluido = 0;
        $sumaCuentaProceso = 0;
        $sumaCuentaCancelado = 0;
        $sumaCuentaSinAcuerdos = 0;
        
		$excel_row = 2;
		$count = 1;

		foreach ($organos_colegiados as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['nombreOC']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['cuentaComites']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['cuentaSesiones']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['cuentaAcuerdos']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['cuentaConcluido']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['cuentaProceso']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['cuentaCancelado']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['cuentaSinAcuerdos']);

            $sumaCuentaComites += $row['cuentaComites'];
            $sumaCuentaSesiones += $row['cuentaSesiones'];
            $sumaCuentaAcuerdos += $row['cuentaAcuerdos'];
            $sumaCuentaConcluido += $row['cuentaConcluido'];
            $sumaCuentaProceso += $row['cuentaProceso'];
            $sumaCuentaCancelado += $row['cuentaCancelado'];
            $sumaCuentaSinAcuerdos += $row['cuentaSinAcuerdos'];

            $excel_row++;
            $count++;

		}
        //END  CONTENIDO

        //TOTALES
        $rowTotales = $excel_row++;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $rowTotales, "Totales:");
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $rowTotales, $sumaCuentaComites);
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $rowTotales, $sumaCuentaSesiones);
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $rowTotales, $sumaCuentaAcuerdos);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $rowTotales, $sumaCuentaConcluido);
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $rowTotales, $sumaCuentaProceso);
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $rowTotales, $sumaCuentaCancelado);
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $rowTotales, $sumaCuentaSinAcuerdos);

        //END TOTALES

        //GRAFICA

        //END GRAFICA

        //Ejecución del Excel
        $objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        $objWriter->setIncludeCharts(true);

		$filename="Reporte_Organos_Colegiados.xls"; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
    }

    function organos_colegiados_desgloce()
    {
        if ( $this->session->userdata('nivel') == 1 ) {
            $data['reporte_organos_colegiados_desgloce'] = $this->OrganoColegiado_model->reporte_organos_colegiados_desgloce();
            $data['organos_colegiados_datos_integral'] = $this->OrganoColegiado_model->organos_colegiados_datos_integral();
            $data['_view'] = 'reportes/organos_colegiados_desgloce';
            
            $this->load->view('layouts/main',$data);
        }else{
            $data['_view'] = "accessdenied";
            $this->load->view('layouts/main', $data);
        } 
    }
    // End Organos Colegiados

    function organos_colegiados_datos_integral()
    {
        $data = $this->OrganoColegiado_model->organos_colegiados_datos_integral();

        echo "<pre>";
        echo json_encode(print_r($data));
        echo "</pre>";
    }

    function print_organos_colegiados_datos_integral()
    {
        $organos_colegiados = $this->OrganoColegiado_model->organos_colegiados_datos_integral();

        ?>
        <table border=1>
            <?php
            foreach ($organos_colegiados as $value) {
                foreach ($value['comites'] as $value2) {
                    foreach ($value2['sesiones'] as $value3) {
                        foreach ($value3['acuerdos'] as $value4) {
                            $cuentaSesiones = $value2['cuentaSesiones'];
                            ?>
                            <tr>
                                <td>
                                    <?php echo $value['nombreOC'] . " " . $cuentaSesiones; ?>
                                </td>
                                <td>
                                    <?php echo $value2['idcomites']; ?>
                                </td>
                                <td>
                                    <?php echo $value3['folio']; ?>
                                </td>
                                <td>
                                    <?php echo $value4['texto_acuerdo']; ?>
                                </td>
                            <tr>
                            <?php
                        }
                    }
                }
            }
            ?>
        </table>
        <?php
        // echo "<pre>";
        // print_r($organos_colegiados);
        // echo "</pre>";


    }
}



