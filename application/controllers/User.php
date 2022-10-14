<?php
class User extends CI_Controller {

    public function __construct() //seperate function and __construct() it should be public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    function index() //seperate function and __construct() it should be public function __construct()
    {
        $this->load->view('user_view');
    }

    function user_data() //seperate function and __construct() it should be public function __construct()
    {
        $data=$this->user_model->user_list(); echo json_encode($data);
    }


    function save() //seperate function and __construct() it should be public function __construct()
    {
        $data=$this->user_model->save_user(); echo json_encode($data);
    }

    function update() //seperate function and __construct() it should be public function __construct()
    {
        $data=$this->user_model->update_user(); echo json_encode($data);
    }

    function delete() //seperate function and __construct() it should be public function __construct()
    {
        $data=$this->user_model->delete_user(); echo json_encode($data);
    }
}

