<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    }
    
    public function index()
    {
        $data['title'] = ['title' => 'Laporan'];
        $data['_view'] = 'laporan';
        $this->load->view('layouts/main', $data);
    }

    public function getdata()
    {
        $result = $this->Laporan_model->select();
        echo json_encode($result);
    }

}

/* End of file Controllername.php */
