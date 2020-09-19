<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aspek_penilaian_model');
        $this->load->model('Layanan_model');

    }

    public function getdetail()
    {
        $setgroup = $this->db->get_where('setgroup', ['status' => 1])->result()[0];
        $group = $this->db->get_where('grup_kuisioner', ['idsetgroup' => $setgroup->idsetgroup])->result();
        $aspek = $this->Aspek_penilaian_model->get_all_aspek_penilaian();
        foreach ($aspek as $key => $value) {
            $value->itemaspek = $this->db->get_where('kuisioner', ['id_aspek' => $value->id_aspek])->result();
        }

        $data = [
            'group' => $group,
            'layanan' => $this->Layanan_model->get_all_layanan(),
            'aspek' => $aspek,
            'rangenilai' => $this->db->get('range_nilai')->result(),
            'periode' => $this->db->get('periode')->result(),
            'penilai' => $this->session->userdata(),

        ];
        return $data;
    }

}

/* End of file ModelName.php */
