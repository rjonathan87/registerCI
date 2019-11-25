<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Usuario');
    }

    public function index()
    {
        $this->load->view('login/login');
    }

    public function validar()
    {

        $password = sha1($this->input->post('password'));
        //$password = $this->input->post('password');

        $q = $this->Model_Usuario->login($this->input->post('usuario'), $password);

        // var_dump($q);

        if ($q) {
            if ($q->fotografia != '') {
                $fotografia = base_url('resources/img/fotografias/' . $q->fotografia);
            } else {
                $fotografia = base_url('resources/img/profileimg.png');
            }

            $data = [
                "id_usuario" => $q->id_usuario,
                "nombre" => $q->nombre,
                "ap_patern" => $q->ap_patern,
                "ap_matern" => $q->ap_matern,
                "nivel" => $q->nivel,
                "login" => true,
                "fotografia" => $fotografia,
            ];
            $this->session->set_userdata($data);
        } else {
            echo "error";
        }
    }

    public function registrar()
    {
        $password = sha1($this->input->post('password'));
        //$password = $this->input->post('password');

        $q = $this->Model_Usuario->searchEmail($this->input->post('email'));

        if (!$q) {
            // echo "El usuario no existe";
            $data['success'] = true;

            if ($data['success'] == true) {
                $_POST['password'] = sha1($this->input->post('password'));
                unset($_POST['password-confirm']);
                $_POST['status'] = 2;
                $_POST['nivel'] = 4;
                $datos = $_POST;
                //echo 'todo bien';
                $result = $this->Model_Usuario->insertarUsuario($datos);
            }
            echo json_encode($data);

        } else {
            $data = array();
            $data['success'] = false;
            $data['messages'] = 'Usuario existente';

            echo json_encode($data);
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url("login/login"));
    }

}