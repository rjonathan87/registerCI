<?php
/* 
 *  
 * 
 */
 
class Correos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get correos by idcorreos
     */
    function get_correo($idcorreos)
    {
        return $this->db->get_where('correos',array('idcorreos'=>$idcorreos))->row_array();
    }
    /*
     * Get correos by sesion
     */
    function get_correos_by_sesion($sesion_id)
    {
        $this->db->join('status', 'status.idstatus = correos.status_correos');
        $this->db->where('sesion_id', $sesion_id);
        return $this->db->get('correos')->result_array();
        // $this->db->where('idcorreos',$idcorreos);
    }
        
    /*
     * Get all correos
     */
    function get_all_correos()
    {
        $this->db->order_by('idcorreos', 'desc');
        return $this->db->get('correos')->result_array();
    }
        
    /*
     * function to add new correos
     */
    function add_correo($params)
    {
        $this->db->insert('correos',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update correos
     */
    function update_correo($idcorreos,$params)
    {
        $this->db->where('idcorreos',$idcorreos);
        return $this->db->update('correos',$params);
    }
    
    /*
     * function to delete correos
     */
    function delete_correo($idcorreos)
    {
        return $this->db->delete('correos',array('idcorreos'=>$idcorreos));
    }
    /*
     * function to delete correos of sesion
     */
    function delete_correos_of_sesion($idsesiones)
    {
        $this->db->delete('correos',array('sesion_id'=>$idsesiones));
    }
}
