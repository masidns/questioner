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
        $today = date('Y-m-d');
        $usera = $this->session->userdata();
        $id_periode = $this->db->query("SELECT * FROM periode where selesai>='$today'")->result()[0]->id_periode;
        $user = $this->session->userdata('IdUser');
        $setgroup = $this->db->get_where('setgroup', ['status' => 1])->result()[0];
        $penilai = $this->db->get_where("daftar_penilai", ['id_mhs' => $user, 'id_periode' => $id_periode])->result();
        if (count($penilai) == 0) {
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
        } else {
            return ['message' => 'anda telah melakukan penilaian'];
        }
    }

    public function simpan($data)
    {
        $today = date('Y-m-d');
        $id_periode = $this->db->query("SELECT * FROM periode where selesai>='$today'")->result()[0]->id_periode;
        $this->db->trans_begin();
        $user = [
            'id_mhs' => $this->session->userdata('IdUser'),
            'id_periode' => $id_periode,
        ];
        $this->db->insert("daftar_penilai", $user);
        $id_penilai = $this->db->insert_id();
        foreach ($data as $key => $value) {
            $value["id_penilai"] = $id_penilai;
            $this->db->insert("nilai_kepuasan", $value);
        }
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return true;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
}

/* End of file ModelName.php */