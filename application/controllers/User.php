<?php
class User extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    function index() 
    {
        $this->load->view('user_view');
    }

    function lists() {
        $data['data']=$this->user_model->user_list(); 
        // var_dump($data);
        $this->load->view('user_list', $data);
    }

    function user_data() 
    {
        $data=$this->user_model->user_list(); 
        echo json_encode($data);
    }


    function save() 
    {
        $data=$this->user_model->save_user(); 

        echo json_encode($data);
    }

    function update() 
    {
        $data=$this->user_model->update_user(); 
        echo json_encode($data);
    }

    function delete() 
    {
        $data=$this->user_model->delete_user(); 
        echo json_encode($data);
    }
}

