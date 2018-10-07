<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moderator extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('lcp_model');
        $this->load->helper(array('form','string'));
        $this->load->library(array('email','session','form_validation'));
        
        if($this->session->has_userdata('isloggedin') == FALSE || $this->session->userdata('user_type') != 4){
            redirect('dashboard');
        }
    }

    public function index() {
        redirect('admin/dashboard');
    }

    public function dashboard() {
        $this->load->view("admin/admin_view");
    }

    public function edit() {
        $data = array(
            'post' => $this->lcp_model->fetchAllPost(),
        );
        $this->load->view("admin/admin_view_edit",$data);
    }

    public function delete_account() {
        $id = $this->uri->segment(3);
        $this->lcp_model->deletepost($id);
        redirect('moderator/edit');
    }

    public function edit_post(){
        $id = $this->uri->segment(3);
        $info = $this->lcp_model->fetchPostById($id);
        $data = array(
            'data' => $info
        );
        $this->load->view("admin/edit_post",$data);          
        
    }

    public function edit_submit(){
        $id = $this->input->post('post_id') ;
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('picc')) {
            $image = $this->upload->data('file_name');
        }
           
        $data = array(
            'category' => $this->input->post('category'),
            'context' => $this->input->post('message'),
            'title' => $this->input->post('title'),
            'image' => $image,
            'create_date' => time()
        );
        $this->lcp_model->updatepost($data,$id);
        redirect('moderator/edit');    
        
    }

    public function submit(){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('pic')) {
            $image = $this->upload->data('file_name');
        }      
        $data = array(
            'category' => $this->input->post('category'),
            'title' => $this->input->post('title'),
            'context' => $this->input->post('message'),
            'create_date' => time(),
            'image' => $image,
        );
        $this->lcp_model->insertData('post_tbl',$data );
        echo "<script>
            alert('Successfully Posted');
            window.location.href='" . base_url() . "moderator';
        </script>";
    }
}