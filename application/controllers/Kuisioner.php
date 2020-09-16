<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Kuisioner extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kuisioner_model');
    } 

    /*
     * Listing of kuisioner
     */
    function index()
    {
        $data['kuisioner'] = $this->Kuisioner_model->get_all_kuisioner();
        
        $data['_view'] = 'kuisioner/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new kuisioner
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'pertanyaan' => $this->input->post('pertanyaan'),
				'id_aspek' => $this->input->post('id_aspek'),
            );
            
            $kuisioner_id = $this->Kuisioner_model->add_kuisioner($params);
            redirect('kuisioner/index');
        }
        else
        {            
            $data['_view'] = 'kuisioner/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a kuisioner
     */
    function edit($id_kuisioner)
    {   
        // check if the kuisioner exists before trying to edit it
        $data['kuisioner'] = $this->Kuisioner_model->get_kuisioner($id_kuisioner);
        
        if(isset($data['kuisioner']['id_kuisioner']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'pertanyaan' => $this->input->post('pertanyaan'),
					'id_aspek' => $this->input->post('id_aspek'),
                );

                $this->Kuisioner_model->update_kuisioner($id_kuisioner,$params);            
                redirect('kuisioner/index');
            }
            else
            {
                $data['_view'] = 'kuisioner/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The kuisioner you are trying to edit does not exist.');
    } 

    /*
     * Deleting kuisioner
     */
    function remove($id_kuisioner)
    {
        $kuisioner = $this->Kuisioner_model->get_kuisioner($id_kuisioner);

        // check if the kuisioner exists before trying to delete it
        if(isset($kuisioner['id_kuisioner']))
        {
            $this->Kuisioner_model->delete_kuisioner($id_kuisioner);
            redirect('kuisioner/index');
        }
        else
            show_error('The kuisioner you are trying to delete does not exist.');
    }
    
}
