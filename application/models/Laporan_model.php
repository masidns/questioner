<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

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
        $setgroup = $this->db->get_where('setgroup', ['id_periode'=>$id_periode])->result()[0];
        $penilai = $this->db->get_where("daftar_penilai", ['id_mhs'=>$user, 'id_periode'=>$id_periode])->result();
        if(count($penilai)==0){
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
                'penilai' => $this->db->get_where('daftar_penilai',['id_periode'=>$id_periode])->num_rows(),
                'nilaikepuasan' => $this->db->get_where('nilai_kepuasan', ["id_periode"=>$id_periode])->result(),
            ];
            return $data;
        }else{
            return ['message'=>'anda telah melakukan penilaian'];
        }
    }
}

/* End of file ModelName.php */
