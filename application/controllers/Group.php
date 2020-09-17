<?php

// defined('BASEPATH') or exit('No direct script access allowed');

class Group extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Group_model');
        if (!$this->session->userdata('isLogin')) {
            redirect('auth/index');
        }
    }

    public function index()
    {
        $data['title'] = ['title' => 'Group'];
        $data['_view'] = 'grup_kuisioner/index';
        $this->load->view('layouts/main', $data);
    }

    public function detail()
    {
        $data['title'] = ['title' => 'Detail Group'];
        $data['_view'] = 'grup_kuisioner/edit';
        $this->load->view('layouts/main', $data);
    }

    public function detaildetail($idsetgroup)
    {

        $result = $this->Group_model->getdetail($idsetgroup);
        echo json_encode($result);
    }

    public function getdata()
    {
        $result = $this->Group_model->select();
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Group_model->add($data);
        echo json_decode($result);
    }

    public function edit()
    {
        // check if the aspek_penilaian exists before trying to edit it
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        // check if the range_nilai exists before trying to edit it
        $result = $this->Group_model->edit($data);
        echo json_decode($data);
    }

    /*
     * Deleting aspek_penilaian
     */
    public function remove($idsetgroup)
    {
        $result = $this->Aspek_penilaian_model->delete_aspek_penilaian($id_aspek);
        echo json_decode(['message' => $result]);
    }

}

/* End of file Controllername.php */
