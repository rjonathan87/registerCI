<?php
class Nivel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Nivel');
    }

    public function index()
    {
        if ($this->session->userdata('nivel') == 1) {
            $data['niveles'] = $this->Model_Nivel->getAll();

            $data['_view'] = 'nivel/index';
            $this->load->view('layouts/main', $data);
        } else {
            $data['_view'] = "accessdenied";
            $this->load->view('layouts/main', $data);
        }
    }

    public function add()
    {
        if ($this->session->userdata('nivel') == 1) {

            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'nivel' => $this->input->post('nivel'),
                );

                $statu_id = $this->Model_Nivel->add($params);
                redirect('nivel/index');
            } else {
                $data['_view'] = 'nivel/add';
                $this->load->view('layouts/main', $data);
            }
        } else {
            $data['_view'] = "accessdenied";
            $this->load->view('layouts/main', $data);
        }
    }

    public function edit($id_cat_nivel)
    {
        // check if the statu exists before trying to edit it
        $data['nivel'] = $this->Model_Nivel->get($id_cat_nivel);

        if (isset($data['nivel']['id_cat_nivel'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'nivel' => $this->input->post('nivel'),
                );

                $this->Model_Nivel->update($id_cat_nivel, $params);
                redirect('nivel/index');
                // var_dump($_POST);
            } else {
                $data['_view'] = 'nivel/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('The statu you are trying to edit does not exist.');
        }
        // var_dump($id_cat_nivel);
    }

    public function delete($id_cat_nivel)
    {
        // check if the statu exists before trying to edit it
        $data['nivel'] = $this->Model_Nivel->get($id_cat_nivel);

        if (isset($data['nivel']['id_cat_nivel'])) {

            $this->Model_Nivel->delete($id_cat_nivel);
            redirect('nivel/index');
        } else {
            show_error('The statu you are trying to edit does not exist.');
        }

    }

}