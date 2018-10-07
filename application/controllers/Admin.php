<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('lcp_model');
        $this->load->helper(array('form','string'));
        $this->load->library(array('email','session','form_validation'));
        
        if($this->session->has_userdata('isloggedin') == FALSE ||
        $this->session->userdata('user_type') != 0){
            redirect('dashboard');
        }
    }

    public function index(){
        redirect('admin/dashboard');
    }

    public function dashboard() {
        $data = array(
           'userinfo'=> $this->lcp_model->fetch('super_admin_acc_tbl',array('admin_id'=>$this->session->s_admin_id)),
           'records' => $this->lcp_model->fetchAllAcc()
       );        
       $this->load->view("admin/super_admin",$data);
    }

    public function add() {      
        $this->load->view("admin/add_doc_or_ass");
    }

    public function add_submit() { 
        $a_fname = strtolower($this->input->post('first_name'));
        $a_mname = strtolower($this->input->post('middle_name'));
        $a_lname = strtolower($this->input->post('last_name'));   
        $fname = $a_fname[0];
        $mname = $a_mname[0];
        $lname = $a_lname;
        $password = "lcpdefault";
        $doc_or_ass = $this->input->post('doc_or_ass');
        if($doc_or_ass == "doctor"){
            $data_account = array(
                'user_fname' => $this->input->post('first_name'),
                'user_lname' => $this->input->post('last_name'),
                'user_email' => $this->input->post('email'),
                'user_uname' => "{$fname}{$mname}{$lname}",
                'user_pass' => sha1($password),
                'reg_at' => time(),
                'active' => 1,
                'user_type' => 2,
                'verify' => 1,
            );
            $this->lcp_model->insert('user_tbl',$data_account); 
            echo "<script>alert('Added Successfully');"
            . "window.location='". base_url()."admin/add'</script>";
        }     
        else {
            $data_account = array(
                'user_uname' => "{$fname}{$mname}{$lname}",
                'user_pass' => sha1($password),
                'user_fname' => $this->input->post('first_name'),
                'user_lname' => $this->input->post('last_name'),
                'reg_at' => time(),
                'active' => 1,
                'user_type' => 3,
                'verify' => 1,
            );
            $this->lcp_model->insert('user_tbl',$data_account);
            echo "<script>alert('Added Successfully');"
            . "window.location='". base_url()."admin/add'</script>"; 
        }  
    }

    public function updateaccount_submit(){
        $id = $this->input->post('user_id');
        $data = array(
            'user_type' => $this->input->post('acc_lvl')
        );
        $this->lcp_model->updateaccount($data,$id);
        echo "<script>alert('Update Successfully');"
        . "window.location='". base_url()."admin'</script>";
    }
    
    public function userlogs() {
        $data = array(
            'logs' => $this->lcp_model->fetchAllLogs(),
            
        );
        $this->load->view("admin/user_logs",$data);
    }
}