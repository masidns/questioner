<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Kuisioner_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get kuisioner by id_kuisioner
     */
    function get_kuisioner($id_kuisioner)
    {
        return $this->db->get_where('kuisioner',array('id_kuisioner'=>$id_kuisioner))->row_array();
    }
        
    /*
     * Get all kuisioner
     */
    function get_all_kuisioner()
    {
        $this->db->order_by('id_kuisioner', 'desc');
        return $this->db->get('kuisioner')->result_array();
    }
        
    /*
     * function to add new kuisioner
     */
    function add_kuisioner($params)
    {
        $this->db->insert('kuisioner',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update kuisioner
     */
    function update_kuisioner($id_kuisioner,$params)
    {
        $this->db->where('id_kuisioner',$id_kuisioner);
        return $this->db->update('kuisioner',$params);
    }
    
    /*
     * function to delete kuisioner
     */
    function delete_kuisioner($id_kuisioner)
    {
        return $this->db->delete('kuisioner',array('id_kuisioner'=>$id_kuisioner));
    }
}
