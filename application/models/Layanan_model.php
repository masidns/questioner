<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Layanan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Get layanan by id_layanan
     */
    public function get_layanan($id_layanan)
    {
        return $this->db->get_where('layanan', array('id_layanan' => $id_layanan))->row_array();
    }

    /*
     * Get all layanan
     */
    public function get_all_layanan()
    {
        $this->db->order_by('id_layanan', 'desc');
        return $this->db->get('layanan')->result_array();
    }

    /*
     * function to add new layanan
     */
    public function add_layanan($params)
    {
        $this->db->insert('layanan', $params);
        $params['id_layanan'] = $this->db->insert_id();
        return $params;
    }

    /*
     * function to update layanan
     */
    public function update_layanan($params)
    {
        $item = [
            'nama_layanan' => $params['nama_layanan'],
        ];
        $this->db->where('id_layanan', $params['id_layanan']);
        $this->db->update('layanan', $item);
        return $params;
    }

    /*
     * function to delete layanan
     */
    public function delete_layanan($id_layanan)
    {
        return $this->db->delete('layanan', array('id_layanan' => $id_layanan));
    }
}
