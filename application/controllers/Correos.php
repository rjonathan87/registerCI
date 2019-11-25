<?php
/* 
 *  
 * 
 */
 
class Correos extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Correos_model');
    } 

    /*
     * Listing of correos
     */
    function index()
    {
        if ( $this->session->userdata('nivel') == 1 ) {
            $data['correos'] = $this->Correos_model->get_all_correos();
            
            $data['_view'] = 'correos/index';
            $this->load->view('layouts/main',$data);
        }else{
            $data['_view'] = "accessdenied";
            $this->load->view('layouts/main', $data);
        }
    }
    /*
     * Listing of correos
     */
    function get_correos_by_correo()
    {
        $idcorreos = $this->input->post("idcorreos");
        $data = $this->Correos_model->get_correos_by_correo($idcorreos);
        echo json_encode($data);
    }

    /*
     * Adding a new correo
     */
    function add()
    {   
        if ( $this->session->userdata('nivel') == 1 ) {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'idcorreos' => $this->input->post('idcorreos'),
                    'nombre' => $this->input->post('nombre'),
                    'email' => $this->input->post('email')
                );
                
                $idcorreos = $this->Correos_model->add_correo($params);
                redirect('correos/index');
            }
            else
            {
                $this->load->model('Correos_model');
                $data['all_correos'] = $this->Correos_model->get_all_correos();
    
                $data['_view'] = 'correos/add';
                $this->load->view('layouts/main',$data);
            }
        }else{
            $data['_view'] = "accessdenied";
            $this->load->view('layouts/main', $data);
        }
    }  
    /*
     * Save correo
     */
    function save()
    {   
        $this->load->library('form_validation');
        $data = array('success' => false, 'message' => array());

        $this->form_validation->set_rules("idcorreos","ID","required");
        $this->form_validation->set_rules("nombre","Nombre","required");
        $this->form_validation->set_rules("email","e-Mail","required");
        
        $this->form_validation->set_error_delimiters("<span class='text-danger'>","</span>");

        if ($this->form_validation->run()) {
            $data['success'] = true;
            $idcorreos = $this->input->post("idcorreos");
            $datos = $_POST;
            $result = $this->Correos_model->update_correo($idcorreos, $datos);
            

		}else{
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
    }  

    /*
     * Editing a correo
     */
    function edit($idcorreos)
    {   
        // check if the correo exists before trying to edit it
        $data['correo'] = $this->Correos_model->get_correo($idcorreos);
        
        if(isset($data['correo']['idcorreos']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'idcorreos' => $this->input->post('idcorreos'),
					'nombre' => $this->input->post('nombre'),
					'email' => $this->input->post('email')
                );

                $this->Correos_model->update_correo($idcorreos,$params);            
                redirect('correos/index');
            }
            else
            {
				$this->load->model('Correos_model');
				$data['all_correos'] = $this->Correos_model->get_all_correos();

                $data['_view'] = 'correos/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The correo you are trying to edit does not exist.');
    } 

    /*
     * Deleting correo
     */
    function remove($idcorreos)
    {
        $correo = $this->Correos_model->get_correo($idcorreos);

        // check if the correo exists before trying to delete it
        if(isset($correo['idcorreos']))
        {
            $this->Correos_model->delete_correo($idcorreos);
            redirect('correos/index');
        }
        else
            show_error('The correo you are trying to delete does not exist.');
    }
    /*
     * Deleting correo
     */
    function remove_of_sesion()
    {
        $idcorreos = $this->input->post('idcorreos');
        $correo = $this->Correos_model->get_correo($idcorreos);

        // check if the correo exists before trying to delete it
        if(isset($correo['idcorreos']))
        {
            
            $this->Correos_model->delete_correo($idcorreos);
            // redirect('correo/index');
        }
        else
            show_error('El correo que quiere eliminar no existe.');
    }
    
}
