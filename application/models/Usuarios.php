<?php
class Model_Usuario extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();

         
    }

    public function insertarUsuario($arrUsuario){
       
        $this->load->library('encryption');

        unset($arrUsuario['password2']);
        $arrUsuario['password'] = $this->encrypt->encode($arrUsuario['password']);
		$this->db->insert('usuarios', $arrUsuario);
    }
    public function listaUsuario(){
        $this->db->select("*");
    	$this->db->where("pago","1");
		$this->db->from("usuarios");

    	$query = $this->db->get();
    	return $query->result();
    }

    public function listaTecnicos(){
        $this->db->select("*");
    	$this->db->where("nivel","3");
		$this->db->from("usuarios");

    	$query = $this->db->get();
    	return $query->result();
    }

    public function listaClientes(){
        $this->db->select("*");
        $this->db->where("status","1");
        $this->db->where("nivel","2");
        $this->db->where("pago","1");
        $this->db->from("usuarios");

        $query = $this->db->get();
        return $query->result();
    }


    public function listaUsuariosAll(){
        $this->db->select("*");
        $this->db->from("usuarios");
        $query = $this->db->get();
        return $query->result();
    }

    public function listaVistaUsuarios(){
        $this->db->select("*");
        $this->db->from("vista_usuarios");
        $query = $this->db->get();
        return $query->result();
    }

    public function listaVistaUsuariosNivel($nivel){

        $this->db->where("nivel",$nivel);
        $this->db->from("vista_usuarios");
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteUsuario($id_usuario)
    {
        $this->db->where('id_usuario',$id_usuario);
        $this->db->delete('usuarios');
    }

    public function getUsuario($id_usuario){
        $this->db->select("*");
        $this->db->from("usuarios");
        //$this->db->join("cat_empresa", "usuarios.empresa = cat_empresa.id_empresa", "left");
        $this->db->where("id_usuario", $id_usuario);

        $query = $this->db->get();
        return $query->result();

    }

    public function login($usuario, $password){

        $this->db->where("usuario", $usuario);
        $this->db->where("password", $password);
        $q = $this->db->get("usuarios");

        if ($q->num_rows() > 0) {
            
            return $q->row();

        }else {
            return false;            
        }
    }

    public function guardarUsuario($arrUsuario){
        $password = $arrUsuario['password'];
        $id_usuario = $arrUsuario['id_usuario'];
        unset($arrUsuario['password2']);

        if ($password == '') {
            unset($arrUsuario['password']);
        }

        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('usuarios', $arrUsuario);
    }
}