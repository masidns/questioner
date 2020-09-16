<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Aspek_penilaian extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aspek_penilaian_model');
    } 

    /*
     * Listing of aspek_penilaian
     */
    function index()
    {
        $data['aspek_penilaian'] = $this->Aspek_penilaian_model->get_all_aspek_penilaian();
        $data['title'] = ['title'=>'Aspek Penilaian'];
        $data['_view'] = 'aspek_penilaian/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new aspek_penilaian
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nm_aspek' => $this->input->post('nm_aspek'),
				'deskripsi' => $this->input->post('deskripsi'),
            );
            
            $aspek_penilaian_id = $this->Aspek_penilaian_model->add_aspek_penilaian($params);
            redirect('aspek_penilaian/index');
        }
        else
        {            
            $data['_view'] = 'aspek_penilaian/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a aspek_penilaian
     */
    function edit($id_aspek)
    {   
        // check if the aspek_penilaian exists before trying to edit it
        $data['aspek_penilaian'] = $this->Aspek_penilaian_model->get_aspek_penilaian($id_aspek);
        
        if(isset($data['aspek_penilaian']['id_aspek']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nm_aspek' => $this->input->post('nm_aspek'),
					'deskripsi' => $this->input->post('deskripsi'),
                );

                $this->Aspek_penilaian_model->update_aspek_penilaian($id_aspek,$params);            
                redirect('aspek_penilaian/index');
            }
            else
            {
                $data['_view'] = 'aspek_penilaian/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The aspek_penilaian you are trying to edit does not exist.');
    } 

    /*
     * Deleting aspek_penilaian
     */
    function remove($id_aspek)
    {
        $aspek_penilaian = $this->Aspek_penilaian_model->get_aspek_penilaian($id_aspek);

        // check if the aspek_penilaian exists before trying to delete it
        if(isset($aspek_penilaian['id_aspek']))
        {
            $this->Aspek_penilaian_model->delete_aspek_penilaian($id_aspek);
            redirect('aspek_penilaian/index');
        }
        else
            show_error('The aspek_penilaian you are trying to delete does not exist.');
    }
    
}
