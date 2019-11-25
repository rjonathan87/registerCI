<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function send()
    {
        $idsesiones = $this->input->post('idsesiones');
        $id_comite = $this->input->post('id_comite');
        $nombre_sesion = $this->input->post('nombre_sesion');
        $fecha_ingreso = $this->input->post('fecha_ingreso');
        $fecha_sesion = $this->input->post('fecha_sesion');
        $proxima_sesion = $this->input->post('proxima_sesion');
        $rec_1 = $this->input->post('rec_1');
        $rec_2 = $this->input->post('rec_2');
        $rec_3 = $this->input->post('rec_3');
        $tipo_aviso = $this->input->post('tipo_aviso');
        
        $this->load->model('Correos_model');
        $data['correos'] = $this->Correos_model->get_all_correos();
        
        foreach ($data['correos'] as $key => $value) {
            $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = 'true';
    
            // mail desde donde se envía
            $mail->Username = 'rjonathan87@gmail.com';
            $mail->Password = 'vMg6D10awq';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';
    
            //Datos que se agregan al correo
            $mail->setFrom('rjonathan87@hotmail.com','Sistema de recordatorios');
            //$mail->addReplyTo('rjonathan87@hotmail.com','Micorreo');
            /* echo $value['email'];
            echo "<br>";
            echo $key;
            echo "<br>"; */

            $correoDestino = $value['email'];
            $nombreDestino = $value['nombre'];
            // destinatarios
            $mail->addAddress($correoDestino);
            
    
            // Subject
            $asunto = "Aviso de próxima sesión";
            
            $mail->Subject = $asunto;
            $mail->isHTML(true);
    
            $mailContent = "<h1>Hola $nombreDestino tendrás una sesión</h1>
                <p>Nombre de la sesión: $nombre_sesion</p>
                <p>Fecha: $fecha_sesion</p>";
            $mail->Body = $mailContent;
            
            if(!$mail->send())
            {
                echo 'Message could not be sent. <br>';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                echo 'Correo enviado a: ' . $correoDestino . "<br>";

                //agrego 1 a el tipo de aviso
                //rec_1
                //rec_2
                //rec_3
                if($tipo_aviso == 1){
                    $rec_1 = 1;
                }else if($tipo_aviso == 2){
                    $rec_2 = 1;
                }else if($tipo_aviso == 3){
                    $rec_3 = 1;
                }

                // check if the sesione exists before trying to edit it
                $this->load->model('Sesione_model');
                $data['sesione'] = $this->Sesione_model->get_sesione($idsesiones);
                
                if(isset($data['sesione']['idsesiones']))
                {
                    if(isset($_POST) && count($_POST) > 0)     
                    {   
                        $params = array(
                            'id_comite' => $this->input->post('id_comite'),
                            'nombre_sesion' => $this->input->post('nombre_sesion'),
                            'fecha_ingreso' => $this->input->post('fecha_ingreso'),
                            'fecha_sesion' => $this->input->post('fecha_sesion'),
                            'proxima_sesion' => $this->input->post('proxima_sesion'),
                            'rec_1' => $rec_1,
                            'rec_2' => $rec_2,
                            'rec_3' => $rec_3,
                        );

                        $this->load->model('Sesione_model');
                        $this->Sesione_model->update_sesione($idsesiones,$params);            
                        
                    }
                    
                }
            }
        }

        
        //carga los correos a quien se enviará el aviso


    }
}