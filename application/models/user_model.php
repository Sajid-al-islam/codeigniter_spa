<?php
class User_model extends CI_Model{
 
    function user_list(){
        $hasil=$this->db->get('users');
        return $hasil->result();
    }
 
    function save_user(){

        $nameArr = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = $_POST['phone_number'];
        if(!empty($nameArr)){
            for($i = 0; $i < count($nameArr); $i++){
                if(!empty($nameArr[$i])){
                    $data = array(
                        'first_name'  => $nameArr[$i],
                        'last_name'  => $last_name[$i], 
                        'phone_number' => $phone_number[$i], 
                    );
                    
                    $result=$this->db->insert('users',$data);
                }
            }
        }
    
        redirect(site_url('user/lists'));
    }
 
    function update_user(){
        
        $id=$this->input->post('id');
        $first_name=$this->input->post('first_name');
        $last_name=$this->input->post('last_name');
        $phone_number=$this->input->post('phone_number');
        if(!empty($first_name)){
            for($i = 0; $i < count($first_name); $i++){
                if(!empty($first_name[$i])){
                    $this->db->set('first_name', $first_name[$i]);
                    $this->db->set('last_name', $last_name[$i]);
                    $this->db->set('phone_number', $phone_number[$i]);
                    $this->db->where('id', $id);
                    $result=$this->db->update('users');
                    
                }
            }
        }
        
        return $this->db->get_where('users', array('id' => $id))->row();
    }
 
    function delete_user(){
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('users');
        return $result;
    }
     
}