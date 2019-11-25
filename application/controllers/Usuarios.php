<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Model_Usuario");
        $this->load->model("Model_Nivel");
        $this->load->model("Status_Model");
    }

    public function index()
    {
        if ($this->session->userdata('nivel') == 1) {
            $data['lista'] = $this->Model_Usuario->listaUsuariosAll();
            $data['all_status'] = $this->Status_Model->get_all_status();
            $data['all_nivel'] = $this->Model_Nivel->getAll();

            $data['_view'] = 'usuarios/usuarios';

            $this->load->view('layouts/main', $data);

        } else {
            $data['_view'] = "accessdenied";
            $this->load->view('layouts/main', $data);
        }
    }

    public function agregarUsuario()
    {
        //var_dump($_POST);
        $this->load->library('form_validation');
        $data = array('success' => false, 'message' => array());

        $this->form_validation->set_rules("idusuario", "idusuario", "required");
        $this->form_validation->set_rules("nombre", "nombre", "required");
        $this->form_validation->set_rules("ap_patern", "ap_patern", "required");
        $this->form_validation->set_rules("email", "email", "required|valid_email");
        $this->form_validation->set_rules("tel1", "tel1", "required");
        $this->form_validation->set_rules("usuario", "usuario", "required");
        $this->form_validation->set_rules("password", "password", "required");
        $this->form_validation->set_rules("password2", "password2", "required|matches[password]");
        $this->form_validation->set_rules("nivel", "nivel", "required");

        $this->form_validation->set_error_delimiters("<span class='text-danger'>", "</span>");

        if ($this->form_validation->run()) {
            $data['success'] = true;

            if ($data['success'] == true) {
                echo $_POST['password'] = sha1($this->input->post('password'));

                $datos = $_POST;
                //echo 'todo bien';
                $result = $this->Model_Usuario->insertarUsuario($datos);
            }

        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }

    public function guardarUsuario()
    {
        // var_dump($_FILES);
        if ($_FILES["fotografia"]["name"] != '') {
            $targetFolder = $_SERVER['DOCUMENT_ROOT'] . "/itc/resources/img/fotografias/";
            $file = $_FILES["fotografia"];

            $nameExt = explode('/', $file["type"]);
            $nombre = $this->input->post('usuario') . '.' . $nameExt[1];

            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $carpeta = $targetFolder;
            $src = $targetFolder . $nombre;

            if (!file_exists($src)) {

                if (move_uploaded_file($ruta_provisional, $src)) {

                    $datos = $_POST;
                    $datos['password'] = sha1($this->input->post('password'));
                    $datos['fotografia'] = $nombre;

                    $data['data'] = $this->Model_Usuario->guardarUsuario($datos);
                    $data = array(
                        'success' => true,
                        'message' => "Archivo $nombre fue almacenado correctamente",
                    );

                } else {
                    $data = array(
                        'success' => false,
                        'message' => "No se pudo copiar el archivo $nombre!!!!!!",
                    );

                }

            } else {
                $data = array(
                    'success' => false,
                    'message' => "El archivo $nombre ya existe!!!",
                );
            }

        } else {
            $datos = $_POST;
            $datos['password'] = sha1($this->input->post('password'));
            $data = $this->Model_Usuario->guardarUsuario($datos);
        }

        echo json_encode($data);
    }

    public function getUsuario()
    {
        $this->load->model("Model_Usuario");
        $id_usuario = $this->input->post('id_usuario');
        $result = $this->Model_Usuario->getUsuario($id_usuario);
        $json = json_encode($result);
        echo $json;
    }

    public function deleteUsuario()
    {
        $this->load->model("Model_Usuario");
        $id_usuario = $this->input->get('id_usuario');

        if ($this->Model_Usuario->deleteUsuario($id_usuario)) {
            $data = array('success' => true, 'message' => 'Eliminado correctamente');
            echo json_encode($data);
        }

    }

    public function listaUsuariosAll()
    {
        $result = $this->Model_Usuario->listaUsuariosAll();
        $json = json_encode($result);
        echo $json;
    }
    public function listaVistaUsuarios()
    {
        $result = $this->Model_Usuario->listaVistaUsuarios();
        $json = json_encode($result);
        echo $json;
    }

    public function listaVistaUsuariosNivel()
    {
        $nivel = $this->input->post('nivel');
        $result = $this->Model_Usuario->listaVistaUsuariosNivel($nivel);
        $json = json_encode($result);
        echo $json;
    }
}