<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aspek_penilaian_model');
        $this->load->model('Layanan_model');
    }
    public function select()
    {
        $today = date('yy-m-d');
        $usera = $this->session->userdata();
        $id_periode = $this->db->query("SELECT * FROM periode where selesai>='$today'")->result()[0]->id_periode;
        $user = $this->session->userdata('IdUser');
        $setgroup = $this->db->get_where('setgroup', ['id_periode' => $id_periode])->result()[0];
        $penilai = $this->db->get_where("daftar_penilai", ['id_mhs' => $user, 'id_periode' => $id_periode])->result();
        $group = $this->db->get_where('grup_kuisioner', ['idsetgroup' => $setgroup->idsetgroup])->result();
        $aspek = $this->Aspek_penilaian_model->get_all_aspek_penilaian();
        foreach ($aspek as $key => $value) {
            $setdata = $this->db->query("SELECT
                    `kuisioner`.*
                FROM
                    `grup_kuisioner`
                    LEFT JOIN `kuisioner` ON `grup_kuisioner`.`id_kuisioner` =
                `kuisioner`.`id_kuisioner` WHERE kuisioner.id_aspek='$value->id_aspek'")->result();
            if (count($setdata) <= 0) {
                unset($aspek[$key]);
            } else {
                $value->itemaspek = $setdata;
            }
        }
        $layanan = $this->Layanan_model->get_all_layanan();
        foreach ($layanan as $key => $value) {
            $array = [];
            $id_layanan = $value['id_layanan'];
            $itemlayanan = $this->db->query("SELECT
                    *
                FROM
                    `aspek_penilaian`
                    LEFT JOIN `kuisioner` ON `aspek_penilaian`.`id_aspek` = `kuisioner`.`id_aspek`
                    LEFT JOIN `grup_kuisioner` ON `kuisioner`.`id_kuisioner` =
                `grup_kuisioner`.`id_kuisioner`
                WHERE id_layanan = $id_layanan")->result();
            foreach ($itemlayanan as $key1 => $value1) {
                $array[$value1->nm_aspek][$key1] = $value1;
            }
            $layanan[$key]['aspek'] = $array;
        }

        $data = [
            'group' => $group,
            'layanan' => $this->Layanan_model->get_all_layanan(),
            'datalayanan' => $layanan,
            'aspek' => $aspek,
            'rangenilai' => $this->db->get('range_nilai')->result(),
            'periode' => $this->db->get('periode')->result(),
            'penilai' => $this->db->get_where('daftar_penilai', ['id_periode' => $id_periode])->num_rows(),
            'nilaikepuasan' => $this->db->get_where('nilai_kepuasan', ["id_periode" => $id_periode])->result(),
        ];
        return $data;
    }
}

/* End of file ModelName.php */
