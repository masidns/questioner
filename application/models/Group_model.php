<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Group_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Layanan_model');
        $this->load->model('Aspek_penilaian_model');

    }

    public function select()
    {
        $group = $this->db->get("setgroup")->result();
        return $group;
    }

    public function getdetail($idsetgroup)
    {
        $group = $this->db->get_where('grup_kuisioner', ['idsetgroup' => $idsetgroup])->result();
        $aspek = $this->Aspek_penilaian_model->get_all_aspek_penilaian();
        foreach ($aspek as $key => $value) {
            $value->itemaspek = $this->db->get_where('kuisioner', ['id_aspek' => $value->id_aspek])->result();
        }
        $data = [
            'group' => $group,
            'layanan' => $this->Layanan_model->get_all_layanan(),
            'aspek' => $aspek,
        ];
        return $data;
    }

    public function add($data)
    {
        $this->db->trans_begin();
        $this->db->update('setgroup', ['status' => 0]);
        $this->db->insert("setgroup", ["kode" => $data['kode'], 'status' => $data['status'] = 1]);
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $this->select();
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }

    public function saveItem($data)
    {
        $item = [
            'id_kuisioner' => $data['id_kuisioner'],
            'id_layanan' => $data['id_layanan'],
            'idsetgroup' => $data['idsetgroup'],
        ];
        if ($data['checked']) {
            $this->db->insert('grup_kuisioner', $item);
            return $this->db->insert_id();
        } else {
            return $this->db->delete('grup_kuisioner', $item);
        }
    }

    public function edit($data)
    {
        $this->db->where('idsetgroup', $data['idsetgroup']);
        $this->db->update('setgroup', ["kode" => $data['kode']]);
        return $data;
    }

    public function delete($idsetgroup)
    {
        return $this->db->delete('setgroup', array('idsetgroup' => $idsetgroup));
    }

}

/* End of file ModelName.php */
