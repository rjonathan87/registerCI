<?php
class Status_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Get status by idstatus
     */
    public function get_status($idstatus)
    {
        return $this->db->get_where('cat_status', array('idstatus' => $idstatus))->row_array();
    }

    /*
     * Get all status
     */
    public function get_all_status()
    {
        $this->db->order_by('idstatus', 'asc');
        return $this->db->get('cat_status')->result_array();
    }

    /*
     * function to add new statu
     */
    public function add_status($params)
    {
        $this->db->insert('cat_status', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update statu
     */
    public function update_status($idstatus, $params)
    {
        $this->db->where('idstatus', $idstatus);
        return $this->db->update('cat_status', $params);
    }

    /*
     * function to delete statu
     */
    public function delete_status($idstatus)
    {
        return $this->db->delete('cat_status', array('idstatus' => $idstatus));
    }
}