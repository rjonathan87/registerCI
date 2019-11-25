<?php
class Model_Nivel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM cat_nivel");
        return $query->result_array();
    }

    public function get($id_cat_nivel)
    {
        return $this->db->get_where('cat_nivel', array('id_cat_nivel' => $id_cat_nivel))->row_array();
    }

    ///////////////////////////////////////////////////////////////////////////////
    //CATALOGO
    public function add($arr)
    {
        $this->db->insert('cat_nivel', $arr);
    }

    public function update($id, $arr)
    {
        // $id = $arr['id_cat_nivel'];
        $this->db->where('id_cat_nivel', $id);
        $this->db->update('cat_nivel', $arr);
        // return $id . ' ' . $arr;
    }

    public function delete($id)
    {
        $this->db->where('id_cat_nivel', $id);
        $this->db->delete('cat_nivel');
    }
}